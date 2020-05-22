<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class Messenger extends Controller {

	    /**
	     * @before _secure
	     */
        public function index(){
			$view = $this->getActionView();
			
			
        }

	    /**
	     * @before _secure
	     */
		public function room(){
			$parameters = $this->getParameters();
			//echo $parameters[0];
		}
		
	    /**
	     * @before _secure
	     */
	    public function dashboard(){
	    	
	    }
		
	    /**
	     * @protected
	     */
		private function validate($str){
			$str = trim($sr);
			$str = stripslashes($str);
			$str = htmlspecialchars($str);
			return $str;
		}
			
	    /**
	     * @protected
	     */
	    public function _secure(){
	        
	        $user = $this->getUser();
	        
	        if(!$user){
	            
	            header("Location: ".DIR_PATH);
	            exit();
	            
	        }
	        
	    }
	
        
    }
