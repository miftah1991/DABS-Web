<?php
Class AdminHome extends CI_Controller{
		
		function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME))
			{
				redirect(base_url().'Login/');
			}
	}
	function index(){
		$USERNAME=$this->session->userdata('USERNAME');
		$this->load->model('login_m');
		$user_data['usrdata']=$this->login_m->ReadUserData($USERNAME);	
		$this->load->view('admin/admin_home_v',$user_data);	
			
			
		}
		

}
?>