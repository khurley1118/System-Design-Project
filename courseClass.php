<?php
class Course{
	private $courseCode;
	private $description;
	private $isActive;

	//sets
	function setCourseCode($cCode){
		$this->courseCode = $cCode;
	}
	function setDescription($desc){
		$this->description = $desc;
	}
	function setIsActive($coursid){
		$this->courseCode = $courseid;
	}

	//gets
	function getCourseCode(){
		return $this->courseCode;
	}
	function getDescription(){
		return $this->description;
	}
	function getIsActive(){
		return $this->isActive;
	}

	function __construct() {

	}

	function nameByCode($con, $courseCode){
		$courseName = DLgetCourseName($con, $courseCode);
	}

	function insertCourse($con){
		return DLinsertCourse($con, $this->getCourseCode(), $this->getDescription());
	}
}
?>
