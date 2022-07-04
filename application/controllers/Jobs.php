<?php
Class Jobs extends CI_Controller{
    
    
    
    function index(){
		
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('jobs_m');
			$data['jobs']=$this->jobs_m->GetAll();	
		
			$data['jdictionary']=$this->jobs_m->GetJobDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('jobs_v',$data);
			$this->load->view('footer_v',$data);
	}
	function JobDetail($jid){
	
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('jobs_m');
			$data['job']=$this->jobs_m->GetJob($jid);	
			$data['jdictionary']=$this->jobs_m->GetJobDictionary();
			$this->load->view('header_v',$data);
			$this->load->view('jobs_detail_v',$data);
			$this->load->view('footer_v',$data);
	}
    function archive(){     
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('jobs_m');
			$data['jobs']=$this->jobs_m->GetExJobs();	
			$data['jdictionary']=$this->jobs_m->GetJobDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('jobs_archive',$data);
			$this->load->view('footer_v',$data);
    }
	
	
    function detail($jid){
        $this->load->model('jobs_m');
	$dat['job']=$this->jobs_m->GetJob($jid);        
        $dat['jdictionary']=$this->jobs_m->GetJobDictionary();
        $fields=array('back');
        $this->load->model('dictionary_m');
        $dat['dictionary']=$this->dictionary_m->GetData($fields);        
	$this->load->view('jobs_detail_v',$dat);
	$this->load->view('footer_v',@$data);        
        
    }
   
        function JobSearch(){
		$search = trim($this->input->post('search'));
		if($search){
		$this->load->model('headerfooter_m');
		$data['dictionary']=$this->headerfooter_m->GetDictionary();
		$data['langs']=$this->headerfooter_m->GetLang();
		$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
		$data['mrow']=$this->headerfooter_m->show_menu();
		$this->load->model('jobs_m');
		$data['jobs']=$this->jobs_m->JobSearch($search);	
		$data['jdictionary']=$this->jobs_m->GetJobDictionary();		
		$this->load->view('header_v',$data);
		$this->load->view('jobs_searcg',$data);
		$this->load->view('footer_v',$data);
		
		}
        
    }  
    
    
    
    
}
?>