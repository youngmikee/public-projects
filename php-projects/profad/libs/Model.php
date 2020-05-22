<?php

class Model {

    function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
	
	public function getByLink($table, $link){
		
		return $this->db->select("SELECT * FROM $table WHERE link = '$link' Limit 1");
		
	}

	public function getByStaffId($table, $link){
		
		return $this->db->select("SELECT * FROM $table WHERE staffId = '$link' Limit 1");
		
	}
	
	public function getRegistered($table, $email, $staffId){
		
		return $this->db->select("SELECT * FROM $table WHERE email = '$email' AND staffId = '$staffId' Limit 1");
		
	}
	
	public function getByEmail($table, $email){
		
		return $this->db->select("SELECT * FROM $table WHERE email = '$email' Limit 1");
		
	}

	public function getByEmailandPwd($table, $email, $pwd){
		
		return $this->db->select("SELECT * FROM $table WHERE email = '$email' and password = '$pwd' Limit 1");
		
	}
	
	public function getAll($table = "", $column = "", $value = "", $column2 = "", $value2 = ""){
		
		if($table != "" && $column != "" && $value != "" && $column2 != "" & $value2 != ""){
			
			return $this->db->select("SELECT * FROM $table WHERE $column = '$value' AND $column2 = '$value2' ");
			
		}elseif($table != "" && $column != "" && $value != ""){
			
		  	return $this->db->select("SELECT * FROM $table WHERE $column = '$value'");
			
		}elseif($column == "" && $value == "" && $table != ""){
			
			return $this->db->select("SELECT * FROM $table");
			
		}else{
			
			return "Error";
			
		}

	}


	public function getAllDESC($table = "", $column = "", $value = "", $column2 = "", $value2 = "", $order = "id DESC"){
		
		if($table != "" && $column != "" && $value != "" && $column2 != "" & $value2 != ""){
			
			return $this->db->select("SELECT * FROM $table WHERE $column = '$value' AND $column2 = '$value2' ORDER BY id DESC ");
			
		}elseif($table != "" && $column != "" && $value != ""){
			
		  	return $this->db->select("SELECT * FROM $table WHERE $column = '$value' ORDER BY id DESC ");
			
		}elseif($column == "" && $value == "" && $table != ""){
			
			return $this->db->select("SELECT * FROM $table ORDER BY id DESC ");
			
		}else{
			
			return "Error";
			
		}

	}

	
	public function getThree($table = "", $column = "", $value = ""){
		if($table != "" && $column != "" && $value != ""){
			
			return $this->db->select("SELECT * FROM $table WHERE $column = '$value' LIMIT 3");
			
		}elseif($column == "" && $value == "" && $table != ""){
			
			return $this->db->select("SELECT * FROM $table Limit = $limit");
			
		}else{
			
			return "Error";
			
		}
	}
	
	
	public function getColumns($para){
			
		try{
			$pdo = new PDO('mysql:host=localhost;dbname=profad', 'root', 'root.user');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->exec('SET NAMES "utf8"');
		}catch(PDOException $e){
			$error = 'Unable to connect to the database server: '.$e->getMessage();
			$result = $error;
			exit();
		}
		
		try{
			$q = $pdo->prepare("DESCRIBE $para");
			$q->execute();
			$result = $q->fetchAll(PDO::FETCH_COLUMN);
		}catch(PDOException $e){
			$error = 'Database error counting photos: '.$e->getMessage();
			$result = $error;
		}
		
		echo json_encode($result);
		
	}
	
	public function saveChat($msgId, $sender){
		
		$time = date("h:i:sa");
		$date = date("Y/m/d");
	
		try{
			
			$this->db->insert("messenger", array(
				'messageId' => $msgId,
				'message' => $this->validate($_POST['msg']),
				'sender' => $sender,
				'time' => $time,
				'date' => $date,
				'deleted' => FALSE
	        ));

			$result = 1;
			
		}catch(Exception $e){
			$result = $name;
		}
		
		echo json_encode($result);
		
	}

	protected function validate($data) {
 		$data = trim($data);
 		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	
}