<?php
Class Province_info_m  extends CI_Model {
		
	 function GetAll(){
            $languageid=$this->session->userdata('languageid');
            $this->db->SELECT('province, file');
            $this->db->FROM('tbl_province_info');
			$this->db->WHERE('language_id', 2);
            $q=$this->db->GET();
			
			
		
            return $q->result();            
        }
		
	function SearchProvinceInfo ($tid){
		    $q = $this->db->query("SELECT * FROM tbl_province_info where info_id like '%$tid%'");
            return $q->result();  
			
		}
		
    function GetProvince_info(){
        $q = $this->db->query("SELECT * FROM tbl_province_info order by info_id desc");
        return $q->result();
    }
    function AddProvinceInfo($inputArray){
        $this->db->insert('tbl_province_info',$inputArray);
    }

	function DeleteProvince_info($tid){
        $this->db->where('info_id', $tid);
            $this->db->delete('tbl_province_info');
    }
    
}

?>