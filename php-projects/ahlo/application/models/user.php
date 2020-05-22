<?php


class User extends Shared\Model {

    /**
    * @column
    * @readwrite
    * @primary
    * @type autonumber
    */
    protected $_id;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 10
    *
    * @validate required, alpha, min(3), max(10)
    * @label first name
    */
    protected $_username;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    * @index
    * 
    * @validate required, max(50)
    * @label email address
    */
    protected $_email;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    * @index
    * 
    * @validate required, min(8), max(100)
    * @label password
    */
    protected $_password;
    
    /**
    * @column
    * @readwrite
    * @type boolean
    * @index
    */
    protected $_live;
    
    /**
    * @column
    * @readwrite
    * @type boolean
    * @index
    */
    protected $_deleted;
    
    /**
    * @column
    * @readwrite
    * @type datetime
    */
    protected $_created;
    
    /**
    * @column
    * @readwrite
    * @type datetime
    */
    protected $_modified;
    
    public function isFriend($id){
        
        $friend = Friend::first(array(
            "user" => $this->getId(),
            "friend" => $id
        ));
        
        if($friend){
            
            return true;
            
        }
        
        return false;
        
    }
    
    public static function hasFriend($id, $friend){

        $user = new self(array(
            "id" => $id
        ));
        
        return $user->isFriend($friend);
        
    }

}

