<?php
//needs data layer functions but should be accessible because utilClass.php includes DataLayer.php and it is included in Header.php
//include("DataLayer.php");

class Student {

    private $studentID;
    private $password;
    private $firstName;
    private $lastName;
    private $addedBy;
    private $courses = [];

    function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    function getStudentID() {
        return $this->studentID;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getPassword() {
        return $this->password;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function setAddedBy($addedBy) {
        $this->addedBy = $addedBy;
    }

    function getAddedBy() {
        return $this->addedBy;
    }

    function getCourses() {
        return $this->courses;
    }

    function setCourses($courses) {
        $this->courses = $courses;
    }

    function __construct() {

    }

//functions
	//calls DL function to change password
	function ChangePassword($con,$newPass) {
		return DLstudentPasswordChange($con, $this->getStudentID(), $newPass);
	}

  //calls DL function to insert new student
  function InsertStudent($con){
    return DLinsertStudent($con, $this->getStudentID(), $this->getPassword(), $this->getAddedBy(), $this->getFirstName(), $this->getLastName());
  }
}

?>
