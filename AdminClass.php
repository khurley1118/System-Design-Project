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
	function __construct() {
	}

	//to do: functions will go below

?>
