<?php
include('connect.php');
//Student
///////////////////////////////////
	DLgetStudentFirst($id){
		$rs = mysqli_query($con, 'CALL SP');
		while ($row = mysqli_fetch_array($rs)){
			$firstName = $row['firstName'];
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}

	DLgetStudentLast($id){
		$rs = mysqli_query($con, 'CALL SP');
		while ($row = mysqli_fetch_array($rs)){
			$lastName = $row['lastName'];
		}

		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}
	DLgetStudentCourses($id){



	}
//ADMIN
///////////////////////////////////////
	DLgetAdminFrist($id){
		$rs = mysqli_query($con, 'CALL SP');
		while ($row = mysqli_fetch_array($rs)){
			$firstName = $row['firstName'];
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}
	DLgetAdminLast($id){
		$rs = mysqli_query($con, 'CALL SP');
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
	DLgetInstructorFirst($id){
		$rs = mysqli_query($con, 'CALL SP');
		while ($row = mysqli_fetch_array($rs)){
			$firstName = $row['firstName'];
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}
	DLgetInstructorLast($id){
		$rs = mysqli_query($con, 'CALL SP');
		while ($row = mysqli_fetch_array($rs)){
			$lastName = $row['lastName'];
		}
		//gets rid of meta
		while(mysqli_more_results($con)){
			mysqli_next_result($con);
		}
	}
	DLgetInstructorCourses($id){

	}

//COURSES
/////////////////////////////////////
	DLgetCourseList(){

	}
	DLupdateCourse($courseID){

	}
	DLRemoveCourse($courseID){

	}
?>
