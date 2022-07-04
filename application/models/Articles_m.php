<?php
Class Articles_m  extends CI_Model {
        
    function GetAll(){
            $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT * FROM tbl_articles where language_id=$languageid order by nid desc");
            return $q->result();   
            
        }

  /*  function GetOneField(){
            $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("SELECT 'date' FROM tbl_articles where language_id=$languageid order by nid desc");
           $q->result(); 
           $d=''; 
           foreach ($q as $n) {
            	$d=$n->date;
            } 
           return $d;
            
        }
   */


    function GetArticle($nid){
            $q = $this->db->query("SELECT * FROM tbl_articles where nid=$nid");
            return $q->result();   
            
        }
       
}

?>