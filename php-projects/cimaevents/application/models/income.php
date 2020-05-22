<?php


class Income extends Shared\Model {

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
    * @length 100
    *
    * @validate required, min(3), max(32)
    * @label  payer Id
    */
    protected $_payerId;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, min(3), max(50)
    * @label payer name
    */
    protected $_name;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, min(3), max(100)
    * @label eamil address
    */
    protected $_email;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 300
    *
    * @validate required, min(3), max(300)
    * @label country
    */
    protected $_country;
    
    /**
    * @column
    * @readwrite
    * @type decimal
    *
    * @validate required
    * @label amount
    */
    protected $_amount;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label type
    */
    protected $_type; 
    
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

}

