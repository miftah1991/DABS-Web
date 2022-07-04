<?php
Class Search extends CI_Controller{
	
	
	function index(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model("Dictionary_m");
			$data['dictionary']=$this->Dictionary_m->translate('search,wlcom_msg,company_profile');
			
			$this->load->model('search_m');
			$data['page']=$this->search_m->GetPage($this->security->xss_clean($this->input->get('srch-box')));
			$data['news']=$this->search_m->GetNews($this->security->xss_clean($this->input->get('srch-box')));
			//$data['news']=$this->search_m->GetPage($this->input->get('srch-box'));
			//$data['tenders']=$this->search_m->GetPage($this->input->get('srch-box'));
			
			$this->load->view('header_v',$data);
			$this->load->view('search_v',$data);
			$this->load->view('footer_v',$data);
	}
	
	
	
	
}
?>