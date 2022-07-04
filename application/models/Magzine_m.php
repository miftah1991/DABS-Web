<?php
Class Magzine_m  extends CI_Model {
    
    function AddMagzine($inputArray){
        $this->db->insert('tbl_magzine',$inputArray); 
    }
    
	function GetAll(){            
        $q = $this->db->query("Select * from tbl_magzine order by mg_id desc");
        return $q->result();            
    }
	function GetMagzine($mg_id){
		
		$q = $this->db->query("Select * from tbl_magzine where mg_id=$mg_id limit 1");
        return $q->result();
		
	}
    function UpdateMagzine($mg_id,$inputArray){
        $this->db->where('mg_id', $mg_id);
		$this->db->update('tbl_magzine', $inputArray);   
    }
	function DeleteMagzine($mg_id){
        $this->db->where('mg_id', $mg_id);
		$this->db->delete('tbl_magzine');   
    }
}

?>