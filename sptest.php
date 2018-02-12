<?php
	include("utilClass.php");
	include("connect.php");
	echo "<pre>";

	$id = 12345;
	$list = utilStudentCourseList($con, $id);
	print_r($list);
	echo "</pre>";
?>
