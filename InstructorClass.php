<?php
	//Instructor class for TuPro.

	//private attributes
	Class Instructor{
	private $instructorId;
	private $password;
	private $firstName;
	private $lastName;

	//getters/setters

	function setInstructorId ($instructorId) {
		$this->instructorId = $instructorId;
	}
	function getInstructorId() {
		return $this->instructorId;
	}

	function setPassword ($password) {
		$this->password = $password;
	}

	function getPassword() {
		return $this->password;
	}

	function setFirstName ($firstName) {
		$this->firstName = $firstName;
	}
	function getFirstName() {
		return $this->firstName;
	}

	function setLastName ($lastName) {
		$this->lastName = $lastName;
	}
	function getLastName() {
		return $this->lastName;
	}

	//constructor
	function __construct() {
		
	}

	//to do: functions will go below
}
?>
