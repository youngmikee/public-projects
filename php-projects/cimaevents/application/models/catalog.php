<?php


class Catalog extends Shared\Model {

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
    * @label name
    */
    protected $_name;
    
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
    * @type decimal
    * @length 100
    *
    * @validate required, alpha, min(3), max(100)
    * @label name
    */
    protected $_price;
    
    /**
    * @column
    * @readwrite
    * @type integer
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label qty
    */
    protected $_qty;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(32)
    * @label visibility
    */
    protected $_visibility;
    
    /**
    * @column
    * @readwrite
    * @type boolean
    * @index
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

