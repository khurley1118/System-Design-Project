<?php
//Avatars
///////////////////////////////////
function DLgetStudentAvatars($con){
  $rs = mysqli_query($con, "CALL SP_getStudentAvatars");
  while ($row = mysqli_fetch_array($rs)) {
      $avatars[] = $row['avatarPath'];
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  return $avatars;
}
function DLgetInstructorAvatars($con){
  $rs = mysqli_query($con, "CALL SP_getInstructorAvatars");
  while ($row = mysqli_fetch_array($rs)) {
      $avatars[] = $row['avatarPath'];
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  return $avatars;
}

//Ticket
///////////////////////////////////

//function to get all un-resolved Tickets to populate drop down select
function DLgetTickets($con) {
    //$ticketIDs = array();
    $rs = mysqli_query($con, "CALL SP_getTickets");
    while ($row = mysqli_fetch_array($rs)) {
        $ticketIDs[] = $row['ticketID'] . "&nbsp&nbsp" . $row['status'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    if (!isset($ticketIDs)) {
        return null;
    } else {
        return $ticketIDs;
    }
    //return $ticketIDs;
}

//function to return specific ticket info based on submitted ID
function DLgetTicket($con, $id) {
    $rs = mysqli_query($con, "CALL SP_getTicket($id)");
    while ($row = mysqli_fetch_array($rs)) {
        $ticket = new Ticket();
        $ticket->setDescription($row['description']);
        $ticket->setFirstName($row['firstName']);
        $ticket->setLastName($row['lastName']);
        $ticket->setDate($row['subDate']);
        $ticket->setStatus($row['status']);
        $_SESSION['testTicket'] = $row['description'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $ticket;
}

//function to insert a ticket
function DLinsertTicket($con, $desc, $fNm, $lNm, $subBy) {
  return mysqli_query($con, "CALL SP_insertTicket('$desc', '$fNm', '$lNm', $subBy)");
}

//function to set ticket to resolved
function DLresolveTicket($con, $id) {
  return mysqli_query($con, "CALL SP_resolveTicket($id)");
}

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
    $courses = "";
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

//create student object, populate student ID, password, first name, last name from db
function DLgetStudent($con, $id) {
  $rs = mysqli_query($con, "CALL SP_getStudent($id)");
  while ($row = mysqli_fetch_array($rs)) {
      $student = new Student();
      $student->setUserID($row['studentId']);
      $student->setPassword($row['password']);
      $student->setFirstName($row['firstName']);
      $student->setLastName($row['lastName']);
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  if (!isset($student)) {
      return null;
  } else {
      return $student;
  }
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
	return mysqli_query($con, "CALL SP_changeStudentPassword($id, '$newPass')");
}

//insert student
function DLinsertStudent($con, $studentID, $password, $admin, $fname, $lname) {
  return mysqli_query($con, "CALL SP_createStudent($studentID, '$password',$admin,'$fname','$lname')");
}

//update names
function DLstudentUpdateNames($con,$id,$firstName,$lastName) {
	return mysqli_query($con, "CALL SP_updateStudentNames($id, '$firstName','$lastName')");
}

//setStudentsAvatar
function DLsetAvatarStudent($con, $id, $path){
  return mysqli_query($con, "CALL SP_setAvatarStudent($id, '$path')");
}

function DLgetAvatarStudent($con, $id){
  $rs = mysqli_query($con, "CALL SP_getAvatarStudent($id)");

  while ($row = mysqli_fetch_array($rs)) {
      $path = $row['avatarPath'];
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  return $path;
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

//create admin object, populate admin ID, password, first name, last name from db
function DLgetAdmin($con, $id) {
  $rs = mysqli_query($con, "CALL SP_getAdmin($id)");
  while ($row = mysqli_fetch_array($rs)) {
      $admin = new Admin();
      $admin->setUserID($row['adminId']);
      $admin->setPassword($row['password']);
      $admin->setFirstName($row['firstName']);
      $admin->setLastName($row['lastName']);
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  if (!isset($admin)) {
      return null;
  } else {
      return $admin;
  }
}

function DLinsertAdmin($con, $adminId, $password, $fname, $lname) {
  return mysqli_query($con, "CALL SP_createAdmin($adminId, '$password','$fname','$lname')");
}

function DLadminPasswordChange($con, $adminId, $newPass){
  return mysqli_query($con, "CALL SP_changeAdminPassword($adminId, '$newPass')");
}

//update names
function DLadminUpdateNames($con,$id,$firstName,$lastName) {
	return mysqli_query($con, "CALL SP_updateAdminNames($id, '$firstName','$lastName')");
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

//create instructor object, populate instructor ID, password, first name, last name from db
function DLgetInstructor($con, $id) {
  $rs = mysqli_query($con, "CALL SP_getInstructor($id)");
  while ($row = mysqli_fetch_array($rs)) {
      $instructor = new Instructor();
      $instructor->setUserID($row['instructorId']);
      $instructor->setPassword($row['password']);
      $instructor->setFirstName($row['firstName']);
      $instructor->setLastName($row['lastName']);
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  if (!isset($instructor)) {
      return null;
  } else {
      return $instructor;
  }
}

//get an array of all of the instructors as objects
function DLgetAllInstructors($con){
  $instructors = array();
  $rs = mysqli_query($con, "CALL SP_fetchAllInstructors");
  if ($rs != false) {
    $counter = 0;
    while ($row = mysqli_fetch_array($rs)) {
      $instructor = new Instructor();
      $instructor->setUserID($row['instructorId']);
      $instructor->setFirstName($row['firstName']);
      $instructor->setLastName($row['lastName']);
      $instructors[$counter] = $instructor;
      $counter++;
    }
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  return $instructors;
}

//change instructor's password
function DLinstructorPasswordChange($con, $id, $newPass) {
	return mysqli_query($con, "CALL SP_changeInstructorPassword($id, '$newPass')");
}

function DLinsertInstructor($con, $instructorID, $password, $admin, $fname, $lname) {
  return mysqli_query($con, "CALL SP_createInstructor($instructorID, '$password',$admin,'$fname','$lname')");
}

function DLfetchAllInstructorIDs($con){
  $list = array();
  $rs = mysqli_query($con, "CALL SP_fetchAllInstructorIDs");
  if($rs != false){
    while ($row = mysqli_fetch_array($rs)) {
        $list[] = $row;
    }
  }

  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  return $list;
}

function DLinstructorUpdateNames($con,$id,$firstName,$lastName) {
	return mysqli_query($con, "CALL SP_updateInstructorNames($id, '$firstName','$lastName')");
}

//set Instructor Avatar
function DLsetAvatarInstructor($con, $id, $path){
  return mysqli_query($con, "CALL SP_setAvatarInstructor($id, '$path')");
}

function DLgetAvatarInstructor($con, $id){
  $rs = mysqli_query($con, "CALL SP_getAvatarInstructor($id)");
  $path = "";
  while ($row = mysqli_fetch_array($rs)) {
      $path = $row['avatarPath'];
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  return $path;}
//COURSES
/////////////////////////////////////
function DLGetAssigned($con, $id, $type) {
    //$ticketIDs = array();
    if ($type == 0){
    $rs = mysqli_query($con, "CALL SP_getAssignedStudent($id)");
  } else if ($type == 1){
    $rs = mysqli_query($con, "CALL SP_getAssignedInstructor($id)");
  }
    $CourseCodes = [];
    while ($row = mysqli_fetch_array($rs)) {
        $CourseCodes[] = $row['courseCode'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
        return $CourseCodes;
}

function DLgetCourseNames($con, $courseCode) {
    $rs = mysqli_query($con, "CALL SP_getCourseName($courseCode)");
    while ($row = mysqli_fetch_array($rs)){
      $courseName = $row['description'];
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return $courseName;
}

function DLgetCourseList($con) {
  $courses = array();
  $rs = mysqli_query($con, "CALL SP_getAllCourses");
  if ($rs != false) {
    $counter = 0;
    while ($row = mysqli_fetch_array($rs)) {
      $course = new Course();
      $course->setCourseCode($row['courseCode']);
      $course->setDescription($row['description']);
      $courses[$counter] = $course;
      $counter++;
    }
    //gets rid of meta
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
  }
  return $courses;
}

function DLinsertCourse($con, $courseCode, $courseDescription) {
  return mysqli_query($con, "CALL SP_createCourse($courseCode, '$courseDescription')");
}

function DLupdateCourse($con,$courseCode,$description,$isActive) {
  return mysqli_query($con, "CALL SP_updateCourse($courseCode, '$description',$isActive)");
}

//sets a course's isActive to 0
function DLremoveCourse($con, $courseCode) {
  return mysqli_query($con, "CALL SP_removeCourse($courseCode)");
}

//removes audio content based on courseCode. used when deleting a course
function DLremoveAudio($con,$courseCode) {
  return mysqli_query($con, "CALL SP_RemoveAudioContentWCourseCode($courseCode)");
}

//removes video content based on courseCode. used when deleting a course
function DLremoveVideo($con,$courseCode) {
  return mysqli_query($con, "CALL SP_RemoveVideoContentWCourseCode($courseCode)");
}

//removes text content based on courseCode. used when deleting a course
function DLremoveText($con,$courseCode) {
  return mysqli_query($con, "CALL SP_RemoveDocumentContentWCourseCode($courseCode)");
}

//removes location table rows based on courseCode. used when deleting a course.
function DLremoveLocation($con,$courseCode) {
  return mysqli_query($con, "CALL SP_RemoveLocation($courseCode)");
}

//removes instructormap rows based on courseCode. used when deleting a course.
function DLremoveAssignedInstructors($con,$courseCode) {
  return mysqli_query($con, "CALL SP_RemoveAssignedInstructors($courseCode)");
}

//removes studentmap rows based on courseCode. used when deleting a course.
function DLremoveAssignedStudents($con,$courseCode) {
  return mysqli_query($con, "CALL SP_RemoveAssignedStudents($courseCode)");
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
    if (isset($course)) {
      return $course;
    }
    else {
      return null;
    }
}

function DLgetCourseObject($con,$id) {
  $rs = mysqli_query($con, "CALL SP_getCourse($id)");
  while ($row = mysqli_fetch_array($rs)) {
      $course = new Course();
      $course->setCourseCode($row['courseCode']);
      $course->setDescription($row['description']);
      $course->setIsActive($row['active']);
  }
  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  if (isset($course)) {
    return $course;
  }
  else {
    return null;
  }
}

function DLgetFolders($con, $courseID){
		$result = mysqli_query($con, "CALL SP_getFolders($courseID)");
		while ($row = mysqli_fetch_array($result)){
			$folders[] = $row;
		}
		while (mysqli_more_results($con)) {
				mysqli_next_result($con);
		}
		return $folders;
}

function DLcreateContent($con, $type, $courseID, $location, $path, $desc){
	if ($type == "audio"){
		$result = mysqli_query($con, "CALL SP_createAudio($courseID, $location, '$path', '$desc')");
		if ($result > 0){
			return true;
		}
		else return false;
	}
	else if ($type == "video"){
		$result = mysqli_query($con, "CALL SP_createVideo($courseID, $location, '$path', '$desc')");
		if ($result > 0){
			return true;
		}
		else return false;
	}
	else if ($type == "documents"){
		$result = mysqli_query($con, "CALL SP_createDoc($courseID, $location, '$path', '$desc')");
		if ($result > 0){
			return true;
		}
		else return false;
	}
}

function DLfetchAllStudentIDs($con){
  $list = array();
  $rs = mysqli_query($con, "CALL SP_fetchAllStudentIDs");
  if($rs != false){
    while ($row = mysqli_fetch_array($rs)) {
        $list[] = $row;
    }
  }

  //gets rid of meta
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  return $list;
}

function DLfetchConversation($con, $senderId, $recipientId){

  $rs = mysqli_query($con, "CALL SP_getConversation($senderId, $recipientId)");
  while (mysqli_more_results($con)) {
      mysqli_next_result($con);
  }
  return $rs;
}

function DLdeleteOldMessages($con, $senderId, $recipientId, $time){
  $result = mysqli_query($con, "CALL SP_deleteOldMessages($time, $senderId, $recipientId)");

  if ($result > 0){
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
    return true;

  }
  else{
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
     return false;

  }
}


?>
