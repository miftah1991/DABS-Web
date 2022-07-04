<?php
Class Magzine extends CI_Controller{
	
	function OnlineMagzine(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$data['dir'] = 1;
			$this->load->model('magzines_m');
		
			$data['mgz']=$this->magzines_m->GetOnlineMagzine();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive');	
			$data['rdictionary']=$this->magzines_m->GetTenderDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('magzines_v',$data);
			$this->load->view('footer_v',$data);
			
	}
	function PrintMagzine(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$data['dir'] = 0;
			$this->load->model('magzines_m');

			$data['mgz']=$this->magzines_m->GetPrintMagzine();	
			$data['rdictionary']=$this->magzines_m->GetTenderDictionary();	
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive');		
			$this->load->view('header_v',$data);
			$this->load->view('magzines_v',$data);
			$this->load->view('footer_v',$data);
	}
	
	function MagzineArchive(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('magzines_m');
			$data['mgz']=$this->magzines_m->GetMagzineArchive();	
			$data['rdictionary']=$this->magzines_m->GetTenderDictionary();	
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('back');		
			$this->load->view('header_v',$data);
			$this->load->view('magzines_v',$data);
			$this->load->view('footer_v',$data);
	}
	
   function PRINTMagzineArchive(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('magzines_m');
			$data['mgz']=$this->magzines_m->GetPRINSTMGArchive();	
			$data['rdictionary']=$this->magzines_m->GetTenderDictionary();	
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('back');		
			$this->load->view('header_v',$data);
			$this->load->view('magzines_v',$data);
			$this->load->view('footer_v',$data);
	}
	

}
?>