<?php
Class Headerfooter_m  extends CI_Model {
	function __construct(){
		if($this->session->userdata('languageid')=="" || !$this->session->userdata('languageid'))
		{
		$this->load->model('Site_Model');
		$this->Site_Model->index();
		}  
	}
	function GetLang(){
		$lang=$this->db->get('tbl_lng');
		if($lang->num_rows()>0){
		$row=$lang->result();
			}
		//$row['trows']=$lang->num_rows();
		return $row;
	}
	
	function GetDictionary(){
		$languageid=$this->session->userdata('languageid');
		$this->db->where('language_id', $languageid);
		$q = $this->db->get("tbl_dictionary");
		//$q = $this->db->query("Select * from tbl_dictionary where language_id=$languageid");
		return $q->result();	
	}
	public function show_menu()
	{
		$menu = "";
		$menu.='<ul class="dropdown menu vertical medium-horizontal" data-dropdown-menu id="menu_items">';
		$languageid=$this->session->userdata('languageid');
		
		$this->db->where('language_id', $languageid);
		$this->db->where('visible',1);
		$this->db->where('parent_id',0);
		$this->db->order_by("order_number");
		$q = $this->db->get("tbl_menu");
	       	//$q = $this->db->query("select * from tbl_menu where parent_id=0 and language_id=$languageid and visible=1 order by order_number");
			//$q = $this->db->query("select * from mnu_tbl where parent_id=0 and language_id=1 and visible=1 order by order_number");
		$menuItems = $q->result();
		//$menu = $this->gen_menu($menuItems);
	
		foreach($menuItems as $row){
		  
		  
		$menu .= ' <LI><a href="'.base_url().$row->custom_url.'"><strong>'.$row->item_title.'</strong></a><ul class="submenu menu" data-submenu>';
		             $id=$row->item_id;
					 
		$this->db->where('language_id', $languageid);
		$this->db->where('visible',1);
		$this->db->where('parent_id',$id);
		$this->db->order_by("order_number");
		$sq = $this->db->get("tbl_menu");
	                  //$sq = $this->db->query("select * from tbl_menu where parent_id=$id and language_id=$languageid and visible=1 order by order_number");
		          $smenuItems = $sq->result();
			  
			  foreach($smenuItems as $srow){
			   $menu .=  '<li><a href="'.base_url().$srow->custom_url.'"><strong>'.$srow->item_title.'</strong></a></li>';
			  }
                      
			
			  
			
			
			$menu .='</ul>';
   
		  
		  
		}
			$menu.='</LI></ul>';
		
		return $menu;
	}
}
?>