<?php
Class Reports extends CI_Controller{
	
	
	function index(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('reports_m');
			$data['reports']=$this->reports_m->GetAll();	
			$data['rdictionary']=$this->reports_m->GetTenderDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('reports_v',$data);
			$this->load->view('footer_v',$data);
	}
	
	function ReportDetail($rid){
	
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('reports_m');
			$data['reports']=$this->reports_m->GetReport($rid);	
			$data['rdictionary']=$this->reports_m->GetTenderDictionary();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('back');
			
			$this->load->view('header_v',$data);
			$this->load->view('reports_detail_v',$data);
			$this->load->view('footer_v',$data);	
	
	}
	function FinancialReports(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('reports_m');
			$data['reports']=$this->reports_m->GetFinancialReports();	
			$data['rdictionary']=$this->reports_m->GetTenderDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('reports_v',$data);
			$this->load->view('footer_v',$data);
	}
	function FunctionalReports(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('reports_m');
			$data['reports']=$this->reports_m->GetFunctionalReports();	
			$data['rdictionary']=$this->reports_m->GetTenderDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('reports_v',$data);
			$this->load->view('footer_v',$data);
	}
	function ESMFReports(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('reports_m');
			$data['reports']=$this->reports_m->GetESMFReports();	
			$data['rdictionary']=$this->reports_m->GetTenderDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('reports_v',$data);
			$this->load->view('footer_v',$data);
	}
	 	function casa1000(){
			//echo "est";
			//exit;
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('reports_m');
			$data['reports']=$this->reports_m->casa1000();	
			$data['rdictionary']=$this->reports_m->GetTenderDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('reports_v',$data);
			$this->load->view('footer_v',$data);
	} 
	
}
?>