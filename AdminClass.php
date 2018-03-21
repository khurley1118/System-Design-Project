<?php

//Admin class for TuPro.
//private attributes
class Admin {

    private $adminId;
    private $password;
    private $firstName;
    private $lastName;

    //getters/setters

    function setUserID($adminId) {
        $this->adminId = $adminId;
    }

    function getUserID() {
        return $this->adminId;
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

    //constructor
    function __construct() {

    }

    //to do: functions will go below
    //calls DL function to change password
  	function ChangePassword($con,$newPass) {
  		return DLadminPasswordChange($con, $this->getUserID(), $newPass);
  	}

    //calls DL function to insert new student
    function InsertAdmin($con){
      return DLinsertAdmin($con, $this->getUserID(), $this->getPassword(), $this->getFirstName(), $this->getLastName());
    }

    //calls DL function to update Admin's first and last names
    function UpdateNames($con) {
  		return DLadminUpdateNames($con, $this->getUserID(), $this->getFirstName(), $this->getLastName());
  	}
}

?>
