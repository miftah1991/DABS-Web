<?php
Class Reports extends CI_Controller{
		function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $reports_per=$us->reports; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($reports_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
		function index(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('report_m');
				$data['rpts']=$this->report_m->GetAll();	
				$this->load->view('admin/reports_v',$data);
		}
		

	function do_upload(){
				$config = array();
				$config['upload_path']          = './uploads/reports';
				$config['allowed_types']        = 'jpg|png|pdf|doc|docx|xls|xlsx';
				$config['encrypt_name'] 		 =	 true;	
				
				$this->load->library('upload',$config);
				$files=$_FILES;
				$cpt=count($_FILES['userfile']['name']);
				for($i=0; $i<$cpt; $i++)
				{
					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
        			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
        			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
        			$_FILES['userfile']['size']= $files['userfile']['size'][$i]; 
        			//$this->upload->initialize($config);
        			$this->upload->do_upload();
					$data=$this->upload->data();
					echo $data['file_name'];
				}
	}
		function EditReport($rid){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('report_m');
				$data['rpt']=$this->report_m->GetReport($rid);
				$this->load->view('admin/reports_edit_v',$data);
			
			}
		
		function AddReport(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->view('admin/reports_add_v',$data);			
		}
		
		function Delete($rid){
				$this->load->model('report_m');
        		$this->report_m->DeleteReport($rid);
        		$this->session->set_flashdata('msg','REPORT  Deleted.');
				redirect(base_url().'admin/Reports/');
    }
		
		
		function validate(){
        $this->load->library('form_validation');
    	$this->form_validation->set_rules('rtitle', 'Report Title', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('type', ' Report Type', 'required|trim|xss_clean|strip_tags');
    	$this->form_validation->set_rules('rpublish_date', 'Report Publish Date', 'required|trim|xss_clean|strip_tags');
		//$this->form_validation->set_rules('rtext', 'Report Deatil','');
		
        return $this->form_validation->run();
    	}
		
		
		 /*public function do_upload()
        {
                $config['upload_path']          = './uploads/reports';
                $config['allowed_types']        = 'jpg|png|pdf|doc|docx|xls|xlsx';
				$config['encrypt_name'] = true;
                 $this->load->library('upload', $config);
				return $this->upload->do_upload();				
		}*/
		
		
		
		
		function add_report(){
			//$upload_status=$this->do_upload();
			$validate=$this->validate();
			//$error = array('error' => $this->upload->display_errors());
			//$data=$this->upload->data();
			//$file_name=$data['file_name'];
			if($validate == FALSE ){
				$this->load->view('admin/reports_add_v',$error);
				
			}else{
			
				$files=$_FILES['files'];
				$config = array(
					'upload_path'   => './uploads/reports',
					//'encrypt_name' => true,
					'allowed_types' => 'jpg|png|pdf|doc|docx|xls|xlsx',
					'overwrite'     => 1,                       
				);
				$this->load->library('upload', $config);
				$images = array();
				foreach ($files['name'] as $key => $image) {
					$_FILES['images[]']['name']= $files['name'][$key];
					$_FILES['images[]']['type']= $files['type'][$key];
					$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
					$_FILES['images[]']['error']= $files['error'][$key];
					$_FILES['images[]']['size']= $files['size'][$key];
		
					$fileName =  $image;
		
					$images[] = $fileName;
		
					$config['file_name'] = $fileName;
		
					$this->upload->initialize($config);
		
					if ($this->upload->do_upload('images[]')) {
						$this->upload->data();
					} else {
						return false;
					}
				}
				$attachment =  implode($images,',');

				//echo $attachment;
				//exit;
			$inputsArray=array(
		    'rtitle'=>$this->input->post('rtitle'),
		    'rfile'=>$attachment,
			'type'=>$this->input->post('type'),
		    'rpublish_date'=>$this->input->post('rpublish_date'),
			'rtext'=>$this->input->post('rtext')
		    );
			$this->load->model('report_m');
			$this->report_m->AddReport($inputsArray);	
			$this->session->set_flashdata('msg','Report Uploaded Successfully');
        	redirect(base_url().'admin/Reports/');
			}
			
		}
		
		function update_report(){
				$validate=$this->validate();
				if($validate == FALSE ){
				$this->EditReport($this->input->post('rid'));
				
			}else{
			$rid=$this->input->post('rid');
			$inputsArray=array(
		    'rtitle'=>$this->input->post('rtitle'),
		    'rfile'=>rtrim($this->input->post('project_report'),','),
			'type'=>$this->input->post('type'),
		    'rpublish_date'=>$this->input->post('rpublish_date'),
			'rtext'=>$this->input->post('rtext')
		    );
			$this->load->model('report_m');
			$this->report_m->UpdateReport($rid,$inputsArray);	
			$this->session->set_flashdata('msg','Report Updated Successfully');
        	redirect(base_url().'admin/Reports/');
			
			}
		}
}
?>