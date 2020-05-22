<?php
class Services extends Controller {

	private $page;
	private $pages;
	private $img;
	private $title;
	private $heading;
	private $social = 1;
	private $note;
	private $controller;
	private $settings;
	private $businesses;
	private $services;
	private $promo;
	private $promo1;
	private $servicesSettings;

    function __construct() {
        parent::__construct();
    }

    
   	public function index() {
   		
		$this->settings = $this->model->getAll("profad_settings", "page", "business services");
		$this->servicesSettings = $this->model->getAll("businesses", "type", "Accounting");
		
		if($this->settings){
				
			$this->title = $this->settings[0]['title'];
			$this->img = $this->settings[0]['image'];
			$this->heading = $this->settings[0]['heading'];
			$this->note = $this->settings[0]['note'];
			$this->page = $this->settings[0]['page'];
			$this->controller = "services";
			$this->promo = $this->settings[0]['promo'];
			$this->promo1 = $this->servicesSettings[0]['promo'];
			
			$this->services = $this->model->getAll("services");
			$this->businesses = $this->model->getAll("businesses");
			
			$this->setView();
			
		}
		
    }

	public function accountingServices($para = ""){
		
		$string = $this->validate($para);
		$this->page = "Accounting Services";
		$this->pages = $this->model->getAll("businesses", "title", $this->page);
		

		if(empty($string)){

			$this->settings = $this->model->getAll("businesses", "title", $this->page);
			$this->businesses = $this->page;
			$this->services = $this->model->getAll("services", "business", $this->page);
			
			$this->img = $this->settings[0]['image'];
	        $this->title = "Profad | Business Services". $this->page;
			$this->controller = "services";
	        $this->heading = "Accounting Services";
			$this->note = $this->settings[0]['note'];
	
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
			
			$this->settings = $this->model->getByLink("services", $string);
	
			if($this->settings){
	
			$this->img = $this->pages[0]['image'];
	        $this->title = "Profad | Business Services". $this->page;
			$this->heading = $this->settings[0]['title'];
			
			$this->note = $this->settings[0]['note'];
			
			
			$this->businesses = $this->page;
			$this->services = $this->model->getAll("services", "business", $this->page);
			
			$this->setView();
		
			}else{
				echo "Page Error";
			}
			
		}

	}
	
	public function consultancyServices($para = ""){
		
		$string = $this->validate($para);
		$this->page = "Consultancy Services";
		$this->pages = $this->model->getAll("businesses", "title", $this->page);

		if(empty($string)){
			
			$this->settings = $this->model->getAll("businesses", "title", $this->page);
			$this->businesses = $this->page;
			$this->services = $this->model->getAll("services", "business", $this->page);
			
			$this->img = $this->settings[0]['image'];
	        $this->title = "Profad | Business Services". $this->page;
			$this->controller = "services";
	        $this->heading = "Consultancy Services";
			$this->note = $this->settings[0]['note'];
	
			$this->body = 'default/index';	
			
			$this->setView();
			
		}else{
				
			$this->settings = $this->model->getByLink("services", $string);
	
			if($this->settings){
	
			$this->img = $this->pages[0]['image'];
	        $this->title = "Profad | Business Services". $this->page;
			$this->heading = $this->settings[0]['title'];
				
			$this->note = $this->settings[0]['note'];
				
			$this->businesses = $this->page;
			$this->services = $this->model->getAll("services", "business", $this->page);
			
			$this->setView();
		
			}else{
				echo "Page Error";
			}
			
		}	

	}
	
	
	private function setView(){
		
		$this->view->page = $this->page;
		$this->view->controller = $this->controller;
		$this->view->title = $this->title;
		$this->view->img = $this->img;
		$this->view->heading = $this->heading;
		$this->view->noSocial = $this->social;
		$this->view->note = $this->note;
		$this->view->promo = $this->promo;
		$this->view->promo1 = $this->promo1;
		$this->view->businesses = $this->businesses;
		$this->view->services = $this->services;

		$this->view->render('header');
		$this->view->render('services/index');
		$this->view->render('footer');
	}
    
}