<?php
Class Menu_m  extends CI_Model {
	
    function GetAll(){            
        $q = $this->db->query("SELECT m1.item_id AS id, m1.item_title AS title, m1.custom_url AS custom_url, m1.order_number AS order_number,
                              m1.visible AS visible, lang.language, m2.item_title AS parent FROM tbl_menu m1
                              INNER JOIN tbl_lng lang ON lang.language_id = m1.language_id
                              LEFT JOIN tbl_menu m2 ON m1.parent_id = m2.item_id");
        return $q->result();            
    }
    function get_parents(){
        $q=$this->db->query("Select * FROM tbl_menu");
        return $q->result();
    }
    function add_menue($inputArray){
        $this->db->insert('tbl_menu',$inputArray); 
    }
    function get_max(){
        $q=$this->db->query("SELECT max( item_id ) AS item FROM tbl_menu");
        return $q->result();        
    }
    function get_menu($m_id){
        $q = $this->db->query("SELECT m1.item_id AS id, m1.item_title AS title,m1.d_page, m1.parent_id, m1.custom_url AS custom_url, m1.order_number AS order_number, m1.visible AS visible,lang.language_id, lang.language, m2.item_title AS parent
                            FROM tbl_menu m1
                            INNER JOIN tbl_lng lang ON lang.language_id = m1.language_id
                            LEFT JOIN tbl_menu m2 ON m1.parent_id = m2.item_id where m1.item_id=$m_id");
        return $q->result();   
    }
    function getmenu_parent($m_id){
        $q=$this->db->query("Select parent_id FROM tbl_menu where item_id=$m_id");
        return $q->result();   
    }
    function getmenu_parents($parent_id){
        $q=$this->db->query("Select * FROM tbl_menu where parent_id=$parent_id");
        return $q->result();
    }
    function swap($swap_number,$id,$order_num,$swap){
        $query1=$this->db->query("update tbl_menu set order_number =$swap_number where item_id=$id");
        $query2=$this->db->query("update tbl_menu set order_number =$order_num where item_id=$swap");
    }
    function update_menu($m_id,$inputArray){
        $this->db->where('item_id', $m_id);
	$this->db->update('tbl_menu', $inputArray);   
    }
    function delete_rec($m_id){
        $this->db->where('item_id', $m_id);
	$this->db->delete('tbl_menu');
    }
    
	
}


?>