<?php
//needs data layer functions but should be accessible because utilClass.php includes DataLayer.php and it is included in Header.php
//include("DataLayer.php");

//Instructor class for TuPro.
//private attributes
Class Instructor {

    private $instructorId;
    private $password;
    private $firstName;
    private $lastName;
    private $courses = [];

    //getters/setters

    function setInstructorId($instructorId) {
        $this->instructorId = $instructorId;
    }

    function getInstructorId() {
        return $this->instructorId;
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

    function getCourses() {
        return $this->courses;
    }

    function setCourses($courses) {
        $this->courses = $courses;
    }

    //constructor
    function __construct() {
        
    }

    //verifies that inputted old password matches db old password
	function ChangePassword($con,$origPass,$newPass) {
		if ($origPass == utilInstructorGetPassword($con,getInstructorId())) { //the inputted old password matches the db password
			return DLinstructorPasswordChange($con, getInstructorId(), $newPass);
		}
		else {
			//the inputted old password doesn't match the db password
		}
		
	}
}

?>
