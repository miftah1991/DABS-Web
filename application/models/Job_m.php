<?php
Class Job_m  extends CI_Model {
    
   
    
    function GetJob($jid){
            $q = $this->db->query("SELECT * FROM tbl_jobs where jid=$jid");
            return $q->result();   
            
        }
    function GetJobs(){
        $q = $this->db->query("SELECT jid,position_title, number_position, vacancy_num, province,  expire_date FROM tbl_jobs order by jid desc");
        return $q->result();
    }
    function AddJob($inputArray){
        $this->db->insert('tbl_jobs',$inputArray);
    }
    function UpdateJob($jid,$inputArray){
        $this->db->where('jid', $jid);
            $this->db->update('tbl_jobs', $inputArray);
    }
	function DeleteJob($jid){
        $this->db->where('jid', $jid);
            $this->db->delete('tbl_jobs');
    }
	  
}

?>