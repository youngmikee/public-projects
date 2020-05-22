<?php

class contactUs_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }
	

    public function getAllDepartments($name)
    {

        return $this->db->select("SELECT * FROM course_departments WHERE type = '$name'");
		
    }
	
    public function getAllCourses($name)
    {

        return $this->db->select("SELECT * FROM courses WHERE type = '$name'");
		
    }
	
	public function sendOfflineMessage($data){
		
		try{
			
			$this->db->insert('messages', array(
	        	'sender' => $this->validate($data['name']),
	        	'receiver' => 'profad',
	            'senderEmail' => $this->validate($data['email']),
	            'receiverEmail' => 'info@profad.org',
	            'subject' => $this->validate($data['subject']),
	            'message' => $this->validate($data['message']),
	            'date' => date("Y/m/d"),
	            'important' => FALSE,
	            'deleted' => FALSE
	        ));
			
			return TRUE;
			
		}catch(Exception $e){
			return FALSE;
		}
		
		
	}
	
	public function sendApplication($data){
		
		try{
			
			$this->db->insert('messages', array(
	        	'sender' => $this->validate($data['name']),
	        	'receiver' => 'profad',
	            'senderEmail' => $this->validate($data['email']),
	            'receiverEmail' => 'info@profad.org',
	            'subject' => 'Course Application',
	            'message' => 'I my name is '. $this->validate($data['name']) .' and i will like to apply for your '. $this->validate($data['course']). 'Please contact me on: '.$this->validate($data['email']) .' or on: '. $this->validate($data['mobile']),
	            'date' => date("Y/m/d"),
	            'important' => TRUE,
	            'deleted' => FALSE
	        ));
			
			return TRUE;
			
		}catch(Exception $e){
			return FALSE;
		}
		
	}
	
	public function connect($staff, $data){
		
		$staff = $staff[0]['staffId'];
		$visitorIp = $_SERVER['REMOTE_ADDR'];

		try{
			
			$this->db->insert('connected', array(
	        	'visitor' => $this->validate($data['name']),
	        	'staff' => $staff,
	            'visitorEmail' => $this->validate($data['email']),
	            'subject' => $this->validate($data['subject']),
	            'visitorIp' => $visitorIp,
	            'time' => date("h:i:sa"),
	            'date' => date("Y/m/d"),
	            'ended' => FALSE
	        ));
			
			session_start();
			$_SESSION['staff'] = $staff;
			$_SESSION['visitor'] = $data['name'];
			$_SESSION['visitorIp'] = $_SERVER['REMOTE_ADDR'];
			
			return 1;
			
		}catch(Exception $e){
			return $e->getMessage();
		}
		
	}
	
	public function chatAvailable(){
		$date = date("Y/m/d");
		
		try{
			return $this->db->select("SELECT * FROM chat WHERE date ='$date' AND status = 1 AND engaged = 0 LIMIT 1");
		}catch(Exception $e){
			return $e->getMessage();
		}
		
	}
	
	public function getEngaged($staff){
		return $this->db->select("SELECT * FROM chat WHERE staffId = '$staff' AND engaged = 1 LIMIT 1");
	}
	
	public function getConnected($staff, $visitor, $msgId){
		$date = date("Y/m/d");
		return $this->db->select("SELECT * FROM connected WHERE staff = '$staff' AND visitor = '$visitor' AND date = '$date' AND ended = 0 LIMIT 1");
	}
	
	public function disConnect($staff, $visitor, $msgId){
		
		$date = date("Y/m/d");
		
		try{
						
			$servername = "localhost";
			$username = "root";
			$password = "root.user";
			$dbname = "profad";
					
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
			
			//$pdo = $this->connectDb();
			
			$sql = "UPDATE chat SET engaged = 0 WHERE staffId = '$staff'";
			
			$query = $conn->prepare($sql);
			
			$query->execute();
			
			$result = 1;
			
		}catch(PDOException $e){
			$result = $e->getMessage();
		}
		
		return $result;
		//echo json_encode($result);
		$conn = null;
		
	}
	
	public function engage($para){
		
		$staffId = $para;
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
			
			$sql = "UPDATE chat SET engaged = 1 WHERE staffId = '$staffId'";
			
			$query = $conn->prepare($sql);
			
			$query->execute();
			
			$result = 1;
			
		}catch(PDOException $e){
			$result = $e->getMessage();
		}
		
		return $result;
		//echo json_encode($result);
		$conn = null;
		
	}
	
}