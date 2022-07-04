<?php
Class Magzine extends CI_Controller{
    function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $magzine_per=$us->magzine; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($magzine_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
    function index(){
        $this->load->model('Magzine_m');
		$dat['mgz']=$this->Magzine_m->GetAll();
  		//$this->load->database();
        //$sql = $this->db->query('Select * from tbl_magzine order by mg_id desc');
		//$dat['mgz']=$sql->result_array();
		
		$USERNAME=$this->session->userdata('USERNAME');
		$dat['usrper']=$this->login_m->ReadUserData($USERNAME);
        $this->load->view('admin/magzine_v',$dat);
    }
    function AddMagzine(){
        $this->load->model('lang_m');
        $data['lng']=$this->lang_m->GetAll();
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
        $this->load->view('admin/magzine_add_v',$data);
    }
    function validate(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mg_title', 'Magzine Title', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('mg_publish_date', 'Publish Date','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('mg_url', 'Magzine URL','required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('mg_pic', 'Magzine Image URL','required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('mg_type', 'Magzine Type','required|trim|xss_clean|strip_tags');
		return $this->form_validation->run();
    }
   
function create_magzine(){
	/*$check=$this->validate();
	if ($check == FALSE)
            {
	$this->MagzineAdd();
            }
	    else { */
			
	$inputsArray=array(
		    'mg_title'=>$this->input->post('mg_title'),
		    'mg_publish_date'=>$this->input->post('mg_publish_date'),
		    'mg_url'=>$this->input->post('mg_url'),
			'mg_pic'=>$this->input->post('mg_pic'),
		    'mg_type'=>$this->input->post('mg_type')
		    );
	   	$this->load->model('Magzine_m');    	
        $this->Magzine_m->AddMagzine($inputsArray);
        $this->session->set_flashdata('msg','Magzine Added');
        redirect(base_url().'admin/Magzine/AddMagzine');
	   // }
    }
	
    function update_form($mg_id){
	$this->load->model('lang_m');
    $data['lng']=$this->lang_m->GetAll();
	$this->load->model('Magzine_m');
	$data['mgz']=$this->Magzine_m->GetMagzine($mg_id);
	$USERNAME=$this->session->userdata('USERNAME');
	$data['usrper']=$this->login_m->ReadUserData($USERNAME);
        $this->load->view('admin/magzine_edit_v',$data);
    }
    function update_magzine(){
	
	$check=$this->validate();
	if ($check == FALSE)
            {
	    $this->update_form($this->input->post('mg_id'));
            }
	    else {
	$mg_id=$this->input->post('mg_id');
	$inputsArray=array(
		    'mg_title'=>$this->input->post('mg_title'),
		    'mg_publish_date'=>$this->input->post('mg_publish_date'),
		    'mg_url'=>$this->input->post('mg_url'),
		    'mg_type'=>$this->input->post('mg_type'),
			'mg_pic'=>$this->input->post('mg_pic')
		    );
	$this->load->model('Magzine_m');
	$this->Magzine_m->UpdateMagzine($mg_id,$inputsArray);
	$this->session->set_flashdata('msg','Magzine Detail has been Updated.');
	redirect(base_url().'admin/Magzine/');
	
		}	
    }
    function Delete($mg_id){
	$this->load->model('Magzine_m');
        $this->Magzine_m->DeleteMagzine($mg_id);
        $this->session->set_flashdata('msg','Magzine  Deleted.');
	redirect(base_url().'admin/Magzine/');
    }
    
    
    
    
}
?>