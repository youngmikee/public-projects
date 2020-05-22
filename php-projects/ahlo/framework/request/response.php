<?php

namespace Framework\Request{
    
    use Framework\Base as Base;
    use Framework\Request\Exception as Exception;
    
    class Response extends Base{
        
        protected $_response;
        
        /**
         * @read
         */
        protected $_body = null;
        
        /**
         * @read
         */
        protected $_headers = array();
        
        protected function _getExceptionForImplementation($method) {
            
            return new Exception\Implementation("{$method} not implemented");
            
        }
        
        protected function _getExceptionForArgument(){
            
            return new Exception\Argument("Invalid argument");
            
        }
        
        function __construct($options = array()) {
            
            if(!empty($options["response"])){
                
                $response = $this->_response = $options["response"];
                unset($options["response"]);
                
            }
            
            parent::__construct($options);
            
            $pattern = '#HTTP/\d\.\d.*?$.*?\r\n\r\n#ims';
            preg_match($pattern, $response, $matches);
            
            $headers = array_pop($matches[0]);
            $headers = explode("\r\n", str_replace("\r\n\r\n", "", $headers));
            
            $this->_body = str_replace($headers, "", $response);
            $version = array_shift($headers);
            
            preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', $version, $matches);
            
            $this->_headers["Http-Version"] = $matches[1];
            $this->_headers["Status-Code"] = $matches[2];
            $this->_headers["Status"] = $matches[2]." ".$matches[3];
            
            foreach($headers as $header){
                
                preg_match('#(.*?)\:\s(.*)#', $header, $matches);
                $this->_headers[$matches[1]] = $matches[2];
                
            }
            
        }
        
        public function __toString() {
            
            return $this->getBody();
            
        }
        
        protected function _partial($tree, $content){
            
            $address = trim($tree["raw"], "/");
            
            if(Framework\StringMethods::indexOf($address, "http") != 0){
                
                $host = Framework\RequestMethods::server("HTTP_HOST");
                $address = "http://{$host}/{$address}";
                
            }
            
            $request = new Request();
            $response = addslashes(trim($request->get($address)));
            return "\$_text[] = \"{$response}\";";
            
        }
        
        protected function _getKey($tree){
            
            if(empty($tree["arguments"]["key"])){
                
                return null;
                
            }
            
            return trim($tree["arguments"]["key"]);
            
        }
        
        protected function _setValue($key, $value){
            
            if(!empty($key)){
                
                $default = $this->getDefaultKey();
                
                $data = Registry::get($default, array());
                $data[$key] = $value;
                
                Registry::set($default, $data);
                
            }
            
        }
        
        protected function _getValue($key){
            
            $data = Registry::get($this->getDefaultKey());
            
            if(isset($data[$key])){
                
                return $data[$key];
                
            }
            
            return "";
            
        }
    
    }
    
}

