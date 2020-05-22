<?php
    
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Galleries extends Controller{
    
    public function index(){
        
        $this->getLayoutView()
                ->set("controller", lcfirst(get_class($this)))
                ->set("date", date("Y"));
        
        $galleries = Gallery::all(array(
            "visibility = ?" => "search",
            "live = ?" => true,
            "deleted = ?" => false
        ));
        
        $files = File::all(array(
            "type = ?" => "gallery",
            "live = ?" => true,
            "deleted = ?" => false
        ));
        
        $this->getActionView()->set("galleries", $galleries)
                ->set("files", $files);

    }
    
}
