<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class Settings extends Controller {

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
			
			if(!empty($account)){
				header("Location: ".DIR_PATH."/dashboard");
			}
			
		
			if($_POST){
				
				$view = $this->getActionView();
				$user = $this->getUser();
			
				
				foreach($_POST as $field){
					if(empty($field)){
						$message = "Incomplete form";
						$view->set("message", $message);
						exit;
					}
				}
				
				if(empty($_POST['gender'])){
					$message = "Incomplete form";
					$view->set("message", $message);
					exit;
				}
				
				$user = new Account(array(
					'user' => $user->id,
					'chatroom' => $_POST['chatroom'],
					'firstname' => $this->validate($_POST['firstname']),
					'lastname' => $this->validate($_POST['lastname']),
					'dobDay' => $_POST['dob-day'],
					'dobMonth' => $_POST['dob-month'],
					'dobYear' => $_POST['dob-year'],
					'gender' => $_POST['gender'],
					'country' => $_POST['country'],
					'address' => $this->validate($_POST['address']),
					'postcode' => $this->validate($_POST['postcode']),
					'city' => $_POST['city'],
					
				));
						
				if($user->validate()){

					$user->save();
					
					header("Location: ".DIR_PATH."/dashboard");
					exit();	
				}
				
				//$view->set("message", $message);
				
				
			}

			
			
        }
		
		
	    /**
	     * @before _secure
	     */
		public function profile(){
			
			
		}
		
		
	    /**
	     * @before _secure
	     */
		public function account(){
			
			
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
	            
	            header("Location: ".DIR_PATH);
	            exit();
	            
	        }
	        
	    }
	
        
    }
