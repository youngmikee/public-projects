<?php

class Portal_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function logoutUser($data){
		
		try{
			
			$this->db->insert('logout', array(
	            'email' => $this->validate($data),
	            'timeOut' => date("h:i:sa"),
	            'date' => date("Y/m/d")
	        ));
			
			$this->offChat();
			return TRUE;
			
		}catch(Exception $e){
			return FALSE;
		}
		
	}
	
	public function onChat(){
		
		$staffId = Session::get("staffId");
		$name = Session::get('name');
		$date = date("Y/m/d");
	
		try{
			
			$this->db->insert('chat', array(
	            'staffId' => $staffId,
	            'name' => $name,
	            'time' => date("h:i:sa"),
	            'date' => $date,
	            'status' => TRUE,
	            'engaged' => FALSE,
	            'offTime' => FALSE
	        ));
			
			Session::init();
            Session::set('chat', $staffId);
			$result = 1;
			
		}catch(Exception $e){
			$result = 0;
		}
		
		echo json_encode($result);
		
	}
	
	public function offChat(){
		
		$staffId = Session::get("staffId");
		$date = date("Y/m/d");	
		$time = date("h:i:sa");
		
		try{
						
			$servername = "localhost";
			$username = "root";
			$password = "root.user";
			$dbname = "profad";
					
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			
			//$pdo = $this->connectDb();
			
			$sql = "UPDATE chat SET status = 0, engaged = 0, offTime = '$time' WHERE staffId = '$staffId'";
			
			$query = $conn->prepare($sql);
			
			$query->execute();
			
			if($this->getConnected()){
				
				try{
					
					$sql = "UPDATE connected SET ended = 1 WHERE date = '$date' AND staff = '$staffId'";
				
					$query = $conn->prepare($sql);
					
					$query->execute();
					
					$result = 1;
					
				}catch(PDOException $e){
					$result = $e->getMessage();
				}
				
			}else{
				
				$result = 1;
			}
			
			
		}catch(PDOException $e){
			$result = $e->getMessage();
		}
		
		unset($_SESSION['chat']);
		unset($_SESSION['visitor']);
		unset($_SESSION['subject']);
		echo json_encode($result);
		$conn = null;
	}
	
	public function updateChat(){
		
		$staffId = Session::get("staffId");
		$date = date("Y/m/d");
		$time = date("h:i:sa");
		
		
		try{
						
			$servername = "localhost";
			$username = "root";
			$password = "root.user";
			$dbname = "profad";
					
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			
			//$pdo = $this->connectDb();
			
			$sql = "UPDATE chat SET time = '$time', date = '$date', status = 1, engaged = 0, offTime = FALSE WHERE staffId = '$staffId'";
			
			$query = $conn->prepare($sql);
			
			$query->execute();
			
			$result = 1;
			
			Session::set('chat', $staffId);
			
		}catch(PDOException $e){
			$result = $e->getMessage();
		}
		
		echo json_encode($result);
		$conn = null;
		
	}
	
	public function getEngaged(){
		$staff = Session::get('staffId');
		return $this->db->select("SELECT * FROM chat WHERE staffId = '$staff' AND engaged = 1 LIMIT 1");
	}
	
	public function getConnected(){
		$staff = Session::get('staffId');
		$date = date("Y/m/d");
		return $this->db->select("SELECT * FROM connected WHERE staff = '$staff' AND date = '$date' AND ended = 0 LIMIT 1");
	}
	
	
	public function getProfadMsg(){
		$result = $this->getAllDESC("messages", "receiver", "profad", "deleted", "0");
		echo json_encode($result);
	}
	
	public function getColum(){
		
		$table = $this->validate($_POST['table']);
		$col = $this->validate($_POST['col']);
		$id = $this->validate($_POST['id']);
		
		$result = $this->db->select("SELECT * FROM $table WHERE id = '$id' LIMIT 1");
		$result = $result[0][$col];
		echo json_encode($result);
		
	}
	
	public function getRowList($para){

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
			
			$sql = "SELECT * FROM $para";
			$result = $pdo->query($sql);
			$row = $result->fetchAll();
	
		}catch(PDOException $e){
			$error = 'Error fetching photos: '.$e->getMessage();
			$result = $error;
			exit();
		}
		$result = $row;
		echo json_encode($result);

	}
	
	public function delMsg(){
        $id = (int) $_POST['id'];
        
	/*	try{
				
			$this->db->delete('messages', "id = '$id'");
			$result = 1;
			echo json_encode($result);
			
		}catch(Exception $e){
			$result = FALSE;
			echo json_encode($result);
		}*/
		
		try{
						
			$servername = "localhost";
			$username = "root";
			$password = "root.user";
			$dbname = "profad";
					
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			
			//$pdo = $this->connectDb();
			
			$sql = "UPDATE messages SET deleted = 1 WHERE id = '$id'";
			
			$query = $conn->prepare($sql);
			
			$query->execute();
			
			$result = 1;
			
			//$result = $input;
			
		}catch(PDOException $e){
			$result = $e->getMessage();
		}
		
		echo json_encode($result);
	}
	
	public function viewedMsg(){
        $id = (int) $_POST['id'];
        
	/*	try{
				
			$this->db->delete('messages', "id = '$id'");
			$result = 1;
			echo json_encode($result);
			
		}catch(Exception $e){
			$result = FALSE;
			echo json_encode($result);
		}*/
		
		try{
						
			$servername = "localhost";
			$username = "root";
			$password = "root.user";
			$dbname = "profad";
					
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			
			//$pdo = $this->connectDb();
			
			$sql = "UPDATE messages SET viewed = 1 WHERE id = '$id'";
			
			$query = $conn->prepare($sql);
			
			$query->execute();
			
			$result = 1;
			
			//$result = $input;
			
		}catch(PDOException $e){
			$result = $e->getMessage();
		}
		
		echo json_encode($result);
	}
	
	public function createBusiness(){
		
		$staffId = Session::get("staffId");
	
		try{
			
			$this->db->insert('businesses', array(
				'title' => $this->validate($_POST['title']),
				'abriviation' => $this->validate($_POST['abr']),
				'type' => $this->validate($_POST['type']),
				'note' => $this->validate($_POST['note']),
	            'staffId' => $staffId
	        ));

			$result = 1;
			
		}catch(Exception $e){
			$result = 0;
		}
		
		echo json_encode($result);
		
	}
	
	public function createService(){
		
		$staffId = Session::get("staffId");
	
		try{
			
			$this->db->insert('services', array(
				'title' => $this->validate($_POST['title']),
				'business' => $this->validate($_POST['business']),
				'cost' => $this->validate($_POST['cost']),
				'note' => $this->validate($_POST['note']),
				'link' => $this->validate($_POST['link']),
	            'staffId' => $staffId
	        ));

			$result = 1;
			
		}catch(Exception $e){
			$result = 0;
		}
		
		echo json_encode($result);
		
	}
	
	public function createTraining(){
		
		$staffId = Session::get("staffId");
	
		try{
			
			$this->db->insert('training', array(
				'title' => $this->validate($_POST['title']),
				'abriviation' => $this->validate($_POST['abr']),
				'type' => $this->validate($_POST['type']),
				'note' => $this->validate($_POST['note']),
	            'staffId' => $staffId
	        ));

			$result = 1;
			
		}catch(Exception $e){
			$result = 0;
		}
		
		echo json_encode($result);
		
	}
	
	public function createCourse(){
		
		$staffId = Session::get("staffId");
	
		try{
			
			$this->db->insert('courses', array(
				'title' => $this->validate($_POST['title']),
				'abriviation' => $this->validate($_POST['abr']),
				'training' => $this->validate($_POST['training']),
				'link' => $this->validate($_POST['link']),
				'note' => $this->validate($_POST['note']),
	            'staffId' => $staffId
	        ));

			$result = 1;
			
		}catch(Exception $e){
			$result = 0;
		}
		
		echo json_encode($result);
		
	}
	
	public function createSubject(){
		
		$staffId = Session::get("staffId");
	
		try{
			
			$this->db->insert('subjects', array(
				'title' => $this->validate($_POST['title']),
				'course' => $this->validate($_POST['course']),
				'training' => $this->validate($_POST['training']),
				'duration' => $this->validate($_POST['duration']),
				'cost' => $this->validate($_POST['cost']),
				'note' => $this->validate($_POST['note']),
				'location' => $this->validate($_POST['location']),
				'link' => $this->validate($_POST['link']),
	            'staffId' => $staffId
	        ));

			$result = 1;
			
		}catch(Exception $e){
			$result = 0;
		}
		
		echo json_encode($result);	
		
	}
	
	public function createNews(){
	
		$staffId = Session::get("staffId");
	
		try{
			
			$this->db->insert('news', array(
				'title' => $this->validate($_POST['title']),
				'headline' => $this->validate($_POST['headline']),
				'news' => $this->validate($_POST['news']),
				'image' => $this->validate($_POST['image']),
				'date' => date("Y/m/d"),
	            'staffId' => $staffId,
				'deleted' => FALSE
	        ));

			$result = 1;
			
		}catch(Exception $e){
			$result = 0;
		}
		
		echo json_encode($result);	
		
	}
	
	public function updateTable(){
		
		$staffId = Session::get("staffId");
		$table = $this->validate($_POST['dbTable']);
		$row = $this->validate($_POST['dbRow']);
		$column = $this->validate($_POST['dbColumn']);
		$input = $this->validate($_POST['dbInput']);
		
		try{
						
			$servername = "localhost";
			$username = "root";
			$password = "root.user";
			$dbname = "profad";
					
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			
			//$pdo = $this->connectDb();
			
			$sql = "UPDATE $table SET $column = '$input' WHERE title = '$row'";
			
			$query = $conn->prepare($sql);
			
			$query->execute();
			
			$result = $query->rowCount();
			
			//$result = $input;
			
		}catch(PDOException $e){
			$result = $e->getMessage();
		}
		
		echo json_encode($result);
		$conn = null;
		
	}
	
	public function deleteRow(){
		
		$staffId = Session::get("staffId");
		$table = $this->validate($_POST['dbTable']);
		$row = $this->validate($_POST['dbRow']);
		
		try{
						
			$servername = "localhost";
			$username = "root";
			$password = "root.user";
			$dbname = "profad";
					
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			
			//$pdo = $this->connectDb();
			
			$sql = "UPDATE $table SET staffId = '$staffId', deleted = 1 WHERE title = '$row'";
			
			$query = $conn->prepare($sql);
			
			$query->execute();
			
			$result = 1;
			
			//$result = $input;
			
		}catch(PDOException $e){
			$result = $e->getMessage();
		}
		
		echo json_encode($result);
		$conn = null;
		
	}
	
	private function connectDb(){
		try{
			$pdo = new PDO('mysql:host=localhost;dbname=profad', 'root', 'root.user');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->exec('SET NAMES "utf8"');
		}catch(PDOException $e){
			$error = 'Unable to connect to the database server: '.$e->getMessage();
			$result = $error;
			exit();
		}
		return $pdo;
	}
    

}