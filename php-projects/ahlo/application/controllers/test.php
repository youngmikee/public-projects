<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class App extends Controller {

	    /**
	     * @before _secure
	     */
        public function index(){
        	$user = $this->getUser();
        	
			$account = Account::first(array(
                "user = ?" => $user->id,
                "live = ?" => true,
                "deleted = ?" => false
            ));	
			
			$result = "hi";
			echo json_encode($result);
			
		}
		
		
	    /**
	     * @before _secure
	     */
		public function weather(){

			$result = "hi";
			echo json_encode($result);

		}
		
		
	    /**
	     * @before _secure
	     */
		public function news(){
			
			
		}
		
	    /**
	     * @protected
	     */
		private function validate($str){
			$str = trim($str);
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
	            
	            //header("Location: ".DIR_PATH);
	            //exit();
	            $result = "Error";
				echo json_encode($result);
				exit;
	            
	        }
	        
	    }
	
        
    }
