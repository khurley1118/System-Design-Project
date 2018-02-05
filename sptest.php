<?php
	include("DataLayer.php");
	echo "<pre>";
	include("connect.php");
// TEST FOR COURSE LIST
	// $list = DLgetCourseList($con);
	// foreach ($list as $item){
	// 	echo $item[0] . " ".$item[1] .  "\n";
	// }
	$id = 12345;
	$courselist = DLgetStudentCourses($con,$id);
	$courseCounter = 0;
	//print_r($courselist);

	foreach ($courselist as $course){
		$courseName = DLgetCourseName($con, $course);

		echo $course . " " . $courseName . "<BR>";
		$courseCounter++;
	}

	print_r(DLgetStudentFirst($con, 12345) . " " . DLgetStudentLast($con, 12345) . "<BR>");

//TEST FOR STUDENT COURSES
	// $x = 0;
	// $studentCourseList = DLgetStudentCourses($con, 12345);
	// foreach($studentCourseList as $course){
	// 	//print_r($studentCourseList);
	// 	print_r($studentCourseList[$x] . "\n");
	// 	$x++;
	// }
// TEST FOR INSTRUCTOR COURSES
	// $l2 = DLgetInstructorCourses($con, 54321);
	// $x = 0;
	// foreach ($l2 as $course){
	// 	print_r("Course Code: " . $l2[$x]['courseCode'] . "\n");
	// 	$x++;
	// }
	//print_r($l2);
	echo "</pre>";
?>
