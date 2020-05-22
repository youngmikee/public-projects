<?php


class Gallery extends Shared\Model {

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
    * @validate required, min(3), max(100)
    * @label image name
    */
    protected $_name;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, min(3), max(32)
    * @label category name
    */
    protected $_category;
    
    /**
    * @column
    * @readwrite
    * @type text
    *
    * @validate required, min(3)
    * @label description
    */
    protected $_description;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 100
    *
    * @validate required, alpha, min(3), max(100)
    * @label author
    */
    protected $_author; 
    
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
    * @validate required, min(3), max(100)
    * @label image
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

