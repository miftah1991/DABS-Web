<?php
Class Page_m  extends CI_Model {
        
        function GetPageDetail($url){
            $q = $this->db->query("SELECT * FROM tbl_pages WHERE `custom_url`='$url'");
            return $q->result();             
        }
       
}

?>