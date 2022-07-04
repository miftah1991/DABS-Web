<?php
Class Job extends CI_Controller{
    
    function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $jobs_per=$us->jobs; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($jobs_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
    function list_jobs(){
	$USERNAME=$this->session->userdata('USERNAME');
	$rows['usrper']=$this->login_m->ReadUserData($USERNAME);
	$this->load->model('job_m');
	$rows['jobs']=$this->job_m->GetJobs();
	$this->load->view('admin/jobs_list_v',$rows);
    }
    function validate(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('vacancy_num', 'Vacancy Number', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('position_title', 'Position Title','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('number_position', 'Number Position','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('functional_area', 'Functional Area','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('province', 'Province','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('publish_date', 'Publish Date','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('expire_date', 'Expire Date','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('contract_type', 'Contract Type','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('work_type', 'Work Type','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('probition_period', 'Probition Period','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('duration', 'Duration','trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('nationality', 'Nationality','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('gender', 'Gender','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('salary', 'Salary','trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('salry_negotiable', 'Salary Negotiable','trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('experience', 'Experience','trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('education', 'Education','trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('education_field', 'Education Field','required|trim');        
        $this->form_validation->set_rules('skills_required', 'Skills Required','required|trim');
        $this->form_validation->set_rules('language_required', 'Language Required','required|trim|xss_clean|strip_tags');
        $this->form_validation->set_rules('duties', 'Duties','required|trim');
        $this->form_validation->set_rules('qualification', 'qualification','required|trim');
      


                
        
        return $this->form_validation->run();
    }
    function AddJobForm(){
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
        $this->load->view('admin/jobs_add_v',$data);
    }
    function add_job(){
        $check=$this->validate();
	if ($check == FALSE)
            {
	$this->AddJobForm();
            }
	    else {
                $inputsArray=array(
		    'vacancy_num'=>$this->input->post('vacancy_num'),
		    'position_title'=>$this->input->post('position_title'),
			'job_type'=>$this->input->post('job_type'),
		    'number_position'=>$this->input->post('number_position'),
		    'functional_area'=>$this->input->post('functional_area'),
                    'province'=>$this->input->post('province'),
                    'travel_province'=>$this->input->post('travel_province'),
                    'publish_date'=>$this->input->post('publish_date'),
                    'expire_date'=>$this->input->post('expire_date'),
                    'contract_type'=>$this->input->post('contract_type'),
                    'work_type'=>$this->input->post('work_type'),
                    'probition_period'=>$this->input->post('probition_period'),
                    'duration'=>$this->input->post('duration'),
                    'nationality'=>$this->input->post('nationality'),
                    'gender'=>$this->input->post('gender'),
                    'salary'=>$this->input->post('salary'),
                    'salry_negotiable'=>$this->input->post('salry_negotiable'),
                    'experience'=>$this->input->post('experience'),
                    'education'=>$this->input->post('education'),
                    'education_field'=>$this->input->post('education_field'),
                    'skills_required'=>$this->input->post('skills_required'),
                    'language_required'=>$this->input->post('language_required'),
                    'duties'=>$this->input->post('duties'),
                    'qualification'=>$this->input->post('qualification')                 
		    );
                $this->load->model('job_m');
                $this->job_m->AddJob($inputsArray);
                $this->session->set_flashdata('msg','JOB Added');
                redirect(base_url().'admin/job/list_jobs/');
            }
    }
	function Delete($jid){
				$this->load->model('job_m');
                $this->job_m->DeleteJob($jid);
                $this->session->set_flashdata('msg','JOB Deleted Successfully');
                redirect(base_url().'admin/job/list_jobs/');
		
	}
    function Edit($jid){
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
        $this->load->model('job_m');
        $data['job']=$this->job_m->GetJob($jid);
        $this->load->view('admin/jobs_edit_v',$data);
    }
    function edit_job(){
        $check=$this->validate();
	if ($check == FALSE)
            {
	$this->Edit($this->input->post('jid'));
            }
	    else {
                $inputsArray=array(
		    'vacancy_num'=>$this->input->post('vacancy_num'),
		    'position_title'=>$this->input->post('position_title'),
			'job_type'=>$this->input->post('job_type'),
		    'number_position'=>$this->input->post('number_position'),
		    'functional_area'=>$this->input->post('functional_area'),
                    'province'=>$this->input->post('province'),
                    'travel_province'=>$this->input->post('travel_province'),
                    'publish_date'=>$this->input->post('publish_date'),
                    'expire_date'=>$this->input->post('expire_date'),
                    'contract_type'=>$this->input->post('contract_type'),
                    'work_type'=>$this->input->post('work_type'),
                    'probition_period'=>$this->input->post('probition_period'),
                    'duration'=>$this->input->post('duration'),
                    'nationality'=>$this->input->post('nationality'),
                    'gender'=>$this->input->post('gender'),
                    'salary'=>$this->input->post('salary'),
                    'salry_negotiable'=>$this->input->post('salry_negotiable'),
                    'experience'=>$this->input->post('experience'),
                    'education'=>$this->input->post('education'),
                    'education_field'=>$this->input->post('education_field'),
                    'skills_required'=>$this->input->post('skills_required'),
                    'language_required'=>$this->input->post('language_required'),
                    'duties'=>$this->input->post('duties'),
                    'qualification'=>$this->input->post('qualification')                 
		    );
            $jid=$this->input->post('jid');
            $this->load->model('job_m');
        $this->job_m->UpdateJob($jid,$inputsArray);
		$this->session->set_flashdata('msg','JOB Updated');
         redirect(base_url().'admin/job/list_jobs/');            
        
    }
    }
    
    
    function SendtoSubscrib($tid){
			
			$this->load->model('subscribe_m');
			$sub=$this->subscribe_m->GetJobs();
			$to='';
			foreach($sub as $s){
				
			$to.=$s->cemail.",";
				
			}
			$to=rtrim($to,',');
			$this->load->model('job_m');
			$nws=$this->job_m->GetJob($tid);
			foreach($nws as $n){
			$config = array (
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'priority' => '1'
					);
		$message = "Greetings Mr,<br/><br/>";	
		$message .= "<h2>".$n->position_title."</h2>";
		$message .= "<h2>Expire Date:".$n->expire_date."</h2>";
		//$message .= "<img src='".base_url()."uploads/news/".$n->image."'>";
		$message .= "<p>Vacancy Number".$n->vacancy_num."</p>";
		$message .= "<p>LOCATION".$n->province."</p>";
		$message .= "<p>Experience:".$n->experience."</p>";
		$message .= "<p>Education:".$n->education."</p>";
		$message .= "<p>Duties:".$n->duties."</p>";
		$message .= "<p>For More Detail Please VISIT OUR WEBSITE WWW.DABS.AF</p>";
		$this->load->library('email',$config);
		$this->email->to($to);				
		$this->email->from('info@dabs.af'); 				
		$this->email->subject("DABS");
		$this->email->message($message);		

		$this->email->send();		
		$this->session->set_flashdata('msg','Email has been sended to Subscribers');
        redirect(base_url().'admin/Job/list_jobs'); 
										
		
			}
		}
    
    
}
?>