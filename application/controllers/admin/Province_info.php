<?php
Class Province_info extends CI_Controller{
    function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $province_per=$us->province_info; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($province_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
    
    function ListProvinceInfo(){
					$USERNAME=$this->session->userdata('USERNAME');
					$rows['usrper']=$this->login_m->ReadUserData($USERNAME);
					$this->load->model('Province_info_m');
					$rows['Province_info']=$this->Province_info_m->GetProvince_info();
					$this->load->view('admin/province_info_list_v',$rows);
    	
		}
		
	 function SearchProvinceInfo(){
					
    	$search = trim($this->input->post('search')); 
		if($search){
			
					$USERNAME=$this->session->userdata('USERNAME');
					$rows['usrper']=$this->login_m->ReadUserData($USERNAME);
					$this->load->model('Province_info_m');
					$rows['Province_info'] = $this->Province_info_m->SearchProvinceInfo($search);
					$this->load->view('admin/province_info_list_v',$rows);
					
		}
		
	}
	function validate(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('province', 'Province','required|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('language', 'language','required|trim|xss_clean|strip_tags');			
			$this->form_validation->set_rules('t_start_date', 'Publish Date','required|trim|xss_clean|strip_tags');						
			//$this->form_validation->set_rules('project_report', 'Files','trim|xss_clean');  
			return $this->form_validation->run();
  	  }
	
	  
    function AddProvinceInfo(){
			$USERNAME=$this->session->userdata('USERNAME');
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
       		 $this->load->view('admin/province_info_add_v1',$data);
    }
	private function set_upload_options(){
				$config = array();
				$config['upload_path']          = './uploads/province_info';
				$config['allowed_types']        = 'jpg|png|pdf|doc|docx|xls|xlsx';
				$config['encrypt_name'] 		 =	 true;	
				return $config;		
	}

    function add_province_info(){

		$upload_status=$this->do_upload();
		$data=$this->upload->data();
		$check=$this->validate();

	
	if ($check == FALSE)
            {
	$this->AddProvinceInfo();
            }
	    else {

	
	    		$url=$this->input->post('province');
                $inputsArray=array(

					'province'=>$this->input->post('province'),
					'language_id'=>$this->input->post('language'),
					'url'=>$url,
                    'insert_date'=>$this->input->post('t_start_date'),    
                    'file'=>$data['file_name']              
				);
                $this->load->model('Province_info_m');
                $this->Province_info_m->AddProvinceInfo($inputsArray);
				$Province_info=$this->input->post('province');
                $this->session->set_flashdata('msg',$Province_info.' Added');
                redirect(base_url().'admin/Province_info/ListProvinceInfo/');
            }
    }
	function Delete($tid){
				$this->load->model('Province_info_m');
                $this->Province_info_m->DeleteProvince_info($tid);
                $this->session->set_flashdata('msg','Province_info Deleted Successfully');
                redirect(base_url().'admin/Province_info/ListProvinceInfo/');
		
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
				$up=$this->upload->do_upload();
				$data=$this->upload->data();
				if($up){
					echo $data['file_name'];
				}
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