<?php
    
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Wedding extends Controller{
    
    public function index(){

        $this->getLayoutView()
                ->set("controller", lcfirst(get_class($this)));
        
        $services = Service::all(array(
            "type = ?" => "wedding",
            "visibility = ?" => "wedding",
            "live = ?" => true,
            "deleted = ?" => false
        ));
        
        $this->getActionView()->set("services", $services);
        
    }

}
