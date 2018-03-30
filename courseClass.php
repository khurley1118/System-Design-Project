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
	function setIsActive($active){
		$this->isActive = $active;
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

	//calls DL function to update course description for now
  function UpdateCourse($con) {
		return DLupdateCourse($con, $this->getCourseCode(), $this->getDescription());
	}

	static function GetCourseList($con){
		return DLgetCourseList($con);
	}

	//update the description
	function updateDescription($con){
		//check if the course has values
		if($this->getCourseCode() != "" && $this->getDescription() != ""){
			return DLupdateCourseDescription($con, $this->getCourseCode(), $this->getDescription());
		}
		else{
			return false;
		}
	}

}
?>
