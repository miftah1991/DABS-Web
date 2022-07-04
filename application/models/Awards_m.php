<?php
Class Awards_m  extends CI_Model {
        
    function GetAll(){
            $today=date('Y-m-d');
            $q = $this->db->query("SELECT *  FROM `tbl_contracts_award` where expire_date>='$today' order by id desc");
            return $q->result();   
            
        }
		
		    function GetAward(){
            $today=date('Y-m-d');
            $q = $this->db->query("SELECT tid,t_specification_number, t_title, location, t_end_date, t_start_date  FROM `tndr_tbl` where visible=1 and t_category='Contract Award'  and t_end_date>='$today' order by tid desc");
            return $q->result();   
            
        }
		
function GetSearch($Search){
            //$sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
			//  $sql = "SELECT tid,t_specification_number, t_title, location, t_end_date, t_start_date  FROM `tndr_tbl` where visible=? and t_specification_number like ? order by tid desc";

              //$q = $this->db->query($sql, array(1, '%$Search%')); 
              //return $q->result();   
			  
			  
			  $this->db->select('*');
              $this->db->from('tbl_contracts_award');
              $this->db->like('contract_number', $Search);
              $q = $this->db->get();
			  return $q->result(); 
            
        }
    function GetTenderDictionary(){
            $languageid=$this->session->userdata('languageid');
            $q = $this->db->query("select * from  tenderdictionary where language_id=$languageid limit 1");
            return $q->result();
    }
    function GetExTenders(){
            $today=date('Y-m-d');
            $q = $this->db->query("SELECT tid,t_specification_number, t_title, location, t_end_date, t_start_date FROM `tndr_tbl` where visible=1 and t_end_date <'$today' order by tid desc");
            return $q->result();   
            
        }
    function GetAwardDetail($id){
            $q = $this->db->query("SELECT * FROM `tbl_contracts_award` where id=$id limit 1");
            return $q->result();   
            
        }
       
}

?>