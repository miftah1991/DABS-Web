<?php
Class Search_m  extends CI_Model {
    
   
    
    function GetPage($key){
			$k=$this->security->xss_clean($key);
			$this->db->like('title', $k); 
			$this->db->or_like('contents', $k);
			$q = $this->db->get("tbl_pages");
            //$q = $this->db->query("SELECT * FROM tbl_pages where title like '%$key%' or contents like '%$key%' ");
            return $q->result();   
            
        }
	function GetNews($key1){
			$k1=$this->security->xss_clean($key1);
			$this->db->like('subtitle', $k1); 
			$this->db->or_like('text', $k1);
			$q = $this->db->get("tbl_news");
            //$q = $this->db->query("SELECT * FROM tbl_news where subtitle like '%$key1%' or text like '%$key1%' ");
            return $q->result();   
            
        }
    
    
}

?>