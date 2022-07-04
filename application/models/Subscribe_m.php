<?php
Class Subscribe_m  extends CI_Model {
    
    function AddUser($inputArray){
        $this->db->insert('users',$inputArray); 
		return $this->db->insert_id();
    }
    
	function GetNews(){
           // $today=date('Y-m-d');
            $q = $this->db->query("SELECT *  FROM users where news=1 and confirm=1");
            return $q->result();   
            
        }
	function GetTenders(){
           // $today=date('Y-m-d');
            $q = $this->db->query("SELECT *  FROM users where jobs=1 and confirm=1");
            return $q->result();   
            
        }
	function GetJobs(){
           // $today=date('Y-m-d');
            $q = $this->db->query("SELECT *  FROM users where tenders=1 and confirm=1");
            return $q->result();   
            
        }
    
}


?>