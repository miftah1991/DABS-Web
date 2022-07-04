<?php
Class Investments extends CI_Controller{
		
	function Investment(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('investment_m');
			$data['investments']=$this->investment_m->InvestmentIndex();
				
			//$data['tdictionary']=$this->investment_m->GetTenderDictionary();
			$data['type']="All";
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('investments_v',$data);
			$this->load->view('footer_v',$data);
	}
	function EnergyLaws(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('investment_m');
			$data['investments']=$this->investment_m->EnergyLaws();
				
			//$data['tdictionary']=$this->investment_m->GetTenderDictionary();
			$data['type']="Energy Laws";
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('investments_v',$data);
			$this->load->view('footer_v',$data);
	}
	function FactSheets(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('investment_m');
			$data['investments']=$this->investment_m->FactSheets();
				
			//$data['tdictionary']=$this->investment_m->GetTenderDictionary();
			$data['type']="Fact Sheets";
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('investments_v',$data);
			$this->load->view('footer_v',$data);
	}
	function Maps(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('investment_m');
			$data['investments']=$this->investment_m->Maps();
				
			//$data['tdictionary']=$this->investment_m->GetTenderDictionary();
			$data['type']="Maps";
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('investments_v',$data);
			$this->load->view('footer_v',$data);
	}
	
	function PPPLaws(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('investment_m');
			$data['investments']=$this->investment_m->PPPLaws();
				
			//$data['tdictionary']=$this->investment_m->GetTenderDictionary();
			$data['type']="PPP Law";
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('investments_v',$data);
			$this->load->view('footer_v',$data);
	}
	
	function Archive(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('investment_m');
			$data['investments']=$this->investment_m->Archive();
				
			//$data['tdictionary']=$this->investment_m->GetTenderDictionary();
			$data['type']="Archive";
			$this->load->model('dictionary_m');
			//$data['dic']=$this->dictionary_m->translate('archive,back');		
			$this->load->view('header_v',$data);
			$this->load->view('investments_v',$data);
			$this->load->view('footer_v',$data);
	
	}
	
}
?>