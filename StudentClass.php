<?php
//needs data layer functions but should be accessible because utilClass.php includes DataLayer.php and it is included in Header.php
//include("DataLayer.php");

class Student {

    private $studentID;
    private $password;
    private $firstName;
    private $lastName;
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

    function getCourses() {
        return $this->courses;
    }

    function setCourses($courses) {
        $this->courses = $courses;
    }

    function __construct() {

    }

	//calls DL function to change password
	function ChangePassword($con,$newPass) {
		return DLstudentPasswordChange($con, $this->getStudentID(), $newPass);
	}
}

?>
