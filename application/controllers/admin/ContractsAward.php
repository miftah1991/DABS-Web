<?php
Class ContractsAward extends CI_Controller{
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
    
    function ListContractsAward(){
					$USERNAME=$this->session->userdata('USERNAME');
					$rows['usrper']=$this->login_m->ReadUserData($USERNAME);
					$this->load->model('contracts_award_m');
					$rows['awards']=$this->contracts_award_m->GetContractsAward();
					$this->load->view('admin/contracts_award_list_v',$rows);
    	
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
			$this->form_validation->set_rules('contract_number', 'CONTRACT NUMBER', 'required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('description', 'DISCRIPTION','required');
			$this->form_validation->set_rules('publish_date', 'PUBLISH DATE','required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('awarded_to', 'AWARDED TO','required|trim|xss_clean|strip_tags');  
			return $this->form_validation->run();
  	  }
	  
    function AddContractsAward(){
			$USERNAME=$this->session->userdata('USERNAME');
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
       		 $this->load->view('admin/contracts_award_add_v',$data);
    }
	private function set_upload_options(){
				$config = array();
				$config['upload_path']          = './uploads/awards';
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
    function ProcessContractsAward(){
		
    $check=$this->validate();
	if ($check == FALSE)
            {
	$this->AddContractsAward();
            }
	    else {

			
			$files=$_FILES['files'];
			$config = array(
				'upload_path'   => './uploads/awards',
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
			$attachment =  implode($images,',');

                $inputsArray=array(
		    		'contract_number'=>$this->input->post('contract_number'),
					'description'=>$this->input->post('description'),
					'publish_date'=>$this->input->post('publish_date'),
					'awarded_to'=>$this->input->post('awarded_to'),
					'award_details'=>$this->input->post('contracts_award_details'),
                    'file'=>$attachment,                   
					  );
                $this->load->model('contracts_award_m');
                $this->contracts_award_m->AddContractsAward($inputsArray);
				$contracts_award=$this->input->post('contract_number');
                $this->session->set_flashdata('msg',$contracts_award.'Added');
                redirect(base_url().'admin/ContractsAward/ListContractsAward/');
            }
    }
	function Delete($tid){
				$this->load->model('contracts_award_m');
                $this->contracts_award_m->DeleteContractAward($tid);
                $this->session->set_flashdata('msg','Award Deleted Successfully');
                redirect(base_url().'admin/ContractsAward/ListContractsAward/');
		
	}
    function Edit($id){
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
        $this->load->model('contracts_award_m');
        $data['award']=$this->contracts_award_m->GetAward($id);
        $this->load->view('admin/contracts_award_edit_v',$data);
    }
    function updateAward(){
		
		if($_FILES['files'] == null){

			$filedata=$this->input->post('oldfile');                  
		}
		else{
			
			$files=$_FILES['files'];
			
			$config = array(
				'upload_path'   => './uploads/awards',
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
	$this->Edit($this->input->post('cid'));
            }
	    else {

			
			
                $inputsArray=array(
		    		'contract_number'=>$this->input->post('contract_number'),
					'description'=>$this->input->post('description'),
					'publish_date'=>$this->input->post('publish_date'),
					'awarded_to'=>$this->input->post('awarded_to'),
					'award_details'=>$this->input->post('award_details'),
					'file' =>$filedata,
					);
					  
					  
            $id=$this->input->post('cid');
			$award=$this->input->post('contract_number');
            $this->load->model('contracts_award_m');
        $this->contracts_award_m->Update($id,$inputsArray);
		$this->session->set_flashdata('msg',$award.'Tender Updated');
         redirect(base_url().'admin/ContractsAward/ListContractsAward/');            
        
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