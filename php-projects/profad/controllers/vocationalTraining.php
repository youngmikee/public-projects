<?php

class vocationalTraining extends Controller {
	
	private $body;
	private $img;
	private $page;
	private $pages;
	private $courses;
	private $subjects;
	private $title;
	private $heading;
	private $noSocial;
	private $settings;
	private $note;
	private $controller;
	private $promo;

    function __construct() {
        parent::__construct();
    }
    
    public function index(){
		
		$this->settings = $this->model->getAll("profad_settings", "page", "vocational training");
		
		if($this->settings){
				
			$vocationalSubjects = $this->model->getAll("subjects");
			$vocationalCourses = $this->model->getAll("courses", "training", "vocational");
			
			
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = $this->settings[0]['title'];
			$this->page = $this->settings[0]['page'];
	        $this->heading = $this->settings[0]['heading'];
			$this->note = $this->settings[0]['note'];
			$this->promo = $this->settings[0]['promo'];
			$this->controller = "vocational Training";
			$this->courses = $vocationalCourses;
			$this->subjects = $vocationalSubjects;
			$this->body = 'default/index';
			
			$this->setView();
			
		}else{
			echo "Page Error";
			exit;
		}

    }
	
	public function healthAndSocialCare($para = ""){
		$string = $this->validate($para);
		$this->page = "Health and Social Care";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
		
		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
	        $this->title = "Profad | Vocational Training | ". $this->page;
			$this->controller = "vocational Training";
	        $this->heading = "Health and Social Care Training";
			$this->note = $this->settings[0]['note'];
	
			$this->body = 'default/index';	
			
			$this->setView();	
			
		}else{
				
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Vocational Training | ". $this->page;
				$this->controller = "vocational Training";
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
	
	public function securityTraining($para = ""){
		$string = $this->validate($para);
		$this->page = "Security Training";
		$this->pages = $this->model->getAll("courses", "title", $this->page);

		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = "Profad | Vocational Training | ". $this->page;
			$this->controller = "vocational Training";
	        $this->heading = "Security And CCTV Training";
			
			$this->note = $this->settings[0]['note'];
			
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
				
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Vocational Training | ". $this->page;
				$this->page = $this->settings[0]['course'];
				$this->controller = "vocational Training";
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

	
	public function customerServices($para = ""){
		
		$string = $this->validate($para);
		$this->page = "Customer Services";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
		
		
		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = "Profad | Vocational Training | ". $this->page;
			$this->controller = "vocational Training";
	        $this->heading = "Customer Services Training";
			$this->note = $this->settings[0]['note'];
			
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
			
			$this->settings = $this->model->getByLink("subjects", $string);
			
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Vocational Training | ". $this->page;
				$this->controller = "vocational Training";
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
	
	public function managementAndBusinessAdministration($para = ""){
		
		$string = $this->validate($para);
		$this->page = "Management and Business Administration";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
		
		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = "Profad | Vocational Training | ". $this->page;
			$this->controller = "vocational Training";
	        $this->heading = "Management And Business Administration Training";
			$this->note = $this->settings[0]['note'];
			
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
				
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Vocational Training | ". $this->page;
				$this->controller = "vocational Training";
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
	
	public function firstAidAtWork($para = ""){
		
		$string = $this->validate($para);
		$this->page = "First Aid at Work";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
	
		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = "Profad | Vocational Training | ". $this->page;
			$this->controller = "vocational Training";
	        $this->heading = "First Aid At Work Training";
			
			$this->note = $this->settings[0]['note'];
			$this->body = 'default/index';	
			
			$this->setView();	
			
		}else{
						
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Vocational Training | ". $this->page;
				$this->controller = "vocational Training";
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
	
	public function teachingQualification($para = ""){
		
		$string = $this->validate($para);
		$this->page = "Teaching Qualification";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
		
		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = "Profad | Vocational Training | ". $this->page;
			$this->controller = "vocational Training";
	        $this->heading = "Teaching Qualification Training";
			
			$this->note = $this->settings[0]['note'];
			$this->body = 'default/index';	
			
			$this->setView();			
			
		}else{
						
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Vocational Training | ". $this->page;
				$this->controller = "vocational Training";
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
	
	
	public function assessorsAndVerification($para = ""){
		
		$string = $this->validate($para);
		$this->page = "Assessors and Verification";
		$this->pages = $this->model->getAll("courses", "title", $this->page);
		
		if(empty($string)){
			
			$this->settings = $this->model->getAll("courses", "title", $this->page);
			$this->courses = $this->page;
			$this->subjects = $this->model->getAll("subjects", "course", $this->page);
			
			$this->img = $this->settings[0]['image'];
			$this->noSocial = "noSocial";
	        $this->title = "Profad | Vocational Training | ". $this->page;
			$this->controller = "vocational Training";
	        $this->heading = "Assessors And Verification Training";
			
			$this->note = $this->settings[0]['note'];
			$this->body = 'default/index';	
			
			$this->setView();	
			
		}else{
					
			$this->settings = $this->model->getByLink("subjects", $string);
			
			if($this->settings){
				
	
				$this->img = $this->pages[0]['image'];
				$this->noSocial = "noSocial";
		        $this->title = "Profad | Vocational Training | ". $this->page;
				$this->controller = "vocational Training";
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
		
		
		$this->view->someAccounting = $this->model->getThree("services", "business", "accounting services");
		$this->view->someConsultancy = $this->model->getThree("services", "business", "consultancy services");
		
		$this->view->publicSectorCourses = $this->model->getThree("subjects", "course", "public sector training");
		$this->view->privateSectorCourses = $this->model->getThree("subjects", "course", "people and management skills");	
		
		$this->view->render('header');
        $this->view->render($this->body);
        $this->view->render('footer');
		
	}
    

}