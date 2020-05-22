<?php

class about extends Controller {

	private $page = "about";

    function __construct() {
        parent::__construct();
		
    }
    
    function index() {
		
    	 //$date = date('Y-m-d H:i:s');
        //echo Hash::create('sha256', 'jesse', HASH_PASSWORD_KEY);
        //echo Hash::create('sha256', 'test2', HASH_PASSWORD_KEY);
        //$this->view->title = 'Profad';
		$this->view->title = "About Profad | Training &amp; Services";
		$this->view->page = $this->page;
		
		$this->view->someAccounting = $this->model->getThree("services", "business", "accounting services");
		$this->view->someConsultancy = $this->model->getThree("services", "business", "consultancy services");
		
		$this->view->publicSectorCourses = $this->model->getThree("subjects", "course", "public sector training");
		$this->view->privateSectorCourses = $this->model->getThree("subjects", "course", "people and management skills");	
		
		
        $this->view->render('header');
        $this->view->render('about/index');
        $this->view->render('footer');
		
    }
    
}