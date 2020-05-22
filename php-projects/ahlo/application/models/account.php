<?php


class Account extends Shared\Model {

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
    * @label user
    */
    protected $_user;
	
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label Chat room
    */
    protected $_chatroom;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label first name
    */
    protected $_firstname;
    
	/**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label last name
    */
    protected $_lastname;

    /**
    * @column
    * @readwrite
    * @type text
	* @length 20
    * 
    * @validate required, alpha, min(3), max(32)
    * @label dob day
    */
    protected $_dobDay;

    /**
    * @column
    * @readwrite
    * @type text
	* @length 20
    * 
    * @validate required, alpha, min(3), max(32)
    * @label dob month
    */
    protected $_dobMonth;
	
    /**
    * @column
    * @readwrite
    * @type text
	* @length 20
    * 
    * @validate required, alpha, min(3), max(32)
    * @label dob year
    */
    protected $_dobYear;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 11
    * @index
    * 
    * @validate required, alpha, min(2), max(11)
    * @label gender
    */
    protected $_gender;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 11
    * @index
    * 
	* @validate required, alpha, min(2), max(11)
    * @label mobile
    */
    protected $_mobile;
	
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label country
    */
    protected $_country;
	
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(5), max(100)
    * @label address
    */
    protected $_address;
	
    /**
    * @column
    * @readwrite
    * @type text
    * @length 15
    *
    * @validate required, alpha, min(3), max(10)
    * @label post code
    */
    protected $_postcode;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label city
    */
    protected $_city;
    
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

