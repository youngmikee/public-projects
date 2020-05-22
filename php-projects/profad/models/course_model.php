<?php

class Course extends Model {



    public function __construct() {
        parent::__construct();
    }
    
    public function Insert() 
    {
        $text = $_POST['text'];
        
        $this->db->insert('data', array('text' => $text));
        
        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
    }
    
    public function getCourses(int $num = 0, $condition = "", $ans = "" )
    {
		$this->get($num, $condition, $ans);
    }
	
    public function getAllCourses()
    {
        $result = $this->db->select("SELECT $num FROM data");
        echo json_encode($result);
    }
    
    public function xhrDeleteListing()
    {
        $id = (int) $_POST['id'];
        $this->db->delete('data', "id = '$id'");
    }

}