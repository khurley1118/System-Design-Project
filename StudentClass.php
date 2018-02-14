<?php

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

}

?>
