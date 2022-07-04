<?php
Class Pages extends CI_Controller{
	function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $pages_per=$us->pages; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($pages_per != 1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
	function page_addForm(){
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
		$this->load->view('admin/pages_add_v',$data);
	}
	function validate(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Page Title', 'required|trim|xss_clean|strip_tags');
	$this->form_validation->set_rules('custom_url', 'Page URL','required|trim|xss_clean|strip_tags|is_unique[tbl_pages.custom_url]');
	$this->form_validation->set_rules('contents', 'Page Content','required');
        return $this->form_validation->run();
	}
	function valid(){
	$this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Page Title', 'required|trim|xss_clean|strip_tags');
	$this->form_validation->set_rules('custom_url', 'Page URL','required|trim|xss_clean|strip_tags');
	$this->form_validation->set_rules('contents', 'Page Content','required');
        return $this->form_validation->run();	
	}
	function new_page(){
	$check=$this->validate();
	if ($check == FALSE)
            {
	    $this->page_addForm();
            }
	    else {
		$inputsArray=array(
		    'title'=>$this->input->post('title'),
                    'custom_url'=>$this->input->post('custom_url'),
                    'contents'=>$this->input->post('contents')
                    );
		$this->load->model('pages_m');
		$this->pages_m->AddPage($inputsArray);
		$this->session->set_flashdata('msg','\''.$this->input->post('title').'\' has been added.');
		redirect(base_url().'admin/Pages/list_pages');
	    }
		
	}
	function list_pages(){
	$USERNAME=$this->session->userdata('USERNAME');
	$data['usrper']=$this->login_m->ReadUserData($USERNAME);
	$this->load->model('pages_m');
	$data['pages']=$this->pages_m->GetPages();
	$this->load->view('admin/pages_list_v',$data);
	}
	function Edit($p_id){
	$USERNAME=$this->session->userdata('USERNAME');
	$data['usrper']=$this->login_m->ReadUserData($USERNAME);
	$this->load->model('pages_m');
	$data['page']=$this->pages_m->GetPage($p_id);
	$this->load->view('admin/pages_edit_v',$data);
	}
	function update_page(){
	$check=$this->valid();
	if ($check == FALSE)
            {
	    $this->Edit($this->input->post('page_id'));
            }
	    else {
		$inputsArray=array(
		    'title'=>$this->input->post('title'),
                    'custom_url'=>$this->input->post('custom_url'),
                    'contents'=>$this->input->post('contents')
                    );
		$p_id=$this->input->post('page_id');
		$this->load->model('pages_m');
		$this->pages_m->EditPage($p_id,$inputsArray);
		$this->session->set_flashdata('msg','\''.$this->input->post('title').'\' has been Updated.');
		redirect(base_url().'admin/Pages/list_pages');
	    }
	}
	function Delete($p_id){
	$this->load->model('pages_m');
        $this->pages_m->delete_rec($p_id);
        $this->session->set_flashdata('msg','Page  Deleted.');
	redirect(base_url().'admin/Pages/list_pages/');
	}
	
	
	
	
	
	
	
	
}
?>