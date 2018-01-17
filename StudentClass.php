<?php
	private $studentID
	private $password
	private $firstName
	private $lastName

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

	function __construct($studentID, $FirstName, $LastName, $Password) {
		$this->setStudentID($InstructorId);
		$this->setFirstName($FirstName);
		$this->setLastName($LastName);
		$this->setPassword($Password);
	}

?>