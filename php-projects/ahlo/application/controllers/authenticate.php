<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class Authenticate extends Controller {

        public function index(){

            $user = $this->getUser();

            if($user){
                
                header("Location: ".DIR_PATH."/dashboard");
                exit();
                
            }else{
            	header('Location: '.DIR_PATH.'/authenticate/login');
				exit;
            }
            
        }
        
        public function login(){
        	
            $user = $this->getUser();

            if($user){
                
                header("Location: ".DIR_PATH."/dashboard");
                exit();
                
            }
			
			if($_POST){
				
	            $user = $this->getUser();
	            
	            if($user == false){
	            	
	                $view = $this->getActionView();
		                
					foreach($_POST as $field){
						
						if(empty($field)){
							
							$message = "Incomplete form";
							$view->set("message", $message);
							exit;
							
						}
						
					}
					
					if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
						
						$message = "Not a valid email";
						$view->set("message", $message);
						exit;
						
					}
	
                    $user = User::first(array(
                        "email = ?" => $_POST['email'],
                        "password = ?" => self::hashCreate("sha256", $_POST['pwd'], HASH_PWD_KEY),
                        "live = ?" => true,
                        "deleted = ?" => false
                    ));

                    if(!empty($user)){
			 
                        $session = Registry::get("session");
                        $session->set("user", serialize($user));
			                    	
						$account = Account::first(array(
			                "user = ?" => $user->id,
			                "live = ?" => true,
			                "deleted = ?" => false
			            ));

						if(!empty($account)){
							$session->set("account", serialize($account));	
						}
						


						header('Location: '.DIR_PATH.'/dashboard');
						exit();
						
                    }else{

                        $message = "Email address / password are incorrect";
						$view->set("message", $message);
						exit;

                    }
					
	            }		
				
			}

        }
        
        public function register(){

			if($_POST){
					
	            $username = User::first(array(
	                "username = ?" => $this->validate($_POST['username']),
	                "live = ?" => true,
	                "deleted = ?" => false
	            ));
				
	            $email = User::first(array(
	                "email = ?" => $this->validate($_POST['email']),
	                "live = ?" => true,
	                "deleted = ?" => false
	            ));
				
				$view = $this->getActionView();
				
				if(!empty($username)){
					$message = 'Username already exits';
					exit;
				}
				
				if(!empty($email)){
					$message = 'This email has been registered';
					exit;
				}
				
				foreach($_POST as $field){
					if(empty($field)){
						$message = "Incomplete form";
						$view->set("message", $message);
						exit;
					}
				}
				
				
				
				if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
					
					$message = "Not a valid email";
					
				}elseif($_POST['pwd'] != $_POST['cpwd']){
					
					$message = "Passwords do not match";
					
				}else{

					$message = "You are now registered: please login <a href='".DIR_PATH."/authenticate/login' >here</a>";
					
					$user = new User(array(
						'username' => $_POST['username'],
						'email' => $_POST['email'],
						'password' => self::hashCreate("sha256", $_POST['pwd'], HASH_PWD_KEY)
					));
							
					if($user->validate()){

						$user->save();
						
						header("Location: ".DIR_PATH."/authenticate/login");
						exit();	
					}
				}
				
				$view->set("message", $message);
				
				
			}

        }
		
		public function loginError(){
				
			
			
		}
		
		private function validate($str){
			$str = trim($str);
			$str = stripslashes($str);
			$str = htmlspecialchars($str);
			return $str;
		}
		
		private static function hashCreate($algo, $data, $salt){
			$context = hash_init($algo, HASH_HMAC, $salt);
			hash_update($context, $data);
			
			return hash_final($context);
		}
        
    }





