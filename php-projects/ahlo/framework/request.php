<?php

namespace Framework{
    
    use Framework\Base as Base;
    use Framework\StringMethods as StringMethods;
    use Framework\RequestMethods as RequestMethods;
    use Framework\Request\Exception as Exception;
    
    class Request extends Base {

        protected $_request;
        
        /**
         * @readwrite
         */
        public $_willFollow = true;
        
        /**
         * @readwrite
         */
        protected $_headers = array();
        
        /**
         * @readwrite
         */
        protected $_options = array();
        
        /**
         * @readwrite
         */
        protected $_referer;
        
        /**
         * @readwrite
         */
        protected $_agent;
        
        protected function _getExceptionForImplementation($method) {
            
            return new Exception\Implementation("{$method} not implemented");
            
        }
        
        protected function _getExceptionForArgument(){
            
            return new Exception\Argument("Invalid argument");
            
        }
        
        public function __construct($options = array()) {
            
            parent::__construct($options);
            $this->setAgent(RequestMethods::server("HTTP_USER_AGENT", "Curl/PHP ".PHP_VERSION));
        }
        
        public function delete($url, $parameters = array()){
            
            return $this->request("DELETE", $url, $parameters);
            
        }
        
        public function get($url, $parameters = array()){
            
            if(!empty($parameters)){
                
                $url.= StringMethods::indexOf($url, "?") ? "&" : "?";
                $url.= is_string($parameters) ? $parameters : http_build_query($parameters, "", "&");
                
            }
            
            return $this->request("GET", $url);
            
        }
        
        public function head($url, $parameters = array()){
            
            return $this->request("HEAD", $url, $parameters);
            
        }
        
        public function post($url, $parameters = array()){
            
            return $this->request("POST", $url, $parameters);
            
        }
        
        public function put($url, $parameters = array()){
            
            return $this->request("PUT", $url, $parameters);
            
        }
        
        public function request($method, $url, $parameters = array()){
            
            $request = $this->_request = curl_init();
            
            if(is_array($parameters)){
                
                $parameters = http_build_query($parameters, "", "&");
                
            }
            
            $this
              ->_setRequestMethod($method)
              ->_setRequestOptions($url, $parameters)
              ->_setRequestHeaders();
            
            $response = curl_exec($request);
            
            if($response){
                
                $response = new Request\Response(array(
                    "response" => $response
                ));
                
            }else{
                
                throw new Exception\Response(curl_errno($request).'-'.curl_errno($request));
                
            }
            
            curl_close($request);
            return $response;
            
        }
        
        protected function _setOption($key, $value){
            
            curl_setopt($this->_request, $key, $value);
            return $this;
            
        }
        
        protected function _normalize($key){
            
            return "CURLOPT_".str_replace("CURLOPT_", "", strtoupper($key));
            
        }
        
        protected function _setRequestMethod($method){
            
            switch (strtoupper($method)){
                
                case "HEAD":
                    $this->_setOption(CURLOPT_NOBODY, true);
                    break;
                
                case "GET":
                    $this->_setOption(CURLOPT_HTTPGET, true);
                    break;
                
                case "POST":
                    $this->_setOption(CURLOPT_POST, true);
                    break;
                
                default:
                    $this->_setOption(CURLOPT_CUSTOMREQUEST, $method);
                    break;
                
            }
            
            return $this;
            
        }
        
        protected function _setRequestOptions($url, $parameters){
            
            $this
              ->_setOption(CURLOPT_URL, $url)
              ->_setOption(CURLOPT_HEADER, true)
              ->_setOption(CURLOPT_RETURNTRANSFER, true)
              ->_setOption(CURLOPT_USERAGENT, $this->getAgent());
            
            if(!empty($parameters)){
                
                $this->_setOption(CURLOPT_POSTFIELDS, $parameters);
                
            }
            
            if($this->getWillFollow()){
                
                $this->_setOption(CURLOPT_FOLLOWLOCATION, true);
                
            }
            
            if($this->getReferer()){
                
                $this->_setOption(CURLOPT_REFERER, $this->getReferer());
                
            }
            
            foreach($this->_options as $key => $value){
                
                $this->_setOption(constant($this->_normalize($key)), $value);
                
            }
            
            return $this;
            
        }
        
        protected function _setRequestHeaders(){
            
            $headers = array();
            
            foreach($this->getHeaders() as $key => $value){
                
                $headers[] = $key.': '.$value;
                
            }
            
            $this->_setOption(CURLOPT_HTTPHEADER, $headers);
            return $this;
            
        }
    
    }
    
}

