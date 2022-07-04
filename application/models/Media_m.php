<?php
Class Media_m  extends CI_Model {
    
    function AddMedia($inputArray){
        $this->db->insert('tbl_files',$inputArray); 
    }
    
	function GetAll(){            
        $q = $this->db->query("Select * from tbl_files order by file_id desc");
        return $q->result();            
    }
	function GetMedia($file_id){
		
		$q = $this->db->query("Select * from tbl_files where file_id=$file_id limit 1");
        return $q->result();
		
	}
    function UpdateMedia($file_id,$inputArray){
        $this->db->where('file_id', $file_id);
		$this->db->update('tbl_files', $inputArray);   
    }
	function DeleteMedia($file_id){
        $this->db->where('file_id', $file_id);
		$this->db->delete('tbl_files');   
    }
}

?>