<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class app_weathers extends Controller {

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
			
			$postcode = $account->postcode;

			if($user){
				$result = $account->postcode;
				echo json_encode($result);
			}
			
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
			
			$response = file_get_contents('http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/sitelist?key=106d4aa7-0bf3-40d8-9bc6-8bdea8bdf5ed');
			$response = json_decode($response);
			
			echo json_encode($response);
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
