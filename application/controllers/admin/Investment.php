<?php
Class Investment extends CI_Controller{
	
function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $tenders_per=$us->investments; }
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
			$this->form_validation->set_rules('name', 'Contract REFNo', 'required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('type', 'Contract REFNo', 'required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('language', 'Contract REFNo', 'required|trim|xss_clean|strip_tags');
			
			return $this->form_validation->run();
  	  }
	  
    function add(){
			$USERNAME=$this->session->userdata('USERNAME');
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
       		 $this->load->view('admin/investment_add',$data);
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
    function add_investment(){
        $check=$this->validate();
		if ($check == FALSE)
            {
		$this->add();
            }
	    else {
                $inputsArray=array(
		    		'name'=>$this->input->post('name'),
					'details'=>$this->input->post('t_detail'),
					'file'=>rtrim($this->input->post('project_report'),','),
					'type'=>$this->input->post('type'),	
					'language'=>$this->input->post('language'),					
					  );
					 
                $this->load->model('investment_m');
                $this->investment_m->AddInvestment($inputsArray);
				$investment=$this->input->post('name');
                $this->session->set_flashdata('msg',$investment.'Added');
                redirect(base_url().'admin/Investment/ListInvestment/');
            }
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
		//echo $this->input->post('t_detail');
		//exit;
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
                    'file'=>$this->input->post('project_report'),
                    't_detail'=>$this->input->post('t_detail'),
					'visible'=>$this->input->post('visible')
					  );
					  
					  //echo $this->input->post('t_detail');
					 // exit;
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