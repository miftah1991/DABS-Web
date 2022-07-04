<?php
Class Video_m  extends CI_Model {
    
    function AddVideo($inputArray){
        $this->db->insert('tbl_videos',$inputArray); 
    }
    
	function GetAll(){            
        $q = $this->db->query("Select * from tbl_videos order by v_id desc");
        return $q->result();            
    }
	
	function GetVideo($v_id){
		
		$q = $this->db->query("Select * from tbl_videos where v_id=$v_id limit 1");
        return $q->result();
		
	}
    function UpdateVideo($v_id,$inputArray){
        $this->db->where('v_id', $v_id);
		$this->db->update('tbl_videos', $inputArray);   
    }
	function DeleteVideo($v_id){
        $this->db->where('v_id', $v_id);
		$this->db->delete('tbl_videos');   
    }
}

?>