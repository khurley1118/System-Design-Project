<?php
//needs data layer functions but should be accessible because utilClass.php includes DataLayer.php and it is included in Header.php
//include("DataLayer.php");

//Instructor class for TuPro.
//private attributes
Class Instructor {

    private $instructorID;
    private $password;
    private $firstName;
    private $lastName;
    private $addedBy;
    private $courses = [];

    //getters/setters

    function setUserID($instructorID) {
        $this->instructorID = $instructorID;
    }

    function getUserID() {
        return $this->instructorID;
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

    //constructor
    function __construct() {

    }

    //calls DL function to change password
	function ChangePassword($con,$newPass) {
		return DLinstructorPasswordChange($con, $this->getUserID(), $newPass);
	}

  //calls DL function to insert new instructor
  function InsertInstructor($con){
    return DLinsertInstructor($con, $this->getUserID(), $this->getPassword(), $this->getAddedBy(), $this->getFirstName(), $this->getLastName());
  }

  //calls DL function to update Instructor's first and last names
  function UpdateNames($con) {
		return DLinstructorUpdateNames($con, $this->getUserID(), $this->getFirstName(), $this->getLastName());
	}
}

?>
