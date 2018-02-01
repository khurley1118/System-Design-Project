<?php
	include("DataLayer.php");
	echo "<pre>";
	$list = DLgetCourseList($con);
	foreach ($list as $item){
		echo $item[0] . " ".$item[1] .  "\n";
	}
	$l2 = DLgetInstructorCourses($con, 54321);
	print_r($l2);
	echo "</pre>";
?>
