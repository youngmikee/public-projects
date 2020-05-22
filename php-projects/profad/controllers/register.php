<?php

class register extends Controller {

	private $page = "register";

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {
    	
		$this->view->someAccounting = $this->model->getThree("services", "business", "accounting services");
		$this->view->someConsultancy = $this->model->getThree("services", "business", "consultancy services");
		
		$this->view->publicSectorCourses = $this->model->getThree("subjects", "course", "public sector training");
		$this->view->privateSectorCourses = $this->model->getThree("subjects", "course", "people and management skills");	
		    
        $this->view->title = 'Register';
        $this->view->page = $this->page;
        $this->view->render('header');
        $this->view->render('register/index');
        $this->view->render('footer');
    }
	
	function process(){
		
		foreach($_POST as $field){
			
			if($field == ""){
				header('Location: '.URL.'message/registration/error/1');
				exit;
			}
			
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			header('Location: '.URL.'message/registration/error/2');
			exit;
		}
		
		if($_POST['pwd'] != $_POST['cPwd']){
			header('Location: '.URL.'message/registration/error/3');
			exit;
		}
		
		$registered = $this->model->getRegistered("registered", $_POST['email'], $_POST['staffId']);
		
		if($registered){
			header('Location: '.URL.'message/registration/error/4');
			exit;
		}
		
		$staff = $this->model->getByStaffId("staffs", $_POST['staffId']);
		
				
		if($staff){
			
			$result = $this->model->create($_POST);
			
			if($result){
				header('Location: '.URL.'message/registration/success/1');
			}else{
				header('Location: '.URL.'message/registration/error/6');
			}
			
		}else{
			header('Location: '.URL.'message/registration/error/5');
		}
		
	}
  

}