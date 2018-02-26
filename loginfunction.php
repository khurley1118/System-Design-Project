<?php

//connection
session_start();
include("connect.php");
include("StudentClass.php");
include("AdminClass.php");
include("InstructorClass.php");
include("utilClass.php");
//student id as sent from form
$userID = $_POST['login'];
$id = "";
$result = "";

$idTypeToAssign = "";
// Query the database with a stored procedure call, passing in the student id, loop through the result set
$loginType = $_POST['type'];
//print_r($loginType);
if ($loginType == "admin") {
    $result = mysqli_query($con, "CALL SP_getAdminID($userID)");
    $idTypeToAssign = "adminId";
} else if ($loginType == "faculty") {
    $result = mysqli_query($con, "CALL SP_GetFacultyID($userID)");
    $idTypeToAssign = "instructorId";
} else {
    //else case is it's a student.
    $result = mysqli_query($con, "CALL SP_getStudentID($userID)");
    $idTypeToAssign = "studentId";
}

if ($result != false && mysqli_num_rows($result) > 0) {
    while ($uRow = mysqli_fetch_array($result)) {
        $id = $uRow[$idTypeToAssign];
        //print_r($id);
    }
    //Loop through second set of dummy data to close the query (required for stored procedures to work)
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
} else {
    echo "User does not Exist";
}
//if there is a user with that name check, continue and get their password
if ($id == $userID) {
    $r2 = "";
    //decide which password query to run and run it, exit condition and test result of query
    //if query not false loop through and verify password
    if ($loginType == "admin") {
        $r2 = mysqli_query($con, "CALL SP_fetchAdminPassword($userID)");
    } else if ($loginType == "faculty") {
        $r2 = mysqli_query($con, "CALL SP_fetchInstructorPW($userID)");
    } else {
        $r2 = mysqli_query($con, "CALL SP_fetchStudentPassword($userID)");
    }
    if ($r2 != false) {
        while ($dRow = mysqli_fetch_array($r2)) {
            //WHEN HASHING IS IMPLEMENTED WILL NEED TO BE MODIFIED
            $dbpw = $dRow['password'];
            //print_r($dbpw);
        }
        while (mysqli_more_results($con)) {
            mysqli_next_result($con);
        }
        //if passwords match log the user in and assign session variables.
        if ($dbpw == $_POST['password']) { //this is for logging in with unencrypted pws
        $hashedPW = $_POST['password'];
        //if (password_verify($hashedPW, $dbpw)) {
            $_SESSION['userID'] = $userID;
            $_SESSION['userType'] = $loginType;

            $id = $userID;
            if ($loginType == "admin") {
                $user = new Admin;
                $user->setAdminId($userID);
                $user->setFirstName(utilAdminFirst($con, $id));
                $user->setLastName(utilAdminlast($con, $id));
                $_SESSION['CurrentUser'] = $user;
            } else if ($loginType == "faculty") {
                $user = new Instructor();
                $user->setInstructorId($id);
                $user->setFirstName(utilInstructorFirst($con, $id));
                $user->setLastName(utilInstructorLast($con, $id));
                //$user->setCourses(utilInstructorCourses($con, $id));
				        $user->setPassword(utilInstructorGetPassword($con,$id));
                $_SESSION['CurrentUser'] = $user;
            } else {
                //else case is that user is a student
                $user = new Student();
                $user->setStudentID($id);
                $user->setFirstName(utilStudentFirst($con, $id));
                $user->setLastName(utilStudentLast($con, $id));
                $user->setCourses(utilStudentCourseList($con, $id));
				        $user->setPassword(utilStudentGetPassword($con,$id));
                $_SESSION['CurrentUser'] = $user;
            }

            echo json_encode('Logged In');
        } else {
            //incorrect password error here
            echo "Incorrect Password";
        }
    }
}
?>
