<?php
Class Menu extends CI_Controller{
    function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $menu_per=$us->menu; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($menu_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
    function index(){
		$USERNAME=$this->session->userdata('USERNAME');
		$dat['usrper']=$this->login_m->ReadUserData($USERNAME);		
        $this->load->model('menu_m');
		$dat['mens']=$this->menu_m->GetAll();
        $this->load->view('admin/list_menu_v',$dat);
    }
    function MenuAdd(){
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
        $this->load->model('lang_m');
        $data['langs']=$this->lang_m->GetAll();
		$this->load->model('menu_m');
		$data['parents']=$this->menu_m->get_parents();
        $this->load->view('admin/menu_add_v',$data);
    	}
    function validate(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_title', 'Menu Title', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('custom_url', 'Menu URL','required|trim|xss_clean|strip_tags');
        return $this->form_validation->run();
    }
    function create_menu(){
	$check=$this->validate();
	if ($check == FALSE)
            {
	$this->MenuAdd();
            }
	    else {
	$this->load->model('menu_m');
	$max=$this->menu_m->get_max();	
	foreach($max as $m){$max_id= $m->item;	}
	$order=$max_id + 1;	
	$inputsArray=array(
		    'item_title'=>$this->input->post('item_title'),
		    'custom_url'=>$this->input->post('custom_url'),
		    'order_number'=>$order,
		    'parent_id'=>$this->input->post('parent_id'),
		    'language_id'=>$this->input->post('language_id'),
		    'visible'=>$this->input->post('visible'),
		    'd_page'=>$this->input->post('d_page')
		    );
	       	
        $this->menu_m->add_menue($inputsArray);
        $this->session->set_flashdata('msg','Menu Added');
        redirect(base_url().'admin/Menu/');
	    }
    }
    function update_form($m_id){
	$USERNAME=$this->session->userdata('USERNAME');
	$data['usrper']=$this->login_m->ReadUserData($USERNAME);
	$this->load->model('lang_m');
    $data['langs']=$this->lang_m->GetAll();
	$this->load->model('menu_m');
	$data['parents']=$this->menu_m->get_parents();
	$data['mrec']=$this->menu_m->get_menu($m_id);
	$parent=$this->menu_m->getmenu_parent($m_id);
	foreach($parent as $p){ $parent_id=$p->parent_id; }
	$data['mparent']=$this->menu_m->getmenu_parents($parent_id);
        $this->load->view('admin/menu_edit_v',$data);
    }
    function update_menu(){
	
	$check=$this->validate();
	if ($check == FALSE)
            {
	    $this->update_form($this->input->post('item_id'));
            }
	    else {
	$this->load->model('menu_m');
	$swap=$this->input->post('swap');
	if($swap!=0){
	$swap_rec=$this->menu_m->get_menu($swap);
	foreach($swap_rec as $s){
	   $swap_number=$s->order_number; 
	}
	$order_num=$this->input->post('order_num');
	$item_id=$this->input->post('item_id');
	$this->menu_m->swap($swap_number,$item_id,$order_num,$swap);
	}
	$item_id=$this->input->post('item_id');
	$inputsArray=array(
		'item_title'=>$this->input->post('item_title'),
		    'custom_url'=>$this->input->post('custom_url'),		    
		    'parent_id'=>$this->input->post('parent_id'),
		    'language_id'=>$this->input->post('language_id'),
		    'visible'=>$this->input->post('visible'),
		    'd_page'=>$this->input->post('d_page')
		    );
	$this->menu_m->update_menu($item_id,$inputsArray);
	$this->session->set_flashdata('msg','\''.$this->input->post('item_title').'\' has been Updated.');
	redirect(base_url().'admin/Menu/');
	
		}	
    }
    function Delete($m_id){
	$this->load->model('menu_m');
        $this->menu_m->delete_rec($m_id);
        $this->session->set_flashdata('msg','Menu  Deleted.');
	redirect(base_url().'admin/Menu/');
    }
    
    
    
    
}
?>