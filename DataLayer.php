<?php

//Student
///////////////////////////////////
function DLgetStudentFirst($con, $id) {
    $rs = mysqli_query($con, "CALL SP_GetStudentFirstName($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $firstName = $row['firstName'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $firstName;
}

function DLgetStudentLast($con, $id) {
    $rs2 = mysqli_query($con, "CALL SP_getStudentLastName($id)");
    while ($row = mysqli_fetch_array($rs2)) {
        $lastName = $row['lastName'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $lastName;
}

function DLgetStudentCourses($con, $id) {
    $rs = mysqli_query($con, "CALL SP_getStudentCourses($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $courses[] = $row["courseCode"];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $courses;
}

//get student's password
function DLgetStudentPassword($con, $id) {
	$password = ""; //put this here so $password is initialized so we don't get an error, but as is if the student doesn't exist $password will stay blank
    $rs = mysqli_query($con, "CALL SP_fetchStudentPassword($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $password = $row['password'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $password;
}

//change student's password
function DLstudentPasswordChange($con, $id, $newPass) {
	return mysqli_query($con, "CALL SP_changeStudentPassword($id, $newPass)");
}

//ADMIN
///////////////////////////////////////
function DLgetAdminFirst($con, $id) {
    $rs = mysqli_query($con, "CALL SP_getAdminFirstName($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $firstName = $row['firstName'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $firstName;
}

function DLgetAdminLast($con, $id) {
    $rs = mysqli_query($con, "CALL SP_getAdminLastName($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $lastName = $row['lastName'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $lastName;
}

//INSTRUCTOR
//////////////////////////////////////
function DLgetInstructorFirst($con, $id) {
    $rs = mysqli_query($con, "CALL SP_getInstructorFirstName($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $firstName = $row['firstName'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $firstName;
}

function DLgetInstructorLast($con, $id) {
    $rs = mysqli_query($con, "CALL SP_GetInstructorLastName($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $lastName = $row['lastName'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $lastName;
}

function DLgetInstructorCourses($con, $id) {
    $x = mysqli_query($con, "CALL SP_getInstructorCourses($id)");
    while ($row = mysqli_fetch_array($x)) {
        $courses[] = $row["courseCode"];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    if (!isset($courses)) {
        return null;
    } else {
        return $courses;
    }
}

//get instructor's password
function DLgetInstructorPassword($con, $id) {
	$password = ""; //put this here so $password is initialized so we don't get an error, but as is if the student doesn't exist $password will stay blank
    $rs = mysqli_query($con, "CALL SP_fetchInstructorPW($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $password = $row['password'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $password;
}

//change instructor's password
function DLinstructorPasswordChange($con, $id, $newPass) {
	return mysqli_query($con, "CALL SP_changeInstructorPassword($id, $newPass)");
}

//COURSES
/////////////////////////////////////
function DLgetCourseList($con) {
    $rs = mysqli_query($con, "CALL SP_getAllCourses");
    while ($row = mysqli_fetch_array($rs)) {
        $list[] = $row;
        //Index 0 = Course code
        //Index 1 = Course description
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $list;
}

function DLupdateCourse($courseID) {
    
}

function DLRemoveCourse($courseID) {
    
}

function DLgetCourseName($con, $courseID) {
    $rs = mysqli_query($con, "CALL SP_getCourseName($courseID)");
    while ($row = mysqli_fetch_array($rs)) {
        $course = $row['description'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $course;
}

?>
