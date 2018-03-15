<?php
//needs data layer functions but should be accessible because utilClass.php includes DataLayer.php and it is included in Header.php
//include("DataLayer.php");

//Ticket class for TuPro.
//private attributes
Class Ticket {

    private $ticketID;
    private $description;
    private $firstName;
    private $lastName;
    private $submittedBy;
    private $date;
    private $status;

    //getters/setters
    public function getStatus(){
		return $this->status;
  	}

  	public function setStatus($status){
  		$this->status = $status;
  	}

    public function getTicketID(){
  	return $this->ticketID;
  	}

  	public function setTicketID($ticketID){
  		$this->ticketID = $ticketID;
  	}

  	public function getDescription(){
  		return $this->description;
  	}

  	public function setDescription($description){
  		$this->description = $description;
  	}

  	public function getFirstName(){
  		return $this->firstName;
  	}

  	public function setFirstName($firstName){
  		$this->firstName = $firstName;
  	}

  	public function getLastName(){
  		return $this->lastName;
  	}

  	public function setLastName($lastName){
  		$this->lastName = $lastName;
  	}

  	public function getSubmittedBy(){
  		return $this->submittedBy;
  	}

  	public function setSubmittedBy($submittedBy){
  		$this->submittedBy = $submittedBy;
  	}

  	public function getDate(){
  		return $this->date;
  	}

  	public function setDate($date){
  		$this->date = $date;
  	}

    //constructor
    function __construct() {

    }

    //calls DL function to get all un-resolved Tickets to populate drop down select
    function getTickets($con) {
    	return DLgetTickets($con);
    }

    //calls DL function to return specific Ticket selected in drop down
    function getTicket($con, $id){
      return DLgetTicket($con, $id);
      //returns ticket OBJECT~~!
    }

    //calls DL function to insert a Tickets
    function insertTicket($con, $desc, $fNm, $lNm, $subBy) {
      return DLinsertTicket($con, $desc, $fNm, $lNm, $subBy);
    }

    //calls DL function to set specific ticket to resolved
    function resolveTicket($con, $id){
      return DLresolveTicket($con, $id);
    }

}


?>
