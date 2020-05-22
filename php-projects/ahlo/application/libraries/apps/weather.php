<?php

//http://openweathermap.org/img/w/10d.png
/**
 * Open weather Api for uk weather info
 */

namespace Apps{

use Framework\Registry as Registry;

    class Weather{
    	
		private $type;
		private $weather;
		private $info;
		
		private $forecast;
		private $day;

        public function __construct($city, $period) {
        	
			$cache = Registry::get('cache');
			$cache = $cache->connect();
			$query = $city.'/'.$period;
			$data = $cache->get($query);
			
			if(empty($data)){
				
				$url = "http://api.openweathermap.org/data/2.5/".$period."?q=".$city.",uk&mode=json&units=metric&cnt=7&APPID=843f96ebf6a5dc4489be1c4ad0e1d452";
				$response = @file_get_contents($url);
				if($response === FALSE){
					exit;
				}else{
					$response = json_decode($response);
					
					$this->forecast = $response;
					$cache->set($query, $response);
				}
			
			}else{
				$this->forecast = $cache;
			}
				
            
        }
		
		public function get(){
			return $this->forecast;
		}
    
    }
    
}