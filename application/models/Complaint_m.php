<?php
Class Complaint_m  extends CI_Model {

    function getComplaintType($type){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->where("language", $languageid);
		$q = $this->db->where("type", $type);
		$q = $this->db->from("complaints_type")->get();
        return $q->result();   
            
        }
	function getDictionary(){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->where("id", $languageid);
		$q = $this->db->from("complaint_dictionary")->get();
		return $q->row(); 
	}
	function add_complaint($inputArray){
		
		
		$this->db->insert('customer_complaints', $inputArray);
		returnt ;
	}
	
	function GetAllComplaints(){
		
		$q = $this->db->where("seen", 0);
		$q = $this->db->order_by("id", "desc");
		$q = $this->db->from("customer_complaints")->get();
		
        return $q->result(); 
	}
	
	function myqueryfunction(){
		
		$q = $this->db->where("seen", 0);
		$q = $this->db->order_by("id", "desc");
		$q = $this->db->from("customer_complaints")->get();
		
        return $q->result(); 
	}

    
}

?>