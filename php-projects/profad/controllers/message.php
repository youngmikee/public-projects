<?php

class Message extends Controller {

		private $code;
		private $message;
		private $body;
		private $title;
		private $page;

    function __construct() {
        parent::__construct(); 
		$this->page = strtolower(get_class($this));
    }
    
    function index() {
    	

		$this->message = "404 Error: Sorry, we couldn't find this page";
		$this->body = "message/index";
		$this->title = "Profad | Page not found";        
		$this->setView();
		
    }
	
	function feedback(){
		echo "feedback";
	}
	
	function registration($para1, $para2){
			
		if($para1 == "success"){
			
			$this->body = "message/index";
			$this->message = "Your Registeration is <b>Successful</b><br>";
			$this->message .= "If you are not redirected in 10 seconds: Please click";
			$this->message .= " <a href='".URL."login'>here</a> to login";
			$this->title = "Profad | Portal Registration";
			$this->setView();
			exit;
			
		}else{
			
			switch($para2){
				case 1:
					$this->message = "<b>Form Not Completed</b>";
					break;
				case 2:
					$this->message = "<b>Invalid Email Address</b>";
					break;
				case 3:
					$this->message = "<b>Passwords Do Not Match</b>";
					break;
				case 4:
					$this->message = "<b>Already Registered</b>";
					break;
				case 5:
					$this->message = "<b>Invalid Staff Id</b>";
					break;
				default:
					$this->message = "<b>Fatal System Error: Please contact the System Aministrator</b>";
			}
			
			$this->message .= "<br><br> If you are not redirected in 10 seconds: Please click";
			$this->message .= " <a href='".URL."register'>here</a> to return.";
			$this->body = "message/index";
			$this->title = "Profad | Portal Registration";
			$this->setView();
			exit;
			
		}
			
	}
	
	function login($para1, $para2){
			
		switch($para2){
			case 1:
				$this->message = "<b>Form Not Completed</b>";
				break;
			case 2:
				$this->message = "<b>Invalid Email Address</b>";
				break;
			case 3:
				$this->message = "<b>Invalid Email Address Or Password</b>";
				break;
			default:
				$this->message = "<b>Fatal System Error: Please contact the System Aministrator</b>";
		}
		
		$this->message .= "<br><br> If you are not redirected in 10 seconds: Please click";
		$this->message .= " <a href='".URL."login'>here</a> to return.";
		$this->body = "message/index";
		$this->title = "Profad | Portal Login";
		$this->setView();
		exit;


	}
	
	function messenger($para1, $para2){
				
		if($para1 == "success"){
			
			$this->body = "x";
			$this->message = "<br><br><b>Message sent!</b><br>";
			$this->message .= "<br>Please click";
			$this->message .= " <button onclick='self.close()'>here</button> to close.";
        	$this->title = "Offline Messanger | Profad";
			
			//$this->view->render('message/messenger/header');
			$this->view->msg = $this->message;
			$this->view->render('message/messenger/index');
			//$this->view->render('message/messenger/footer');
			exit;
			
		}else{
			
			switch($para2){
				case 1:
					$this->message = "<b><br><br>Invalid Email Address!</b>";
					break;
				default:
					$this->message = "<b><br><br>Fatal System Error: Please contact the System Aministrator</b>";
			}
			
			$this->message .= "<br><br>Please click";
			$this->message .= " <a href='".URL."contact Us/messenger'>here</a> to return back.";
			$this->view->msg = $this->message;
			$this->view->render('message/messenger/index');
        	$this->title = "Offline Messanger | Profad";
			exit;	
			
		}
		
	}
	
	private function setView(){
		
		$this->view->page = $this->page;
		$this->view->title = $this->title;
		$this->view->msg = $this->message;

		$this->view->render('header');
		$this->view->render($this->body);
		$this->view->render('footer');
		
	}

}