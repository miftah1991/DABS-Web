<?php
Class Lang_m  extends CI_Model {
    
    
    function GetAll(){            
        $q = $this->db->query("SELECT * FROM tbl_lng");
        return $q->result();            
        }
    function Addrec($inputArray){
        $this->db->insert('tbl_lng',$inputArray);
        return $this->db->insert_id();
    }
    function SetDefault($id){
        $q = $this->db->query("UPDATE `bereshna_website_db`.`tbl_lng` SET `default_language` = '0' WHERE `tbl_lng`.`language_id` != '$id'");
    }
    function get_lang($id){
        $q = $this->db->query("SELECT * FROM tbl_lng where language_id='$id'");
        return $q->result();  
    }
    function update_rec($l_id,$inputArray){
	$this->db->where('language_id', $l_id);
	$this->db->update('tbl_lng', $inputArray);
    }
    function delete_rec($l_id){
        $this->db->where('language_id', $l_id);
	$this->db->delete('tbl_lng');
    }
    
    
}
?>