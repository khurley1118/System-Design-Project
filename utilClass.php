<?php

include("DataLayer.php");

//STUDENT/////////////////////////////////////
function utilStudentFirst($con, $id) {
    return DLgetStudentFirst($con, $id);
}

function utilStudentLast($con, $id) {
    return DLgetStudentLast($con, $id);
}

function utilStudentCourseList($con, $id) {
    return DLgetStudentCourses($con, $id);
}

function utilStudentGetPassword($con,$id){
	return DLgetStudentPassword($con,$id);
}

function getStudent($con,$id){
  return DLgetStudent($con,$id);
}

// INSTRUCTOR /////////////////////////////////
function utilInstructorFirst($con, $id) {
    return DLgetInstructorFirst($con, $id);
}

function utilInstructorLast($con, $id) {
    return DLgetInstructorLast($con, $id);
}

function utilInstructorCourses($con, $id) {
    return DLgetInstructorCourses($con, $id);
}

function utilInstructorGetPassword($con,$id){
	return DLgetInstructorPassword($con,$id);
}

function getInstructor($con,$id){
  return DLgetInstructor($con,$id);
}

// ADMIN /////////////////////////////////////
function utilAdminFirst($con, $id) {
    return DLgetAdminFirst($con, $id);
}

function utilAdminlast($con, $id) {
    return DLgetAdminLast($con, $id);
}

function getAdmin($con,$id){
  return DLgetAdmin($con,$id);
}

// COURSES ///////////////////////////////
function utilCourseName($con, $id) {
    return DLgetCourseName($con, $id);
}

function utilGetFolders($con, $courseid){
	return DLgetFolders($con, $courseid);
}
?>
