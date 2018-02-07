<?php
//STUDENT/////////////////////////////////////
function utilStudentFirst($con, $id){
	return DLgetStudentFirst($con, $id);
}

function utilStudentLast($con, $id){
	return DLgetStudentLast($con, $id);
}

function utilStudentCourseList($con, $id){
	return DLgetStudentCourses($con, $id);
}
// INSTRUCTOR /////////////////////////////////
function utilInstructorFirst($con, $id){
	return DLgetInstructorFirst($con, $id);
}
function utilInstructorLast($con, $id){
	return DLgetInstructorLast($con, $id);
}
function utilInstructorCourses($con, $id){
	return DLgetInstructorCourses($con, $id);
}
// ADMIN /////////////////////////////////////
	function utilAdminFirst($con, $id){
		return DLgetAdminFirst($con, $id);
	}
	function utilAdminlast($con, $id){
		return DLgetAdminLast($con, $id);
	}
// COURSES ///////////////////////////////
function utilCourseName($con, $id){
	return DLgetCourseName($con, $id);
}
?>
