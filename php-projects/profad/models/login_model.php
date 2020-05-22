<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run($data)
    {
    	
    	
        $sth = $this->db->prepare("SELECT id, account, firstName, surName, email, staffId FROM registered WHERE 
                email = :email AND password = :password");
        $sth->execute(array(
            ':email' => $data['email'],
            ':password' => Hash::create('sha256', $data['pwd'], HASH_PASSWORD_KEY)
        ));
        
        $data = $sth->fetch();
        
        $count =  $sth->rowCount();
		
        if($count > 0) {
            // login
            Session::init();
            Session::set('name', $data['firstName']);
			Session::set('account', $data['account']);
			Session::set('email', $data['email']);
			Session::set('staffId', $data['staffId']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['id']);
			
			$result = $this->loginUser($data);
            
			if($result){
				return $count;
			}
			
        } else {
        	return FALSE;
        }
        
    }
	
	public function loginUser($data){
		
		try{
			
			$this->db->insert('login', array(
	            'email' => $this->validate($data['email']),
	            'timeIn' => date("h:i:sa"),
	            'date' => date("Y/m/d")
	        ));
			
			return TRUE;
			
		}catch(Exception $e){
			return FALSE;
		}
		
	}
    
}