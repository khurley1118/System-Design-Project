<?php
include('utilClass.php');
include('connect.php');
include('StudentClass.php');
include('InstructorClass.php');
include('courseClass.php');
session_start();
$id = $_SESSION['userID'];
$userType = $_SESSION['userType'];
$user = $_SESSION['CurrentUser'];

//get course from dropdown menu on form
$courseCode = $_POST["courseList"];

//getting course from dropdown, so no need to validate. make course object, call delete method
$course = GetCourseObject($con,$courseCode);

//need to delete course from db, delete folders for that course, and delete content from db.
//delete course
$course->removeCourse($con);

//delete folders for the course
$dirPath = 'Content/' . $course->getDescription();
if (! is_dir($dirPath)) {
    throw new InvalidArgumentException("$dirPath must be a directory");
}
if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
    $dirPath .= '/';
}
$files = glob($dirPath . '*', GLOB_MARK);
foreach ($files as $file) {
    if (is_dir($file)) {
        self::deleteDir($file);
    } else {
        unlink($file);
    }
}
rmdir($dirPath);

//delete content from db


// if (is_null(utilCourseName($con,$courseCode))) {
//   //create course object and set attributes
//   $course = new Course();
//   $course->setCourseCode($courseCode);
//   $course->setDescription($courseDescription);
//
//   //call insert function
//   $success = $course->insertCourse($con);
//   if ($success) {
//     //insert was successful, create course folder, destruct object, redirect to AdminPage
//     $_SESSION['insertCourse'] = 1;
//     //note: below uses description as folder name, as description is really more of a title
//     if (!file_exists('Content/' . $course->getDescription())) { //should this have an else condition?
//     mkdir('Content/' . $courseDescription, 0777, true);
//     }
//     unset($course);
//   }
//   else {
//     //insert was not sucessful, display error message
//     $_SESSION['insertCourse'] = 2;
//     unset($course);
//   }
// }
// else {
//   //course with that code already exists.
//   $_SESSION['insertCourse'] = 3;
// }
//
// header('Location: AdminPage.php');
?>
