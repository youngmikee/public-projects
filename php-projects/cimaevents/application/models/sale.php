<?php


class Sale extends Shared\Model {

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
    * @length 300
    *
    * @validate required, min(3), max(300)
    * @label product
    */
    protected $_product;
    
    /**
    * @column
    * @readwrite
    * @type integer
    * @length 100
    *
    * @validate required, numeric, min(1), max(10)
    * @label qty
    */
    protected $_qty;
    
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
    * @length 300
    *
    * @validate required, min(3), max(300)
    * @label status
    */
    protected $_status;
    
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

