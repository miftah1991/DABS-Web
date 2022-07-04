<?php
Class Login_m  extends CI_Model {
	
	function AddCaptcha($data){
        $this->db->insert('captcha',$data);       
    }
	
	function CheckUser($data){
			$condition = "uname =" . "'" . $data['uname'] . "' AND " . "upassword =" . "'" . $data['upassword'] . "'";
			$this->db->select('*');
			$this->db->from('tbl_peopl');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
				if ($query->num_rows() == 1) {
											return true;
												} else {
														return false;
														}
		
	}
	
	function ReadUserData($uname){
		//$condition = "uname =" . "'" . $uname . "'" ;
			$this->db->select('*');
			$this->db->from('tbl_peopl');
			$this->db->where('uname', $uname);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result();	
		
	}
	
}
?>