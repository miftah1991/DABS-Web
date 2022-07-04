<?php
Class Articles extends CI_Controller{
	
	
	function index(){
		
		
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('articles_m');
			$data['articles']=$this->articles_m->GetAll();

			//$data['oneField']=$this->articles_m->GetOneField();

			$this->load->model('reports_m');
			$data['rdictionary']=$this->reports_m->GetTenderDictionary();
			$this->load->view('header_v',$data);
			$this->load->view('articles_v',$data);
			$this->load->view('footer_v',$data);
	}
	
	function ArticleDetail($nid){
	
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('articles_m');
			$data['articledetail']=$this->articles_m->GetArticle($nid);
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('back');
			$this->load->view('header_v',$data);
			$this->load->view('article_detail_v',$data);
			$this->load->view('footer_v',$data);
	
	
	}
	
	
}
?>