<?php
Class Tender_m  extends CI_Model {
		
	    function GetTender($tid){
        $q = $this->db->query("SELECT * FROM tndr_tbl where tid ='$tid' ");
        return $q->result();
    }
		
	function SearchTenders ($tid){
		    $q = $this->db->query("SELECT tid,t_specification_number, t_title, location, t_start_date,  t_end_date FROM tndr_tbl where t_specification_number like '%$tid%'");
            return $q->result();  
			
		}
		
    function GetTenders(){
        $q = $this->db->query("SELECT tid,t_specification_number, t_title, location, t_start_date,  t_end_date FROM tndr_tbl order by tid desc");
        return $q->result();
    }
    function AddTender($inputArray){
        $this->db->insert('tndr_tbl',$inputArray);
    }
    function Update($tid,$inputArray){
            $this->db->where('tid', $tid);
            $this->db->update('tndr_tbl', $inputArray);
    }
	function DeleteTender($tid){
        $this->db->where('tid', $tid);
            $this->db->delete('tndr_tbl');
    }
    
}

?>