<?php


class Service extends Shared\Model {

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
    * @label product name
    */
    protected $_name;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 300
    *
    * @validate required, min(3), max(300)
    * @label description
    */
    protected $_description;
    
    /**
    * @column
    * @readwrite
    * @type decimal
    *
    * @validate required
    * @label price
    */
    protected $_price;
    
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
    * @label visibility
    */
    protected $_visibility;    
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, min(3), max(32)
    * @label product image
    */
    protected $_image;
    
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

