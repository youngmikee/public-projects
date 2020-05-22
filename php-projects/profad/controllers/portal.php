<?php

class Portal extends Controller {
	private $chat;

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    function index() 
    {    
        $this->view->title = 'Dashboard';
        $this->view->chat = Session::get('chat');
		$this->view->name = Session::get('name');
		$this->view->profadMsg = $this->model->getAll("messages", "receiver", "profad");
		$this->view->newsImgs = $this->model->getAll("newsImage");
		
		//echo Session::get('chat');
		//exit;
        
        $this->view->render('portalHeader');
        $this->view->render('portal/index');
        $this->view->render('portalFooter');

    }
    
    function logout()
    {
    	$result = $this->model->logoutUser(Session::get("email"));
		
		if($result){
			
			$this->offChat();
	        Session::destroy();
	        header('Location: '.URL.'login');
	        exit;
			
		}
		
    }
	
	function onChat(){
		
		$result = Session::get("chat");
		$staff = Session::get("staffId");
		
		if(!empty($result)){
			$result = 1;
			echo json_encode($result);
		}else{
			
			$result = $this->model->getAll("chat", "staffId", $staff);
			
			if(!empty($result)){
				
				if($result[0]['status'] == 0){
					$this->model->updateChat();
				}else{
					$result = 0;
					echo json_encode($result);
				}
				
			}else{
				$this->model->onChat();
			}
			
		}
		
	}
	
	function offChat(){
		$this->model->offChat();
	}
	
	function checkEngage(){
		$result = $this->model->getEngaged();
		if(empty($result)){
			$result = 0;
		}else{
			$connected = $this->model->getConnected();
			if(empty($connected)){
				$result = 0;
			}else{
				Session::set('visitor', $connected[0]['visitor']);
				Session::set('subject', $connected[0]['subject']);
				Session::set('visitorIp', $connected[0]['visitorIp']);
				$result = $connected;
			}
		}
		echo json_encode($result);
	}
	
	function chatMsg(){
	
		$staffId = strtoupper(Session::get('staffId'));
		$staffName = Session::get('name');
		$visitor = Session::get('visitor');
		$msgId = trim($staffId.$visitor).Session::get('visitorIp');
	
		$msg = $_POST['msg'];
		
		if(empty($msg)){
			$result = "no input";
			echo json_encode($msg);
		}else{
			//$this->model->saveChat("staffChat", $name);
			$this->model->saveChat($msgId, $staffId);
		}
	
	}
	
	function getMsgs(){
		$this->model->getProfadMsg();
	}
	
	function viewedMsg(){
		$this->model->viewedMsg();	
	}
	
	function delMsg(){
		$this->model->delMsg();
	}
    
	function create($para){
		$result = $para;
		//$result = $_POST['title'];
		//echo json_encode($result);
		
		switch($para){
			
			case "business":
				$table =$para."es";
				$result = $this->model->getAll($table, "title", $_POST['title']);
				if(!empty($result)){
					$result = 0;
					echo json_encode($result);
				}else{
					$this->model->createBusiness();
				}
				break;
				
			case "service":
				$table =$para."s";
				$result = $this->model->getAll($table, "title", $_POST['title']);
				if(!empty($result)){
					$result = 0;
					echo json_encode($result);
				}else{
					$this->model->createService();
				}
				break;
				
			case "training":
				
				$result = $this->model->getAll($para, "title", $_POST['title']);
				if(!empty($result)){
					$result = 0;
					echo json_encode($result);
				}else{
					$this->model->createTraining();
				}
				break;
				
			case "course":
				$table =$para."s";
				$result = $this->model->getAll($table, "title", $_POST['title']);
				if(!empty($result)){
					$result = 0;
					echo json_encode($result);
				}else{
					$this->model->createCourse();
				}
				break;
				
			case "subject":
				$table =$para."s";
				$result = $this->model->getAll($table, "title", $_POST['title']);
				if(!empty($result)){
					$result = 0;
					echo json_encode($result);
				}else{
					$this->model->createSubject();
				}
				break;
				
			case "news":
				
				if(empty($this->validate($_POST['image']))){
					$result = 0;
					echo json_encode($result);
				}else{
					$result = $this->model->getAll($para, "title", $_POST['title']);
					if(!empty($result)){
						$result = 0;
						echo json_encode($result);
					}else{
						$this->model->createNews();
					}	
				}
				break;
				
			default:
				$result = 0;
				echo json_encode($result);
		}
		
	}

	function getTableRow($para){
			
		$this->model->getRowList($para);
	}
	
	function getColum(){
		$this->model->getColum();
	}
	
	function getTableColumns($para){
		$this->model->getColumns($para);
	}
	
	function update(){
		$this->model->updateTable();
	}
	
	function delete(){
		$this->model->deleteRow();
	}
	
	function getChatMsgs(){
		$staff = Session::get('staffId');
		$visitor = Session::get('visitor');
		$visitorIp = Session::get('visitorIp');
		$msgId = trim($staff.$visitor).$visitorIp;
		$date = date("Y/m/d");
		
		//$chat = $this->model->getAll("visitorChat", "name", $name, "date", $date);
		$chat = $this->model->getAll("messenger", "messageId", $msgId, "date", $date);
		
		if(empty($chat)){
			$result = 0;
		}else{
			$result = $chat;
		}
		
		echo json_encode($result);
	}
	

}