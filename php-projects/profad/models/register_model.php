<?php

class Register_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }


    public function create($data){

		try{
			
			$this->db->insert('registered', array(
	        	'account' => $this->validate($data['account']),
	            'firstName' => $this->validate($data['firstName']),
	            'surName' => $this->validate($data['surName']),
	            'email' => $this->validate($data['email']),
	            'password' => Hash::create('sha256', $this->validate($data['pwd']), HASH_PASSWORD_KEY),
	            'staffId' => $this->validate($data['staffId']),
	            'date' => date("Y/m/d"),
	            'deleted' => 0
	        ));
			
			return TRUE;
			
		}catch(Exception $e){
			return FALSE;
		}
		
		
    }	

    
}