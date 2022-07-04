<?php
Class Contracts_award_m  extends CI_Model {
		
	    function GetAward($id){
        $q = $this->db->query("SELECT * FROM tbl_contracts_award where id ='$id' ");
        return $q->result();
    }
		
	function SearchTenders ($tid){
		    $q = $this->db->query("SELECT tid,t_specification_number, t_title, location, t_start_date,  t_end_date FROM tndr_tbl where t_specification_number like '%$tid%'");
            return $q->result();  
			
		}
		
    function GetContractsAward(){
        $q = $this->db->query("SELECT * FROM tbl_contracts_award order by id desc");
        return $q->result();
    }
    function AddContractsAward($inputArray){
        $this->db->insert('tbl_contracts_award',$inputArray);
    }
    function Update($id,$inputArray){
            $this->db->where('id', $id);
            $this->db->update('tbl_contracts_award', $inputArray);
    }
	function DeleteContractAward($id){
        $this->db->where('id', $id);
            $this->db->delete('tbl_contracts_award');
    }
    
}

?>