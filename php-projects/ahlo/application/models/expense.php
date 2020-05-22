<?php


class Expense extends Shared\Model {

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
    * @validate required, alpha, min(3), max(32)
    * @label type
    */
    protected $_type;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label retailer
    */
    protected $_retailer;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label item
    */
    protected $_item;
    
    /**
    * @column
    * @readwrite
    * @type decimal
    * @index
    * 
    * @validate required, max(20)
    * @label amount
    */
    protected $_amount;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @label period
    */
    protected $_period; 
    
    /**
    * @column
    * @readwrite
    * @type integer
    * @length 100
    *
    * @label duration
    */
    protected $_duration;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @label contact
    */
    protected $_contact;
    
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


