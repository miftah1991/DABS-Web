<?php
Class Tender extends CI_Controller{
    function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $tenders_per=$us->tenders; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($tenders_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
    
    function ListTenders(){
					$USERNAME=$this->session->userdata('USERNAME');
					$rows['usrper']=$this->login_m->ReadUserData($USERNAME);
					$this->load->model('tender_m');
					$rows['tenders']=$this->tender_m->GetTenders();
					$this->load->view('admin/tender_list_v',$rows);
    	
		}
		
	 function SearchTenders(){
					
    	$search = trim($this->input->post('search')); 
		if($search){
			
					$USERNAME=$this->session->userdata('USERNAME');
					$rows['usrper']=$this->login_m->ReadUserData($USERNAME);
					$this->load->model('tender_m');
					$rows['tenders'] = $this->tender_m->SearchTenders($search);
					$this->load->view('admin/tender_list_v',$rows);
					
		}
		
	}
	
    function validate(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('t_specification_number', 'Contract REFNo', 'required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('t_title', 'Description','required');
			$this->form_validation->set_rules('t_category', 'Category','required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('location', 'Funded BY','required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('t_start_date', 'Publish Date','required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('t_end_date', 'Expire Date','required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('t_contact', 'Contact Person Name','trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('t_contact_phone', 'Contact Person Phone','required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('t_contact_email', 'Contact Person Email','required|trim|xss_clean|strip_tags');
			//$this->form_validation->set_rules('project_report', 'Files','trim|xss_clean');
			//$this->form_validation->set_rules('t_detail', 'DETAIL','trim');   
			return $this->form_validation->run();
  	  }
	  
    function AddTender(){
	
			$USERNAME=$this->session->userdata('USERNAME');
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
       		 $this->load->view('admin/tender_add_v1',$data);
    }
	private function set_upload_options(){
				$config = array();
				$config['upload_path']          = './uploads/tenders';
				$config['allowed_types']        = 'jpg|png|pdf|doc|docx|xls|xlsx';
				$config['encrypt_name'] 		 =	 true;	
				return $config;		
	}
	function do_upload(){
				
				$this->load->library('upload');
				$files=$_FILES;
				$cpt=count($_FILES['userfile']['name']);
				for($i=0; $i<$cpt; $i++)
				{
					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
        			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
        			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
        			$_FILES['userfile']['size']= $files['userfile']['size'][$i]; 
        			$this->upload->initialize($this->set_upload_options());
        			$this->upload->do_upload();
					$data=$this->upload->data();
					echo $data['file_name'];
				}
	}
    function add_tender(){
        $check=$this->validate();
	if ($check == FALSE)
            {
	$this->AddTender();
            }
	    else {

			
			$files=$_FILES['files'];
			$config = array(
				'upload_path'   => './uploads/tenders',
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


                $inputsArray=array(
		    		't_specification_number'=>$this->input->post('t_specification_number'),
					't_title'=>$this->input->post('t_title'),
					't_category'=>$this->input->post('t_category'),
					'location'=>$this->input->post('location'),
                    't_start_date'=>$this->input->post('t_start_date'),
                    't_end_date'=>$this->input->post('t_end_date'),
                    't_contact'=>$this->input->post('t_contact'),
                    't_contact_phone'=>$this->input->post('t_contact_phone'),
                    't_contact_email'=>$this->input->post('t_contact_email'),
                    'file'=>$attachment,
                    't_detail'=>$this->input->post('t_detail')
					  );
					  
					
					  
                $this->load->model('tender_m');
                $this->tender_m->AddTender($inputsArray);
				$tender=$this->input->post('t_specification_number');
                $this->session->set_flashdata('msg',$tender.'Added');

            }
			                redirect(base_url().'admin/tender/ListTenders/');
    }
	function Delete($tid){
				$this->load->model('tender_m');
                $this->tender_m->DeleteTender($tid);
                $this->session->set_flashdata('msg','Tender Deleted Successfully');
                redirect(base_url().'admin/tender/ListTenders/');
		
	}
    function Edit($tid){
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
        $this->load->model('tender_m');
        $data['tender']=$this->tender_m->GetTender($tid);
        $this->load->view('admin/tender_edit_v',$data);
    }
    function update_tender(){
				
		if($_FILES['files'] == null){

			$filedata=$this->input->post('oldfile');
			   
			$check=$this->validate();
			if ($check == FALSE)
					{
			$this->Edit($this->input->post('tid'));
					}
				else {
					
						$inputsArray=array(
							't_specification_number'=>$this->input->post('t_specification_number'),
							't_title'=>$this->input->post('t_title'),
							't_category'=>$this->input->post('t_category'),
							'location'=>$this->input->post('location'),
							't_start_date'=>$this->input->post('t_start_date'),
							't_end_date'=>$this->input->post('t_end_date'),
							't_contact'=>$this->input->post('t_contact'),
							't_contact_phone'=>$this->input->post('t_contact_phone'),
							't_contact_email'=>$this->input->post('t_contact_email'),
							   'file'=>$filedata,
							't_detail'=>$this->input->post('t_detail'),
							'visible'=>$this->input->post('visible')
							  );
							  
							  
					$tid=$this->input->post('tid');
					$tender=$this->input->post('t_specification_number');
					$this->load->model('tender_m');
				$this->tender_m->Update($tid,$inputsArray);
				$this->session->set_flashdata('msg',$tender.'Tender Updated');
				 redirect(base_url().'admin/tender/ListTenders/');            
				
			}               
		}
		else{
			
			$files=$_FILES['files'];
			
			$config = array(
				'upload_path'   => './uploads/tenders',
				//'encrypt_name' => true,
				'allowed_types' => 'jpg|png|pdf|doc|docx|xls|xlsx',
				'overwrite'     => 1,                       
			);
			$this->load->library('upload', $config);
			$images = array();
			foreach ($files['name'] as $key => $image) {
				$_FILES['images[]']['name']= time().$files['name'][$key];
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
			$filedata =  implode($images,',');

		}

        $check=$this->validate();
	if ($check == FALSE)
            {
	$this->Edit($this->input->post('tid'));
            }
	    else {
			
                $inputsArray=array(
		    		't_specification_number'=>$this->input->post('t_specification_number'),
					't_title'=>$this->input->post('t_title'),
					't_category'=>$this->input->post('t_category'),
					'location'=>$this->input->post('location'),
                    't_start_date'=>$this->input->post('t_start_date'),
                    't_end_date'=>$this->input->post('t_end_date'),
                    't_contact'=>$this->input->post('t_contact'),
                    't_contact_phone'=>$this->input->post('t_contact_phone'),
                    't_contact_email'=>$this->input->post('t_contact_email'),
                   	'file'=>$filedata,
                    't_detail'=>$this->input->post('t_detail'),
					'visible'=>$this->input->post('visible')
					  );
					  
					  
            $tid=$this->input->post('tid');
			$tender=$this->input->post('t_specification_number');
            $this->load->model('tender_m');
        $this->tender_m->Update($tid,$inputsArray);
		$this->session->set_flashdata('msg',$tender.'Tender Updated');
         redirect(base_url().'admin/tender/ListTenders/');            
        
    }
    }
    
    function SendtoSubscrib($tid){
			
			$this->load->model('subscribe_m');
			$sub=$this->subscribe_m->GetTenders();
			$to='';
			foreach($sub as $s){
				
			$to.=$s->cemail.",";
				
			}
			$to=rtrim($to,',');
			$this->load->model('tender_m');
			$nws=$this->tender_m->GetTender($tid);
			foreach($nws as $n){
			$config = array (
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'priority' => '1'
					);
		$message = "Greetings Mr,<br/><br/>";	
		$message .= "<h2>".$n->t_title."</h2>";
		$message .= "<h2>Expire Date:".$n->t_end_date."</h2>";
		//$message .= "<img src='".base_url()."uploads/news/".$n->image."'>";
		$message .= "<p>".$n->t_detail."</p>";
		
		$this->load->library('email',$config);
		$this->email->to($to);				
		$this->email->from('info@dabs.af'); 				
		$this->email->subject("DABS");
		$this->email->message($message);		

		$this->email->send();		
		$this->session->set_flashdata('msg','Email has been sended to Subscribers');
        redirect(base_url().'admin/Tender/ListTenders'); 
										
		
			}
		}
	
    
    
}
?>