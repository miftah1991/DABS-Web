<?php
Class Videos_m  extends CI_Model {
        
    function GetAll(){
           // $today=date('Y-m-d');
            $q = $this->db->query("SELECT *  FROM tbl_videos order by v_id desc");
            return $q->result();   
            
    }
	function LatestTwo(){
           // $today=date('Y-m-d');
            $q = $this->db->query("SELECT *  FROM tbl_videos order by v_id desc limit 2");
            return $q->result();   
            
    }
   
    function GetVideo($v_id){
            $q = $this->db->query("SELECT * FROM tbl_videos where v_id=$v_id limit 1");
            return $q->result();   
            
        }
       
}

?>