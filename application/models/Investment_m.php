<?php
Class Investment_m  extends CI_Model {
	
		
	function InvestmentIndex(){
        $q = $this->db->query("SELECT * FROM tbl_investment where type='core'");
        return $q->result();
    }
		
    function EnergyLaws(){
        $q = $this->db->query("SELECT * FROM tbl_investment where type='energy'");
        return $q->result();
    }
	function FactSheets(){
        $q = $this->db->query("SELECT * FROM tbl_investment where type='fact'");
        return $q->result();
    }
	function Maps(){
        $q = $this->db->query("SELECT * FROM tbl_investment where type='maps'");
        return $q->result();
    }
	function PPPLaws(){
        $q = $this->db->query("SELECT * FROM tbl_investment where type='ppp'");
        return $q->result();
    }
    function AddInvestment($inputArray){
        $this->db->insert('tbl_investment',$inputArray);
    }
	
    function Archive(){
        $q = $this->db->query("SELECT * FROM tbl_investment");
        return $q->result();
		}
    
}

?>