<?php

class Login extends Controller {

	private $page = "login";

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {
    	
		$this->view->someAccounting = $this->model->getThree("services", "business", "accounting services");
		$this->view->someConsultancy = $this->model->getThree("services", "business", "consultancy services");
		
		$this->view->publicSectorCourses = $this->model->getThree("subjects", "course", "public sector training");
		$this->view->privateSectorCourses = $this->model->getThree("subjects", "course", "people and management skills");	
		    
        $this->view->title = 'Login';
        $this->view->page = $this->page;
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }

	
	function authentication(){
		
		foreach($_POST as $field){
			
			if($field == ""){
				header('Location: '.URL.'message/login/error/1');
				exit;
			}
			
		}
		
		
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			header('Location: '.URL.'message/login/error/2');
			exit;
		}
	

		$result = $this->model->getByEmailandPwd("registered", $_POST['email'], Hash::create('sha256', $_POST['pwd'], HASH_PASSWORD_KEY));
		
		if(!$result){
			header('Location: '.URL.'message/login/error/3');
			exit;			
		}

	
		$result = $this->model->run($_POST);
		
		if($result == 1){
			header('Location: '.URL.'portal');
		}else{
			header('Location: '.URL.'message/login/error/4');
		}	
	
	}
    

}