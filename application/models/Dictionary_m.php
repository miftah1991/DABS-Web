<?php
Class Dictionary_m  extends CI_Model {
        
    function GetAll(){
            $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT * FROM tbl_dictionary where language_id=$languageid limit 1");
            return $q->result();   
            
        }
    function translate($fields){
			$languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT $fields FROM tbl_dictionary where language_id=$languageid limit 1 ");
            return $q->result();   
            
        }
       
}

?>