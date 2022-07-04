<?php
Class Videos extends CI_Controller{
		function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $slideshow_per=$us->videos; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($slideshow_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
		function index(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('video_m');
				$data['videos']=$this->video_m->GetAll();	
				$this->load->view('admin/videos_v',$data);
		}
		
		
		function EditVideo($v_id){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('video_m');
				$data['videos']=$this->video_m->GetVideo($v_id);
				
				$this->load->view('admin/video_edit_v',$data);
		}
		function AddVideo(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				
				$this->load->view('admin/video_add_v',$data);			
		}
		
		function Delete($sid){
				$this->load->model('video_m');
        		$this->video_m->DeleteVideo($sid);
        		$this->session->set_flashdata('msg','Video has been  Deleted.');
				redirect(base_url().'admin/Videos/');
    }
		
		
		function validate(){
        $this->load->library('form_validation');
    	$this->form_validation->set_rules('v_title', 'Title', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('v_code', 'Code', 'required|trim|xss_clean|strip_tags');
        return $this->form_validation->run();
    	}
		
		
		
		
		
		
		function add_video(){
			
			$validate=$this->validate();
			
			if($validate == FALSE ){
				
				$this->AddVideo();
				
			}else{
			
			$inputsArray=array(
		    'v_title'=>$this->input->post('v_title'),
		    'v_code'=>$this->input->post('v_code')		  
		    );
			$this->load->model('video_m');
			$this->video_m->AddVideo($inputsArray);	
			$this->session->set_flashdata('msg','Video Uploaded Successfully');
        	redirect(base_url().'admin/Videos/');
			}
			
		}
		
		function update_video(){
				$validate=$this->validate();
				if($validate == FALSE ){
				$this->EditVideo($this->input->post('v_id'));
				
			}else{
			$v_id=$this->input->post('v_id');
			$inputsArray=array(
		    'v_title'=>$this->input->post('v_title'),
		    'v_code'=>$this->input->post('v_code')		  
		    );
			$this->load->model('video_m');
			$this->video_m->UpdateVideo($v_id,$inputsArray);	
			$this->session->set_flashdata('msg','VIDEO Details Updated Successfully');
        	redirect(base_url().'admin/Videos/');
			}
		}
}
?>