<?php

class corporateTraining extends Controller {
	
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

    function __construct() {
        parent::__construct();
		$this->page = get_class($this);
    }
    
    function index() {
		
		$this->settings = $this->model->getAll("profad_settings", "page", "corporate training");
		
		if($this->settings){
	        
			$corporateSubjects = $this->model->getAll("subjects");
			
			$corporateCourses = $this->model->getAll("courses", "training", "corporate");
	
	        $this->img = $this->settings[0]['image'];
	        $this->noSocial = "noSocial";
			$this->title = $this->settings[0]['title'];
			$this->page = $this->settings[0]['page'];
			$this->heading = $this->settings[0]['heading'];
			$this->note = $this->settings[0]['note'];
			$this->controller = "corporate Training";
			$this->courses = $corporateCourses;
			$this->subjects = $corporateSubjects;
			$this->body = 'default/index';
			
			$this->setView();
			
		}else{
			echo "Page Error";
			exit;
		}
		
    }
	
	
	public function publicSectorTraining($para = ""){
		$string = $this->validate($para);
		$this->page = "Public Sector Training";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
		
		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
	        $this->title = "Profad | Corporate Training | ".$this->page;
			$this->controller = "corporate Training";
	        $this->heading = "Public Sector Corporate Training";
			
			$this->note = $this->settings[0]['note'];
			
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
			
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Corporate Training | ".$this->page;
				$this->page = $this->settings[0]['course'];
				$this->controller = "corporate Training";
		        $this->heading = $this->settings[0]['title'];
				
				$this->note = $this->settings[0]['note']."<p><h3>Duration</h3>".$this->settings[0]['duration']."</p>";
				$this->note .= "<p><h3>Cost</h3>".$this->settings[0]['cost']."</p>";
				$this->note .= "<p><h3>Location</h3>".$this->settings[0]['location']."</p>";
				
				
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
	
	public function peopleAndManagementSkills($para = ""){
		$string = $this->validate($para);
		$this->page = "People and Management Skills";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
		
		if(empty($string)){
					
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = "Profad | Corporate Training | ".$this->page;
			$this->controller = "corporate Training";
	        $this->heading = $this->page;
			
			$this->note = $this->settings[0]['note'];
			
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
					
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
		        $this->title = "Profad | Corporate Training | ".$this->page;
				$this->page = $this->settings[0]['course'];
				$this->controller = "corporate Training";
		        $this->heading = $this->settings[0]['title'];
				
				$this->note = $this->settings[0]['note']."<p><h3>Duration</h3>".$this->settings[0]['duration']."</p>";
				$this->note .= "<p><h3>Cost</h3>".$this->settings[0]['cost']."</p>";
				$this->note .= "<p><h3>Location</h3>".$this->settings[0]['location']."</p>";
				
				
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
	
	public function accountingAndFinancialManagement($para = ""){
		$string = $this->validate($para);
		$this->page = "Accounting and Financial Management";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
		
		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = "Profad | Corporate Training | ".$this->page;
			$this->controller = "corporate Training";
	        $this->heading = $this->page;
			
			$this->note = $this->settings[0]['note'];
			
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
			
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Corporate Training | ".$this->page;
				$this->page = $this->settings[0]['course'];
				$this->controller = "corporate Training";
		        $this->heading = $this->settings[0]['title'];
				
				$this->note = $this->settings[0]['note']."<p><h3>Duration</h3>".$this->settings[0]['duration']."</p>";
				$this->note .= "<p><h3>Cost</h3>".$this->settings[0]['cost']."</p>";
				$this->note .= "<p><h3>Location</h3>".$this->settings[0]['location']."</p>";
				
				
				$corporateSubjects = $this->model->getAll("subjects");
				$corporateCourses = $this->model->getAll("courses", "training", "corporate");
				$this->courses = $corporateCourses;
				$this->subjects = $corporateSubjects;
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
		
		
		$this->view->someAccounting = $this->model->getThree("services", "business", "accounting services");
		$this->view->someConsultancy = $this->model->getThree("services", "business", "consultancy services");
		
		$this->view->publicSectorCourses = $this->model->getThree("subjects", "course", "public sector training");
		$this->view->privateSectorCourses = $this->model->getThree("subjects", "course", "people and management skills");	
		
		$this->view->render('header');
        $this->view->render($this->body);
        $this->view->render('footer');
		
	}
    
}