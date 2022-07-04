<?php
Class Tenders extends CI_Controller{
		
	function show()
	{

			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
	
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('tenders_m');
			$data['tender']=$this->tenders_m->GetAll();
		
			$data['tdictionary']=$this->tenders_m->GetTenderDictionary();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('tenders_v',$data);
			$this->load->view('footer_v',$data);
	}
	
		function con_aw(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('tenders_m');
			$data['tender']=$this->tenders_m->GetAward();
				
			$data['tdictionary']=$this->tenders_m->GetTenderDictionary();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('tenders_v',$data);
			$this->load->view('footer_v',$data);
	}
	
      	function search_tender(){
			$search = trim($this->input->post('search'));
			if($search){
				
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('tenders_m');
			$data['tender']=$this->tenders_m->GetSearch($search);
				
			$data['tdictionary']=$this->tenders_m->GetTenderDictionary();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('tenders_v',$data);
			$this->load->view('footer_v',$data);
			
		}
	}
	
	function TenderDetail($tid){
	
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('tenders_m');
			$data['tender']=$this->tenders_m->GetTender($tid);	
			$data['tdictionary']=$this->tenders_m->GetTenderDictionary();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('back,tender');
			
			$this->load->view('header_v',$data);
			$this->load->view('tenders_detail_v',$data);
			$this->load->view('footer_v',$data);	
	
	}
	
	function Archive(){
	
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('tenders_m');
			$data['tender']=$this->tenders_m->GetExTenders();	
			$data['tdictionary']=$this->tenders_m->GetTenderDictionary();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('back');		
			$this->load->view('header_v',$data);
			$this->load->view('tenders_v',$data);
			$this->load->view('footer_v',$data);	
	
	}
	
}
?>