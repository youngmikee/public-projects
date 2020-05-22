<?php

class contactUs extends Controller {

	private $page = "contact";

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {

		$this->view->someAccounting = $this->model->getThree("services", "business", "accounting services");
		$this->view->someConsultancy = $this->model->getThree("services", "business", "consultancy services");    	
		
		$this->view->publicSectorCourses = $this->model->getThree("subjects", "course", "public sector training");
		$this->view->privateSectorCourses = $this->model->getThree("subjects", "course", "people and management skills");	
    
        $this->view->title = 'Contact | Profad';
        $this->view->page = $this->page;
        $this->view->render('header');
        $this->view->render('contact/index');
        $this->view->render('footer');
    }
	
	public function feedback(){
		
		$email = $this->validate($_POST['email']);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			$result = 0;
				
		}else{
			
			$result = $this->model->sendOfflineMessage($_POST);
			
			if($result){
					
				$result = 1;
				
			}else{

				$result = 0;
				
			}
			
		}
		
		echo json_encode($result);
		
	}
	
	public function application(){
		
		$email = $this->validate($_POST['email']);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			$result = 0;
				
		}else{
			
			$result = $this->model->sendApplication($_POST);
			
			if($result){
					
				$result = 1;
				
			}else{

				$result = 0;
				
			}
			
		}
		
		echo json_encode($result);
		
	}
	
	public function messenger(){
		
		
        $this->view->title = "Offline Messanger | Profad";
		
        $this->view->render('contact/offlineMessenger/index');
       
	}
	
	public function liveMessenger(){
		
		$this->view->title = "Live Messanger | Profad";
		
		$this->view->render("contact/liveMessenger/index");
		
	}
	
	public function offlineMessage(){
		
		$email = $this->validate($_POST['email']);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header('Location: '.URL.'message/messenger/error/1');
			exit;
		}else{
			
			$result = $this->model->sendOfflineMessage($_POST);
			
			if($result){
					
				//message sent.
				header('Location: '.URL.'message/messenger/success/1');
				exit;
				
			}else{
				//
				header('Location: '.URL.'message/messenger/error/2');
				exit;
			}
			
		}
		
	}
	
	public function connect(){
		
		$email = $this->validate($_POST['email']);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			//$result = "invalid email";
			$result = 0;
			echo json_encode($result);
			exit;
		}else{
			
			$staff = $this->model->chatAvailable();
			
			if(empty($staff)){
				//$result = "staffs not available this Time";
				$result = 0;
				echo json_encode($result);
				exit;
			}else{
				
				$result = $this->model->connect($staff, $_POST);
					
				if($result == 1){
					
					$result = $this->engage($staff[0]['staffId']);
					
					if($result == 1){
						$result = $staff;
						echo json_encode($result);
					}else{
						//$result = "chat not engaged";
						$result = 0;
						echo json_encode($result);
					}
					
				}else{
					//$result = "not saved";
					$result = 0;
					echo json_encode($result);
					exit;
				}
				
			}
			
			
		}
		
	}

	function disConnect(){
		
		session_start();
		$staff = $_SESSION['staff'];
		$visitor = $_SESSION['visitor'];
		$msgId = trim($staff.$visitor).$_SESSION['visitorIp'];
		
		$this->model->disConnect($staff, $visitor, $msgId);
		
	}
	
	function engage($para){
		return $this->model->engage($para);
	}
	
	function chatMsg(){
		
		session_start();
		$staff = $_SESSION['staff'];
		$visitor = $_SESSION['visitor'];
		$msgId = trim($staff.$visitor).$_SESSION['visitorIp'];
		$msg = $_POST['msg'];
		
		if(empty($msg)){
			$result = "no input";
			echo json_encode($msg);
		}else{
			//$this->model->saveChat("visitorChat", $name);
			$this->model->saveChat($msgId, $visitor);
		}
	}
	
	function getChatMsgs(){
		session_start();
		$staff = $_SESSION['staff'];
		$visitor = $_SESSION['visitor'];
		$visitorIp = $_SERVER['REMOTE_ADDR'];
		$msgId = trim($staff.$visitor).$visitorIp;
		$date = date("Y/m/d");

		//$result = $this->model->getAll("staffChat", "name", $name, "date", $date);
		$chat = $this->model->getAll("messenger", "messageId", $msgId, "date", $date);
		
		if(empty($chat)){
			$result = 0;
		}else{
			$result = $chat;
		}
		
		echo json_encode($result);
	}

	function checkEngage(){
		session_start();
		$staff = $_SESSION['staff'];
		$visitor = $_SESSION['visitor'];
		$visitorIp = $_SERVER['REMOTE_ADDR'];
		$msgId = trim($staff.$visitor).$visitorIp;
		
		$result = $this->model->getEngaged($staff);
		if(empty($result)){
			$result = 0;
		}else{
			$connected = $this->model->getConnected($staff, $visitor, $msgId);
			if(empty($connected)){
				$result = 0;
			}else{
				$result = $connected;
			}
		}
		echo json_encode($result);
	}
	    

}