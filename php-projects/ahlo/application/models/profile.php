<?php


class Profile extends Shared\Model {

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
    * @type integer
    * @length 100
    *
    * @validate required
    * @label user id
    */
    protected $_user;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 200
    *
    * @validate required, alpha, min(3), max(200)
    * @label greeting
    */
    protected $_greeting;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label chat room
    */
    protected $_chatroom;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 150
    *
    * @validate required, alpha, min(3), max(150)
    * @label chat up
    */
    protected $_chatup;
	
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label interest
    */
    protected $_interest;
    
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

