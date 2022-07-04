<?php
class Questions extends CI_Controller{
	
	/*	function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			
			$this->load->library('auth');
			
			$this->load->model('Users_Model');
			
			header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1 
    		header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1 
			header ("Pragma: no-cache");
			
			$this->load->model("Site_Model");
			$language_id = $this->session->userdata('languageid');
			if(!isset($language_id) || $language_id=="")
			{
				$this->Site_Model->index();
			}
			$data['lng'] = $this->Site_Model->language_info($this->session->userdata('languageid'));
		}
	*/	
	function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $menu_per=$us->menu; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($menu_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
	public function list_questions($id=0)
	{
		
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
		
			
			
		$this->load->model("Questions_Model");
		$data['records'] = $this->Questions_Model->get_records($id);
		
		 $this->load->model('lang_m');
		$data['languages'] = $this->lang_m->GetAll();
		
		$this->load->view("admin/questions_list",$data);
	}
	
	public function add_question()
	{
			
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);	
		$this->load->model('lang_m');
		$data['languages'] = $this->lang_m->GetAll();
			
		$this->load->view("admin/questions_form",$data);
	}
	
	public function save_questions()
	{
		
			
		$return = $this->check_validation();
		if($return==false)
		{
			
			$this->add_question();
			//$ref = $this->input->server('HTTP_REFERER', TRUE);
			//redirect("questions/add_question", 'location'); 
		}
		else
		{		
			$data = array( 'question'=> $this->input->post('question'), 'language_id'=>$this->input->post('language_id'));
			
			$this->load->model("Questions_Model");
			$qId = $this->Questions_Model->add_record($data);
			$tot = $this->input->post("hf");
			
			$this->load->model("Options_Model");
			for($i=1; $i<=$tot;$i++)
			{
				$data = array(
						'option' => $this->input->post("option".$i),
						'question_id' => $qId,
					);
				$this->Options_Model->add_record($data);
			}
			
			$this->session->set_flashdata("msg","New vote created.");
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect(base_url()."admin/questions/list_questions/added",'refresh'); 
		}		
	}
	
	function check_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('question','Question','trim|required');
		$this->form_validation->set_rules('option1','Option 1','trim|required');
		$this->form_validation->set_rules('option2','Option 2','trim|required');
		return $this->form_validation->run();
	}
	
	function remove_question($id)
	{
			
			
			
			$this->db->where("question_id",$id);
			$this->db->delete("tbl_questions");
			
			$this->session->set_flashdata("msg","Vote have been removed.");
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref."/removed",'refresh'); 
	}
}