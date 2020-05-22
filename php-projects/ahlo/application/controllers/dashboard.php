<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class Dashboard extends Controller {

	    /**
	     * @before _secure
	     */
        public function index(){

			$layoutView = $this->getLayoutView();
			$actionView = $this->getActionView();
			$user = $this->getUser();
			
			$session = Registry::get("session");
			$account = json_decode($session->get('account'));
			
			if(empty($account)){
					
				$account = Account::first(array(
	                "user = ?" => $user->id,
	                "live = ?" => true,
	                "deleted = ?" => false
	            ));
				
				if(empty($account)){
					header("Location: ".DIR_PATH."/settings");
					exit;
				}else{
					$session->set("account", serialize($account));
				}
				
			}else{
		
				$layoutView->set('apps', DIR_PATH.'/scripts/customAPI.js');
				
			}
			
			if(!empty($account)){
				$city = $account->city;
				$this->weather($city); // weather
				
			}
			
			
        }

		public function forecast($city){
			$period ="forecast/daily";
			$view = $this->getActionView();
			
			$forecast = new Apps\weather($city, $period);
			$forecast = $forecast->get();
			$forecast = $forecast->list;
			$max = sizeof($forecast);
			
			$time = time();
			
			for($i = 0; $i < $max; $i++){
				
				if($forecast[$i]->dt <= $time){
					$temp = $forecast[$i]->temp;
					$min = floor($temp->min);
					$max = floor($temp->max);
					
					$view->set("min", $min);
					$view->set("max", $max);
					break;
				}
				
			}	
			
			//var_dump($forecast);
			//exit;
	
		}
		
		public function daily($city){
				$view = $this->getActionView();
				$period = "weather";
				$url = "http://openweathermap.org/img/w/";
				
				$weather = new Apps\weather($city, $period);
				$weather = $weather->get();
				$info = $weather->weather[0]->description;
				$icon = $url.$weather->weather[0]->icon.'.png';
				$temp = $weather->main->temp;
				$temp = floor($temp);
				
				$view->set("temp", $temp);
				$view->set("icon", $icon);
				$view->set("info", $info);
				$view->set("city", $city);
				
				//var_dump($icon);
				//exit;

		}
		
		public function weather($city){
			$this->daily($city);
			$this->forecast($city);
			
		}
		
	    public function logout(){
	        
	        $this->setUser(false);
	        
	        $session = Registry::get("session");
	        $session->erase("user");
			$session->erase("account");
	        
	        header("Location: ".DIR_PATH."/authenticate");
	        exit();
	        
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
