<?php

Class Message_m  extends CI_Model {

    function __construct() {
    parent::__construct();
   }

    function AddMessagess($inputsArray){

        $this->db->insert('tbl_messages',$inputsArray); 
		//print_r($inputsArray);
    }


	function GetAll(){            
        $q = $this->db->query("Select * from tbl_messages");
	    return $q->result();            

    }

	function GetMessage($m_id){
		$q = $this->db->query("Select * from tbl_messages where m_id=$m_id limit 1");

        return $q->result();

		

	}

    function UpdateMessage($m_id,$inputArray){

        $this->db->where('m_id', $m_id);

		$this->db->update('tbl_messages', $inputArray);   

    }

	function DeleteMessage($m_id){

        $this->db->where('m_id', $m_id);

		$this->db->delete('tbl_messages');   

    }

}



?>