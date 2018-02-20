<?php
	include("utilClass.php");
	include("connect.php");

	$courseID = 52;
	$folders = DLgetFolders($con, $courseID);
	foreach ($folders as $folder){
			echo "  ID: ";
			echo $folder['location_id'];
			echo "<BR>   NAME:";
			echo $folder['name'];
			echo "<BR>  PARENT:";
			echo $folder['parent'];
			echo "<BR><BR>";
	}
	$ms1 = "file";
	$rs = DLcreateContent($con, "audio", 52, 1, "fasdfasdfads", 'texthere');
	echo "RESULT:";
	echo mysqli_error($con);
	echo $rs;
?>
