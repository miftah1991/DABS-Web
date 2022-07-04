<?php
Class Home_m  extends CI_Model {
	
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
		$q = $this->db->query("Select * from tbl_dictionary where language_id=$languageid");
		return $q->result();	
	}
	function GetNews1(){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from tbl_news where language_id=$languageid order by date desc limit 1");
		return $q->result();	
	}
	 function GetNews2($latest_news_id){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from tbl_news where language_id=$languageid and nid !=$latest_news_id  order by date desc limit 3");
		return $q->result();	
	}
	 function GetNews3($latest_news_id){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from tbl_news where language_id=$languageid and nid !=$latest_news_id  order by date desc LIMIT 3 OFFSET 3");
		return $q->result();	
	}
	function GetNews4($latest_news_id){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from tbl_news where language_id=$languageid and nid !=$latest_news_id  order by date desc LIMIT 3 OFFSET 6");
		return $q->result();	
	}
	
	function GetSlideImages(){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from tbl_slide_show where language_id=$languageid order by id desc");
		return $q->result();
	}
	function GetMessages(){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from tbl_messages where language_id=$languageid");
		return $q->result();
	}
	function GetNews(){
		$languageid=$this->session->userdata('languageid');
		$this->db->where('language_id', $languageid);
        $this->db->order_by('nid', 'desc');
        $this->db->limit(5, 1);
        $query = $this->db->get("tbl_news");
		return $query->result();
	}
	function getCNews(){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from tbl_news where language_id=$languageid order by date desc limit 5");
		return $q->result();	
	}
	
	/*
	function GetSlideImgSub(){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from `sld_shw_tbl` where language_id=$languageid and page='sub'");
		return $q->result();
	}
	function GetBSlide(){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from btm_sld_tbl where language_id=$languageid");
		return $q->result();	
	}
	function GetFMenue(){
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("SELECT * FROM `ftr_mnu_tbl` where language_id=$languageid");
		$fmrows['fmrow']=$q->result();
		$fmrows['fmnrow']=$q->num_rows();
		return $fmrows;	
	}*/
	public function show_menu1()
	{
		$menu = "";
		$languageid=$this->session->userdata('languageid');
		$q = $this->db->query("select * from tbl_menu where language_id=$languageid and visible=1 order by order_number");
		$menuItems = $q->result();
		$menu = $this->gen_menu($menuItems);
		return $menu;
	}
	
	public function gen_menu($menuItems, $pId = 0)
	{
		$menu		= '';		
		$ulStart	= 0;
		foreach($menuItems as $row)
		{
			if($row->parent_id==$pId)
			{ 
				if($ulStart==0) { $menu .= "<UL class='dropdown menu vertical medium-horizontal' data-dropdown-menu id='menu_items'>"; $ulStart++; }
					
					$url = $row->custom_url;
	$menu .= '<LI><a href="'.base_url().$row->custom_url.'"><strong>'.$row->item_title.'</strong></a>'.$this->gen_menu($menuItems, $row->item_id).'</LI>';

			}
			
		}
		if($ulStart!=0) {  $menu .= "</UL>"; }
		
		return $menu;
	}
	
	//Show Menu by Ibrahim
	
	public function show_menu()
	{
		$languageid=$this->session->userdata('languageid');
		$style='style=font-size:1em';
		if($languageid==1){
			$style='style=font-size:0.9em';
		}
		$menu = "";
		$menu.='<ul class="dropdown menu vertical medium-horizontal"'.$style.' data-dropdown-menu id="menu_items">';	
	    $q = $this->db->query("select * from tbl_menu where parent_id=0 and language_id=$languageid and visible=1 order by order_number");
		$menuItems = $q->result();
		foreach($menuItems as $row){
		$menu .= ' <LI><a href="'.base_url().$row->custom_url.'"><strong>'.$row->item_title.'</strong></a><ul class="submenu menu" data-submenu>';
		       $id=$row->item_id;
	           $sq = $this->db->query("select * from tbl_menu where parent_id=$id and language_id=$languageid and visible=1 order by order_number");
		       $smenuItems = $sq->result();			  
				foreach($smenuItems as $srow){
					$menu .=  '<li><a href="'.base_url().$srow->custom_url.'"><strong>'.$srow->item_title.'</strong></a><ul class="submenuofsubmenu menu" data-submenu>';	  
					$submenu_id=$srow->item_id;
					$ssq = $this->db->query("select * from tbl_menu where parent_id=$submenu_id and language_id=$languageid and visible=1 order by order_number");
					$smenuOfSubmenuItems = $ssq->result();			  
						foreach($smenuOfSubmenuItems as $ssrow){
						$menu .=  '<li><a href="'.base_url().$ssrow->custom_url.'"><strong>'.$ssrow->item_title.'</strong></a></li>';
						}
						$menu .='</ul>';
				}
			    $menu .='</li></ul>';		  
		}
		$menu.='</LI></ul>';		
		return $menu;
	}
}
?>