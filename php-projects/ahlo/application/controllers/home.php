<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class Home extends Controller {

        public function index(){

            $user = $this->getUser();

            if($user){
                
                header("Location: ".DIR_PATH."/users/index");
                exit();
                
            }
            
            $session = Registry::get("session");
            $success = unserialize($session->get("success", null));
            
            $view = $this->getActionView();
            
            if($success){
                $view->set("success", true);
            }
            
            if(RequestMethods::post("login")){
                $this->login();
            }
            
            if(RequestMethods::post("register")){
                $this->register();
            }
            
            $session->set("success", serialize(false));
            
        }
        
        public function login(){
            
            $user = $this->getUser();
            
            if($user == false){

                $email = RequestMethods::post("email");
                $password = RequestMethods::post("password");

                $view = $this->getLayoutView();
                $error = false;
                
				if(empty($email) and empty($password)){
                    $view->set("email_error", "You must enter both your email address and password. Please try again.");
                    $error = true;
				}

                if(empty($email)){

                    $view->set("email_error", "Email not provided");
                    $error = true;

                }

                if(empty($password)){

                    $view->set("password_error", "Password not provided");
                    $error = true;

                }

                if(!$error){

                    $user = User::first(array(
                        "email = ?" => $email,
                        "password = ?" => $password,
                        "live = ?" => true,
                        "deleted = ?" => false
                    ));

                    if(!empty($user)){

                        $session = Registry::get("session");
                        $session->set("user", serialize($user));

                        header("Location: ".DIR_PATH."/users/index");
                        exit();

                    }else{

                        $view->set("password_error", "Email address and/or password are incorrect");

                    }

                }
				

            }

        }
        
        public function register(){

        //    if(){ Quick validation
            $view = $this->getActionView();
            
            $user = new User(array(
                "first" => RequestMethods::post("first"),
                "last" => RequestMethods::post("last"),
                "email" => RequestMethods::post("email"),
                "password" => RequestMethods::post("password")
            ));

            if($user->validate()){
                
                $user->save();
                $view->set("success", true);
                $session = Registry::get("session");
                $session->set("success", serialize(true));
               
                header("Location: ".DIR_PATH);
                exit(); 

            }

            $view->set("errors", $user->getErrors());

    //        }

        }
		
		public function loginError(){
				
			
			
		}
        
    }





