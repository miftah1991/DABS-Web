<?php
Class Reports_m  extends CI_Model {
        
    function GetAll(){
            
            $q = $this->db->query("SELECT rid, rtitle,rpublish_date,rfile  FROM `tbl_reports` order by rid desc");
            return $q->result();   
            
        }
    function GetTenderDictionary(){
            $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("select * from  tenderdictionary where language_id=$languageid limit 1");
            return $q->result();
    }
    function GetFinancialReports(){
            
            $q = $this->db->query("SELECT rid, rtitle,rpublish_date,rfile  FROM `tbl_reports` where type='Financial' order by rid desc");
            return $q->result();   
            
        }
	function GetFunctionalReports(){
            
            $q = $this->db->query("SELECT rid, rtitle,rpublish_date,rfile  FROM `tbl_reports` where type='Functional' order by rid desc");
            return $q->result();   
            
        }
	function GetESMFReports(){
            
            $q = $this->db->query("SELECT rid, rtitle,rpublish_date,rfile  FROM `tbl_reports` where type='ESMF' order by rid desc");
            return $q->result();   
            
        }
    function GetReport($rid){
            $q = $this->db->query("SELECT * FROM `tbl_reports` where rid=$rid limit 1");
            return $q->result();   
            
        }
			function casa1000(){
            
            $q = $this->db->query("SELECT rid, rtitle,rpublish_date,rfile  FROM `tbl_reports` where type='casa-1000' order by rid desc");
            return $q->result();   
            
        }
       
}

?>