<?php
//include("connect.php");
//Student
///////////////////////////////////
	function DLgetStudentFirst($con, $id) {
		$rs = mysqli_query($con, "CALL SP_getStudentFirst($id)");
		while ($row = mysqli_fetch_array($rs)) {
			$firstName = $row['firstName'];
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
		return $firstName;
	}

	function DLgetStudentLast($con, $id){
		$rs = mysqli_query($con, "CALL SP_getStudentLastName($id)");
		while ($row = mysqli_fetch_array($rs)){
			$lastName = $row['lastName'];
		}

		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
		return $lastName;
	}
	function DLgetStudentCourses($con, $id){
		$rs = mysqli_query($con, "CALL SP_getStudentCourses($id)");
		while ($row = mysqli_fetch_array($rs)){
			$courses[] = $row["courseCode"];
		}
		return $courses;
	}
//ADMIN
///////////////////////////////////////
	function DLgetAdminFrist($id){
		$rs = mysqli_query($con, "CALL SP_getAdminFirstName($id)");
		while ($row = mysqli_fetch_array($rs)){
			$firstName = $row['firstName'];
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}
	function DLgetAdminLast($id){
		$rs = mysqli_query($con, "CALL SP_getAdminLastName($id)");
		while ($row = mysqli_fetch_array($rs)){
			$lastName = $row['lastName'];
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}
//INSTRUCTOR
//////////////////////////////////////
	function DLgetInstructorFirst($con, $id){
		$rs = mysqli_query($con, "CALL SP_getInstructorFirstName($id)");
		while ($row = mysqli_fetch_array($rs)){
			$firstName = $row['firstName'];
			return $firstName;
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}
	function DLgetInstructorLast($id){
		$rs = mysqli_query($con, "CALL SP_GetInstructorLastName($id)");
		while ($row = mysqli_fetch_array($rs)){
			$lastName = $row['lastName'];
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}
	function DLgetInstructorCourses($con, $id){
		$x = mysqli_query($con, "CALL SP_getInstructorCourses($id)");
		while ($row2 = mysqli_fetch_array($x)){
			$courses[] = $row2;
		}
		return $courses;
	}

//COURSES
/////////////////////////////////////
	function DLgetCourseList($con){
		$rs = mysqli_query($con, "CALL SP_getAllCourses");
		while ($row = mysqli_fetch_array($rs)){
			$list[] = $row;
			//Index 0 = Course code
			//Index 1 = Course description
		}
		return $list;
	}
	function DLupdateCourse($courseID){

	}
	function DLRemoveCourse($courseID){

	}
?>
