<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;

class Messages extends Controller{
    

	    /**
	     * @before _secure
	     */
        public function index(){
			$view = $this->getActionView();
			$user = $this->getUser();
		
            $profileSettings = Profile::first(array(
                "user = ?" => $user->id,
                "live = ?" => true,
                "deleted = ?" => false
            ));
		
			$accountSettings = Account::first(array(
                "user = ?" => $user->id,
                "live = ?" => true,
                "deleted = ?" => false
            ));
			
			if(empty($profileSettings) && !empty($accountSettings)){
				$view->set("dialog", "profile settings");
			}elseif(empty($accountSettings) && !empty($profileSettings)){
				$view->set("dialog", "account settings");
			}elseif(empty($profileSettings) && empty($accountSettings)){
				$view->set("dialog", "profile and account settings");
			}
			
			
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
	
	
	
    public function add(){

        $user = $this->getUser();

        if(RequestMethods::post("share")){

            $message = new Message(array(
                "body" => RequestMethods::post("body"),
                "message" => RequestMethods::post("message"),
                "user" => $user->id
            ));

            if($message->validate()){

                $message->save();
                header("Location: ".DIR_PATH."/home/index");
                exit();

            }

        }

    }
} 
