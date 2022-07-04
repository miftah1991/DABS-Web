<?php
Class News_m  extends CI_Model {
        
    function GetAll(){
            $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT * FROM tbl_news where language_id=$languageid order by nid desc");
            return $q->result();   
            
        }
    function GetNews($nid){
            $q = $this->db->query("SELECT * FROM tbl_news where nid=$nid");
            return $q->result();   
            
        }
       
}

?>