<?php

class VocationalTraining_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getAllDepartments($name)
    {

        return $this->db->select("SELECT * FROM course_departments WHERE type = '$name'");
		
    }
	
    public function getAllCourses($name)
    {

        return $this->db->select("SELECT * FROM courses WHERE type = '$name'");
		
    }
    
}