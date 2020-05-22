<?php


class Weather extends Shared\Model {

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
    * @label forcast type
    */
    protected $_type;
	
    /**
    * @column
    * @readwrite
    * @type datetime
	*
	* @label focast date
    */
    protected $_date;
	
    /**
    * @column
    * @readwrite
    * @type text
	* @length 100
	*
    * @label country
    */
    protected $_country;
    
    /**
    * @column
    * @readwrite
    * @type text
	* @length 100
	*
    * @label forcast location
    */
    protected $_location;

    /**
    * @column
    * @readwrite
    * @type text
	* @length 10
	*
    * @label length
    */
    protected $_timestep;
	
    /**
    * @column
    * @readwrite
    * @type integer
    * @length 10
    *
    * @label weather
    */
    protected $_weather;

    /**
    * @column
    * @readwrite
    * @type text
	* @length 10
    * 
    * @label visibility
    */
    protected $_visibility;

    /**
    * @column
    * @readwrite
    * @type decimal
	* @length 20
    * 
    * @label wind speed
    */
    protected $_windspeed;
	
    /**
    * @column
    * @readwrite
    * @type text
	* @length 20
    * 
    * @label wind direction
    */
    protected $_winddirection;
	
    /**
    * @column
    * @readwrite
    * @type decimal
	* @length 10
    * 
    * @label temprature feel
    */
    protected $_feel;

    /**
    * @column
    * @readwrite
    * @type text
    * @length 10
    * @index
    * 
    * @label humidity
    */
    protected $_humidity;
    
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

