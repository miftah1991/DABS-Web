<?php
Class Slides extends CI_Controller{
		function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $slideshow_per=$us->slideshow; }
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
				$this->load->model('slide_m');
				$data['sld']=$this->slide_m->GetAll();	
				$this->load->view('admin/slide_v',$data);
		}
		
		
		function EditSlide($sid){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('slide_m');
				$data['sld']=$this->slide_m->GetSlide($sid);
				$this->load->model('lang_m');
				$data['lng']=$this->lang_m->GetAll();
				$this->load->view('admin/slide_edit_v',$data);
		}
		function AddSlide(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('lang_m');
				$data['lng']=$this->lang_m->GetAll();
				$this->load->view('admin/slide_add_v',$data);			
		}
		
		function Delete($sid){
				$this->load->model('slide_m');
        		$this->slide_m->DeleteSlide($sid);
        		$this->session->set_flashdata('msg','SlideShow Item  Deleted.');
				redirect(base_url().'admin/Slides/');
    }
		
		
		function validate(){
        $this->load->library('form_validation');
    	$this->form_validation->set_rules('text', 'TEXT', 'required|trim|xss_clean|strip_tags');
        return $this->form_validation->run();
    	}
		
		
		 public function do_upload()
        {
                $config['upload_path']          = './uploads/slides';
                $config['allowed_types']        = 'jpg|png';
				$config['encrypt_name'] = true;
                $this->load->library('upload', $config);
				return $this->upload->do_upload();
                
				
		}
		
		
		
		
		function add_slide(){
			$upload_status=$this->do_upload();
			$validate=$this->validate();
			$data['error'] = array('error' => $this->upload->display_errors());
			$data=$this->upload->data();
			$file_name=$data['file_name'];
			if(!$upload_status || $validate == FALSE ){
				$this->load->model('lang_m');
				$data['lng']=$this->lang_m->GetAll();
				$this->load->view('admin/slide_add_v',$data);
				
			}else{
			
			$inputsArray=array(
		    'text'=>$this->input->post('text'),
		    'image'=>$file_name,
		    'language_id'=>$this->input->post('language_id')		  
		    );
			$this->load->model('slide_m');
			$this->slide_m->AddSlide($inputsArray);	
			$this->session->set_flashdata('msg','SlideShow Item Uploaded Successfully');
        	redirect(base_url().'admin/Slides/');
			}
			
		}
		
		function update_slide(){
				$validate=$this->validate();
				if($validate == FALSE ){
				$this->EditSlide($this->input->post('sid'));
				
			}else{
			$sid=$this->input->post('sid');
			$inputsArray=array(
		    'text'=>$this->input->post('text'),
		    'language_id'=>$this->input->post('language_id')		  
		    );
			$this->load->model('slide_m');
			$this->slide_m->UpdateSlide($sid,$inputsArray);	
			$this->session->set_flashdata('msg','SlideShow Details Updated Successfully');
        	redirect(base_url().'admin/Slides/');
			}
		}
}
?>