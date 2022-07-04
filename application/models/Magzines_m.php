<?php
Class Magzines_m  extends CI_Model {
    
    function GetOnlineMagzine(){
            //$languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT *  FROM tbl_magzine where  mg_type='Online' order by mg_id desc limit 5");
            return $q->result();   
            
        }
	function GetPrintMagzine(){
           // $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT *  FROM tbl_magzine where mg_type='Print' order by mg_title desc limit 5");
            return $q->result();   
            
        }
	function GetTenderDictionary(){
            $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("select t_start_date, download,volume,number from  tenderdictionary where language_id=$languageid limit 1");
            return $q->result();
   
   }
	function GetMagzineArchive(){
           // $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT *  FROM tbl_magzine where mg_type='Online' order by mg_id desc ");
            return $q->result();   
            
        }
	function GetPRINSTMGArchive(){
		$q = $this->db->query("SELECT *  FROM tbl_magzine where mg_type='Print' order by mg_title desc ");
            return $q->result(); 
	}	
	
}

?>