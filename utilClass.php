<?php

include("DataLayer.php");

//STUDENT/////////////////////////////////////
function utilStudentFirst($con, $id) {
    return DLgetStudentFirst($con, $id);
}
function utilCheckAvatar($path){
  return DLcheckAvatar($path);
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

function utilGetAllStudentIDs($con){
  return DLfetchAllStudentIDs($con);
}

function  utilSetStudentAvatar($con, $id, $path){
  return DLsetAvatarStudent($con, $id, $path);
}

function utilGetAvatarStudent($con, $id){
  return DLgetAvatarStudent($con, $id);
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

function utilGetAllInstructorIDs($con){
  return DLfetchAllInstructorIDs($con);
}

function utilSetInstructorAvatar($con, $id, $path){
  return DLsetAvatarInstructor($con, $id, $path);
}

function utilGetAvatarInstructor($con, $id){
  return DLgetAvatarInstructor($con, $id);
}

function getInstructor($con,$id){
  return DLgetInstructor($con,$id);
}

function getAllInstructors($con){
  return DLgetAllInstructors($con);
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

function GetCourseObject($con,$id){
  return DLgetCourseObject($con,$id);
}

function GetCourseObjectWName($con,$description){
  return DLgetCourseObjectWName($con,$description);
}

function utilGetFolders($con, $courseid){
	return DLgetFolders($con, $courseid);
}

function utilAddInstructorToCourse($con, $id, $course){
  return DLaddIntsructorToCourse($con, $id, $course);
}

function utilUnassignInstructor($con, $id, $courseCode){
  return DLunassignInstructor($con, $id, $courseCode);
}

function utilGetCourseInstructor($con, $courseId){
  return DLgetCourseInstructor($con, $courseId);
}

function utilUpdateCourseInstructor($con, $id, $courseCode){
  return DLupdateInstructor($con, $id, $courseCode);
}

function utilAddStudentToCourse($con, $id, $courseId){
  return DLaddStudentToCourse($con, $id, $courseId);
}

function utilRemoveStudentFromCourse($con, $id, $courseId){
  return DLremoveStudentFromCourse($con, $id, $courseId);
}

// CHAT //////////////////////////////////
function utilGetConversation($con, $senderId, $recipientId){
  return DLfetchConversation($con, $senderId, $recipientId);
}

function utilDeleteOldMessages($con, $senderId, $recipientId, $time){
  return DLdeleteOldMessages($con, $senderId, $recipientId, $time);
}
?>
