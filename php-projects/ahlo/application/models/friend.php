<?php

class Friend extends Shared\Model{
    
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
     * @length 11
     */
    protected $_user;
    
    /**
     * @column
     * @readwrite
     * @type integer
     * @length 11
     */
    protected $_friend;
    
}

