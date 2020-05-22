<?php

namespace Framework{
    
    use Framework\Base as Base;
    use Framework\Cache as Cache;
    use Framework\Cache\Exception as Exception;
    
    class Cache extends Base {

        /**
         * @readwrite
         */
        protected $_type;
        
        /**
         * @readwrite
         */
        protected $_options;
        
        /**
         * 
         * @param type $method
         * @return \Framework\Cache\Exception\Implementation
         * @readwrite
         */
        protected $_cached;


        protected function _getExceptionForImplementation($method) {
            
            return new Exception\Implementation("{$method} method not implemented");
            
        }
        
        public function initialize(){
            
            $type = $this->getType();

            if(empty($type)){
                
                $configuration = Registry::get("configuration");
                
                if($configuration){

                    $parsed = $configuration->parse("configuration/cache");

                    if(!empty($parsed->cache->default) && !empty($parsed->cache->default->type)){

                        $type = $parsed->cache->default->type;
                        unset($parsed->cache->default->type);
                        $this->__construct(array(
                            "type" => $type,
                            "options" => (array) $parsed->cache->default
                        ));
                        
                    }
                    
                }
                
            }

            if(empty($type)){
                
                throw new Exception\Argument("Invalid type");
                
            }
            
            switch ($type){
                
                case "memcached":
                {
 
                    return new Cache\Driver\Memcached($this->getOptions());
                    break;
                }
				
				case "redis":
				{
					return new Cache\Driver\Redis($this->getOptions());
					break;
				}
                
                default:
                {
                    throw new Exception\Argument("Invalid type");
                    break;
                }
                
            }
            
        }
    
    }
    
}

