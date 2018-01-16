<?php
	//Admin class for TuPro.

	//private attributes
	
	private $adminId;
	private $password;
	private $firstName;
	private $lastName;
	
	//getters/setters
	
	function setAdminId ($adminId) {
		$this->adminId = $adminId;
	}
	function getAdminId() {
		return $this->adminId;
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
	function __construct($AdminId, $FirstName, $LastName, $Password) {
		$this->setUserName($AdminId);
		$this->setFirstName($FirstName);
		$this->setLastName($LastName);
		$this->setPassword($Password);
	}
	
	//to do: functions will go below
	
?>