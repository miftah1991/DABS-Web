<?php
Class Media extends CI_Controller{
		
		function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $media_per=$us->media; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($media_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
		function index(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('media_m');
				$data['file']=$this->media_m->GetAll();	
				$this->load->view('admin/media_v',$data);
		}
		
		
		function EditMedia($file_id){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('media_m');
				$data['file']=$this->media_m->GetMedia($file_id);
				$this->load->view('admin/media_edit_v',$data);
		}
		function AddMedia(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->view('admin/media_add_v',$data);			
		}
		
		function Delete($file_id){
				$this->load->model('media_m');
        		$this->media_m->DeleteMedia($file_id);
        		$this->session->set_flashdata('msg','Media File  Deleted.');
				redirect(base_url().'admin/Media/');
    }
		
		
		function validate(){
        $this->load->library('form_validation');
    	$this->form_validation->set_rules('title', 'File Title', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('date', 'DATE','required|trim|xss_clean|strip_tags');
        return $this->form_validation->run();
    	}
		
		
		function do_upload()
        {
                $config['upload_path']          = './uploads/media';
                $config['allowed_types']        = 'jpg|png|gif|jpeg|pdf|doc|docx|xls|xlsx';
				$config['encrypt_name'] = true;
				
                //$config['max_size']             = 100;
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
		
		
		
		
		function add_media(){
			$upload_status=$this->do_upload();
			$validate=$this->validate();
			$error = array('error' => $this->upload->display_errors());
			$data=$this->upload->data();
			$file_name=$data['file_name'];
			if(!$upload_status || $validate == FALSE ){
				$this->load->view('admin/media_add_v',$error);
				
			}else{
			
			$inputsArray=array(
		    'title'=>$this->input->post('title'),
		    'file'=>$file_name,
		    'date'=>$this->input->post('date'),
		    'type'=>$this->input->post('type'),
		    'url'=>base_url().'uploads/media/'.$file_name
		    );
			$this->load->model('media_m');
			$this->media_m->AddMedia($inputsArray);	
			$this->session->set_flashdata('msg','File Uploaded Successfully');
        	redirect(base_url().'admin/Media/');
			}
			
		}
		
		function update_media(){
				$validate=$this->validate();
				if($validate == FALSE ){
				$this->EditMedia($this->input->post('file_id'));
				
			}else{
			$file_id=$this->input->post('file_id');
			$inputsArray=array(
		    'title'=>$this->input->post('title'),
		    'date'=>$this->input->post('date'),
		    'type'=>$this->input->post('type')		    
		    );
			$this->load->model('media_m');
			$this->media_m->UpdateMedia($file_id,$inputsArray);	
			$this->session->set_flashdata('msg','File /Media Details Updated Successfully');
        	redirect(base_url().'admin/Media/');
			}
		}
}
?>