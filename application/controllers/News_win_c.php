<?php
Class News_win_c extends CI_Controller{
	/*function __construct()
	{
			// Call the Model constructor
			parent::__construct();
		
			$this->load->library('session');
			$this->load->model("Site_Model");
			$language_id = $this->session->userdata('languageid');
			if(!isset($language_id) || $language_id=="")
			{
				$this->Site_Model->index();
			}
	}
	*/
	function index(){
		$this->load->model('home_m');
		$data['messages']=$this->home_m->GetMessages();
		$this->load->view('messages_win',$data);
		
	}
	function messages(){
		$this->load->model('home_m');
		$data['messages']=$this->home_m->GetMessages();
		$this->load->view('messages_win',$data);
		
	}
	function news(){
		$this->load->model('home_m');
		$data['news']=$this->home_m->getCNews();
		$this->load->view('news_win',$data);
		
	}

	
	

}
?>