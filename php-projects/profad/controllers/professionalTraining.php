<?php

class professionalTraining extends Controller {

	private $body;
	private $img;
	private $page;
	private $courses;
	private $subjects;
	private $title;
	private $heading;
	private $noSocial;
	private $settings;
	private $note;
	private $controller;
	private $promo;
	private $promo1;
	private $professionalSettings;

    function __construct() {
        parent::__construct();
    }
    
    function index() {
    	
		$this->settings = $this->model->getAll("profad_settings", "page", "professional training");
		$this->professionalSettings = $this->model->getAll("training", "title", "Professional");
		
		if($this->settings){
			
			$professionalSubjects = $this->model->getAll("subjects");
			$professionalCourses = $this->model->getAll("courses", "training", "professional");		

    	
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = $this->settings[0]['title'];
			$this->page = $this->settings[0]['page'];
	        $this->heading = $this->settings[0]['heading'];
			$this->note = $this->settings[0]['note'];
			$this->promo = $this->settings[0]['promo'];
			$this->promo1 = $this->professionalSettings[0]['promo'];
			$this->controller = "professional Training";
			$this->courses = $professionalCourses;
			$this->subjects = $professionalSubjects;
			$this->body = 'default/index';
			
			$this->setView();
			
		}
		
    }
	
	public function accountingTraining($para = ""){
		$string = htmlspecialchars($para);
		$this->page = "Accounting Training";
		$this->pages = $this->model->getAll("courses", "title", $this->page);

		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
	        $this->title = "Profad | Professional Training | ". $this->page;
			$this->controller = "professional Training";
	        $this->heading = "Accounting Training";
			$this->note = $this->settings[0]['note'];
	
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
			
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Professional Training | ". $this->page;
				$this->page = $this->settings[0]['course'];
				$this->controller = "professional Training";
		        $this->heading = $this->settings[0]['title'];
				
				$this->note = $this->settings[0]['note']."<p><h2>Duration</h2>".$this->settings[0]['duration']."</p>";
				$this->note .= "<p><h2>Cost</h2>".$this->settings[0]['cost']."</p>";
				$this->note .= "<p><h2>Location</h2>".$this->settings[0]['location']."</p>";
				
				
				$this->courses = $this->page;
				$this->subjects = $this->model->getAll("subjects", "course", $this->page);
				$this->body = 'default/index';	
		
				
				$this->setView();
				
			}else{
				echo "Page Error";
				exit;
			}
			
		}	

	}
	
	
	

	private function setView(){
		
		$this->view->img = $this->img;
		$this->view->courses = $this->courses;
		$this->view->subjects = $this->subjects;
		$this->view->title = $this->title;
		$this->view->heading = $this->heading;
		$this->view->noSocial = $this->noSocial;
		$this->view->page = $this->page;
		$this->view->note = $this->note;
		$this->view->controller = $this->controller;
		$this->view->promo = $this->promo;
		$this->view->promo1 = $this->promo1;
		
		
		$this->view->someAccounting = $this->model->getThree("services", "business", "accounting services");
		$this->view->someConsultancy = $this->model->getThree("services", "business", "consultancy services");
		
		$this->view->publicSectorCourses = $this->model->getThree("subjects", "course", "public sector training");
		$this->view->privateSectorCourses = $this->model->getThree("subjects", "course", "people and management skills");	
		
		$this->view->render('header');
        $this->view->render($this->body);
        $this->view->render('footer');
		
	}
    
}