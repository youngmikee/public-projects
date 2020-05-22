<?php

class Index extends Controller {
	
	private $news;			
	private $page;
	private $note;
	private $heading;
	private $title;
	private $results;
	private $body;
	private $lists;
	private $controller;
	private $chat;
	

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        
		$this->settings = $this->model->getAll("profad_settings", "page", "home");
		$this->chat = count($this->model->getAll("chat", "status", 1));
		
		if(isset($this->settings)){
			
			$this->page = $this->settings[0]['page'];
			$this->heading = $this->settings[0]['heading'];
			$this->note = $this->settings[0]['note'];
			$this->title = $this->settings[0]['title'];
			$this->body = 'home/index';
			
			$result = $this->model->getAll("news", "deleted", "0");
			
			if(isset($result)){
				
				$this->news = $result;
				
			}else{
				$this->news = 0;
			}
	
			$this->setView();
			
		}else{
			echo "error";
			exit();
		}
		
    }
	
	public function allCourses(){
		
		$this->lists = $this->model->getAll("subjects");
		
		
		$this->body = 'list/courses';
		$this->title = "Profad | All Courses";
		$this->heading = "List of All Courses";
		$this->controller = "services";
		
		$this->setView();
	}
	
	public function allServices(){
		
		$this->lists = $this->model->getAll("services");
		
		
		$this->body = 'list/services';
		$this->title = "Profad | All Services";
		$this->heading = "List of All Services";
		$this->controller = "services";
		
		$this->setView();
	}

	private function setView(){
		
		$this->view->page = $this->page;
		$this->view->title = $this->title;
		$this->view->heading = $this->heading;
		$this->view->note = $this->note;
		$this->view->news = $this->news;
		$this->view->lists = $this->lists;
		$this->view->controller = $this->controller;
		$this->view->chat = $this->chat;
	
		$this->view->someAccounting = $this->model->getThree("services", "business", "accounting services");
		$this->view->someConsultancy = $this->model->getThree("services", "business", "consultancy services");	

		$this->view->publicSectorCourses = $this->model->getThree("subjects", "course", "public sector training");
		$this->view->privateSectorCourses = $this->model->getThree("subjects", "course", "people and management skills");	

		$this->view->render('header');
		$this->view->render($this->body);
		$this->view->render('footer');
		
	}
    
}