<?php
Class Page extends CI_Controller{
	
	
	function pdetail($page){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('page_m');
			$dat['content']=$this->page_m->GetPageDetail($page);
			$this->load->view('header_v',$data);
			$this->load->view('page_v',$dat);
			$this->load->view('footer_v',$data);
	}
	
	
	
	
	
	
	
	
	
}
?>