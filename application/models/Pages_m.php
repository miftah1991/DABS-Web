<?php
Class Pages_m  extends CI_Model {
        
        function AddPage($inputArray){
            $this->db->insert('tbl_pages',$inputArray);
        }
        function GetPages(){
            $q = $this->db->query("SELECT * FROM tbl_pages");
            return $q->result();
        }
        function GetPage($p_id){
            $q = $this->db->query("SELECT * FROM tbl_pages WHERE `page_id`=$p_id");
            return $q->result();
        }
        function EditPage($p_id,$inputArray){
            $this->db->where('page_id', $p_id);
            $this->db->update('tbl_pages', $inputArray);
        }
        function delete_rec($p_id){
        $this->db->where('page_id', $p_id);
	$this->db->delete('tbl_pages');
        }
}

?>