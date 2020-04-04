<?php

class Database {

	public $conn;

	public function __construct(){

		$this->conn = mysqli_connect("localhost","root","","task");

		if(!$this->conn){

			echo "Connection error";
			return false;

		}
	}

	public function execute($qry){

			$res = $this->conn->query($qry) or die($this->conn->error. __LINE__);

		if($res){

			return $res;
		
		}else{
		
			return false;
		}

	}


}