<?php
    
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Cleaning extends Controller{
    
    public function index(){

        $this->getLayoutView()
                ->set("controller", lcfirst(get_class($this)))
                ->set("date", date("Y"));
        
        $services = Service::all(array(
            "type = ?" => "cleaning",
            "visibility = ?" => "cleaning",
            "live = ?" => true,
            "deleted = ?" => false
        ));
        
        $this->getActionView()->set("services", $services);

    }

}
