<?php

class Database{
 
	var $servername = "localhost";
    var $username = "root";
    var $password = "";
	var $db = "payment_api";
	var $conn;
 
	function __construct(){
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
 
		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
        }
        
        $this->conn = $conn;
	}
}