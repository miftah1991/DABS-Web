<?php
Class Slide_m  extends CI_Model {
    
    function AddSlide($inputArray){
        $this->db->insert('tbl_slide_show',$inputArray); 
    }
    
	function GetAll(){            
        $q = $this->db->query("Select s.*, l.* from tbl_slide_show s,tbl_lng l where s.language_id=l.language_id order by s.id desc");
        return $q->result();            
    }
	function GetSlide($s_id){
		
		$q = $this->db->query("Select * from tbl_slide_show where id=$s_id limit 1");
        return $q->result();
		
	}
    function UpdateSlide($s_id,$inputArray){
        $this->db->where('id', $s_id);
		$this->db->update('tbl_slide_show', $inputArray);   
    }
	function DeleteSlide($s_id){
        $this->db->where('id', $s_id);
		$this->db->delete('tbl_slide_show');   
    }
}

?>