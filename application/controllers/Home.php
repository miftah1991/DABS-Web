<?php
Class Home extends CI_Controller{
	/*function __construct()
	{
			// Call the Model constructor
			parent::__construct();
		//---------------------------------//
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
	$this->load->model("Site_Model");
	$language_id = $this->session->userdata('languageid');
	if(!isset($language_id) || $language_id==""){
	
	$languageid=$this->Site_Model->get_default_language();    	
	$this->session->set_userdata("languageid",$languageid);  }
	$data=$this->Site_Model->language_info();
	$alignment=$data->alignment;
		
	if($alignment=='rtl')
	{
	
			$this->rtlindex();	
			
		}
		else{
			$this->ltrindex();
		}
	}
	function rtlindex(){
		
		
		
			$this->load->model('home_m');
			$data['dictionary']=$this->home_m->GetDictionary();
			$data['langs']=$this->home_m->GetLang();
			$data['mrow']=$this->home_m->show_menu();
			$data['slides']=$this->home_m->GetSlideImages();
			$latest_news=$this->home_m->GetNews1();
			foreach($latest_news as $l){ $latest_news_id=$l->nid; }
			$data['news1']=$latest_news;
	
			if(@$latest_news_id=='NULL')
			{
				$latest_news_id=0;
			 }
			$data['news2']=$this->home_m->GetNews2($latest_news_id);
	
	
			$data['news3']=$this->home_m->GetNews3($latest_news_id);
			$data['news4']=$this->home_m->GetNews4($latest_news_id);
			
			//bellow tow line is for showing tow vides on home page
			$this->load->model('videos_m');			
			$data['vds']=$this->videos_m->LatestTwo();
			
			$this->load->view('rtlindex',$data);
			$this->load->view('footer_v',$data);
		
	}
	//--------------------------
	function ltrindex(){
			$this->load->model('home_m');
			$data['dictionary']=$this->home_m->GetDictionary();
			$data['langs']=$this->home_m->GetLang();
			$data['mrow']=$this->home_m->show_menu();
			$data['slides']=$this->home_m->GetSlideImages();
			$latest_news=$this->home_m->GetNews1();
			foreach($latest_news as $l)
			{ $latest_news_id=$l->nid;
			 }
			$data['news1']=$latest_news;
			$data['news2']=$this->home_m->GetNews2($latest_news_id);
			$data['news3']=$this->home_m->GetNews3($latest_news_id);
			$data['news4']=$this->home_m->GetNews4($latest_news_id);
			
			//bellow tow line is for showing tow vides on home page
			$this->load->model('videos_m');			
			$data['vds']=$this->videos_m->LatestTwo();
			
			$this->load->view('index',$data);
			$this->load->view('footer_v',$data);
		
	}
	/*function index(){
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
	}*/
	//---------------------
	function set_lang(){
		$id=$this->input->post('lang');
		$this->session->set_userdata("languageid",$id);
		$this->load->model('Site_Model');
		$data=$this->Site_Model->language_info();
		$this->session->set_userdata("language",$data->language);		
		$this->session->set_userdata("align",$data->align);		
		$this->session->set_userdata("alignment",$data->alignment);		
		$this->session->set_userdata("code",$data->code);
		
		/*$alignment=$data->alignment;
		if($alignment=='rtl'){
			$this->rtlindex();	
		}else{
			$this->ltrindex();
		}*/
		
		redirect(base_url());
	}
	
	

}
?>