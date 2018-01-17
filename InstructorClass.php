<?php
	//Instructor class for TuPro.

	//private attributes
	
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
		return this->password;
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
	function __construct($InstructorId, $FirstName, $LastName, $Password) {
		$this->setInstructorId($InstructorId);
		$this->setFirstName($FirstName);
		$this->setLastName($LastName);
		$this->setPassword($Password);
	}
	
	//to do: functions will go below
	
?>