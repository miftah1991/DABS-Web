<?php
Class Report_m  extends CI_Model {
    
   
    
    function GetReport($rid){
            $q = $this->db->query("SELECT * FROM tbl_reports where rid=$rid");
            return $q->result();   
            
        }
    function GetAll(){
        $q = $this->db->query("SELECT * FROM tbl_reports order by rid desc");
        return $q->result();
    }
    function AddReport($inputArray){
        $this->db->insert('tbl_reports',$inputArray);
    }
    function UpdateReport($rid,$inputArray){
        $this->db->where('rid', $rid);
            $this->db->update('tbl_reports', $inputArray);
    }
	function DeleteReport($rid){
        $this->db->where('rid', $rid);
            $this->db->delete('tbl_reports');
    }
    
}

?>