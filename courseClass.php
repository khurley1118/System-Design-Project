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

	//used to set delete course (sets isActive to 0, deletes relevant content from audio, video, doc tables, removes location from location table, removes assigned students/instructors)
	function removeCourse($con) {
		$removeCourseSuccess = DLremoveCourse($con, $this->getCourseCode());
		$removeAudioSuccess = DLremoveAudio($con, $this->getCourseCode());
		$removeVideoSuccess = DLremoveVideo($con, $this->getCourseCode());
		$removeTextSuccess = DLremoveText($con, $this->getCourseCode());
		$removeLocationSuccess = DLremoveLocation($con, $this->getCourseCode());
		$removeAssignedInstructorSuccess = DLremoveAssignedInstructors($con, $this->getCourseCode());
		$removeAssignedStudentSuccess = DLremoveAssignedStudents($con, $this->getCourseCode());

		return $removeCourseSuccess;
	}
}
?>
