<?php
Class Video extends CI_Controller{
	
	function index(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('videos_m');
			
			$data['vds']=$this->videos_m->GetAll();
			
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('videos,wlcom_msg,company_profile,subcribe');	
					
			$this->load->view('header_v',$data);
			$this->load->view('videos_v',$data);
			$this->load->view('footer_v',$data);
	}
	
	function Detail($v_id){
		
		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('videos_m');
			
			$data['vds']=$this->videos_m->GetVideo($v_id);
			
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('videos');	
					
			$this->load->view('header_v',$data);
			$this->load->view('video_detail_v',$data);
			$this->load->view('footer_v',$data);
		
	}
	

	

}
?>