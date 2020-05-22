<?php

namespace Framework\Session\Driver
{
    use Framework\Session as Session;
    
    class Server extends Session\Driver
    {
        /**
        * @readwrite
        */
        protected $_prefix = "app_";
        
        public function __construct($options = array())
        {
            parent::__construct($options);
            session_start();
        }
        
        public function get($key, $default = null){
            
            if (isset($_SESSION[$this->prefix.$key]))
            {
                return $_SESSION[$this->prefix.$key];
            }
            
            return $default;
            
        }
        
        public function set($key, $value){
            
            $prefix = $this->getPrefix();
            $_SESSION[$prefix.$key] = $value;
            return $this;
            
        }
        
        public function erase($key){
            
            $prefix = $this->getPrefix();
            unset($_SESSION[$prefix.$key]);
            return $this;
            
        }
        
        public function __destruct() {
            
            session_commit();
            
        }
    }
}
