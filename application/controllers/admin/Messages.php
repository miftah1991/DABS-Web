<?php
Class Messages extends CI_Controller{
		function __construct()
			{		
			parent::__construct();
			
            $this->load->database();
			
						
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $messages_per=$us->messages; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($messages_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
		function index(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('message_m');
				$data['msg']=$this->message_m->GetAll();
				
				
		
     
				$this->load->view('admin/message_v',$data);
		}
		
		
		function EditMessage($m_id){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('lang_m');
				$data['lng']=$this->lang_m->GetAll();
				$this->load->model('Message_m');
				$data['msg']=$this->Message_m->GetMessage($m_id);
				$this->load->view('admin/message_edit_v',$data);
		}
		function AddMessage(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('lang_m');
				$data['lng']=$this->lang_m->GetAll();
				$this->load->view('admin/message_add_v',$data);			
		}
		
		function Delete($m_id){
				$this->load->model('Message_m');
        		$this->Message_m->DeleteMessage($m_id);
        		$this->session->set_flashdata('msg','Message File  Deleted.');
				redirect(base_url().'admin/Messages/');
    }
		
		
		function validate(){
        $this->load->library('form_validation');
    	$this->form_validation->set_rules('m_title', 'Message Title', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('m_text', 'Message Text','required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('m_link', 'Message Link','trim|xss_clean|strip_tags');

        return $this->form_validation->run();
    	}
		
		
		 public function do_upload()
        {
                $config['upload_path']          = './uploads/messages';
                $config['allowed_types']        = 'jpg|png|pdf|doc|docx|xls|xlsx';
				$config['encrypt_name'] = true;
				
               // $config['max_size']             = 30;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                 $this->load->library('upload', $config);
				return $this->upload->do_upload();
                /*if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('media_managment_v',$error);	
				} 
				*/
				
		}
		
		
		
	
		function add_message(){
			$upload_status=$this->do_upload();
			$validate=$this->validate();
			$data['error'] = array('error' => $this->upload->display_errors());
			$data = $this->upload->data();
			$file_name = $data['file_name'];
			
			/*
			
		    if(!$upload_status || $validate == FALSE ){
				$this->load->model('lang_m');
				$data['lng']=$this->lang_m->GetAll();
				$this->load->view('admin/message_add_v',$data);
				
			}else{
			
			$inputsArray=array(
		    'm_title'=>$this->input->post('m_title'),
		    'm_image'=>$file_name,
		    'm_text'=>$this->input->post('m_text'),
		    'm_link'=>$this->input->post('m_link'),
		    'language_id'=>$this->input->post('language_id')
		    );
			$this->load->model('Message_m');
			$this->Message_m->AddMessage($inputsArray);	
			$this->session->set_flashdata('msg','Message Added Successfully');
        	redirect(base_url().'admin/Messages/');
			
			}
			*/
			
			$inputsArray=array(
		    'm_title'=>$this->input->post('m_title'),
		    'm_image'=>$file_name,
		    'm_text'=>$this->input->post('m_text'),
		    'm_link'=>$this->input->post('m_link'),
		    'language_id'=>$this->input->post('language_id')
		    );
			
			$this->load->model('Message_m');
		    $this->Message_m->AddMessagess($inputsArray);	
			
			$this->session->set_flashdata('msg','Message Added Successfully');
        	redirect(base_url().'admin/Messages/');
			
		}
		
		function update_message(){
				$validate=$this->validate();
				if($validate == FALSE ){
				$this->EditMessage($this->input->post('m_id'));
				
			}else{
			$m_id=$this->input->post('m_id');
			$inputsArray=array(
		    'm_title'=>$this->input->post('m_title'),
		    'm_text'=>$this->input->post('m_text'),
		    'm_link'=>$this->input->post('m_link'),
		    'language_id'=>$this->input->post('language_id')
		    );
			$this->load->model('Message_m');
			$this->Message_m->UpdateMessage($m_id,$inputsArray);	
			$this->session->set_flashdata('msg','Message Details Updated Successfully');
        	redirect(base_url().'admin/Messages/');
			}
		}
}
?>