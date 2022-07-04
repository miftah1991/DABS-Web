<?php
Class Awarded_Contracts extends CI_Controller{
	function __construct() {
        parent::__construct();
        $this->load->model('pagination_model');
        $this->load->library('pagination');
    }
		
	function index(){
		
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			// init params
			$config = array();
			$limit_per_page = 5;
			$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
			$total_records = $this->pagination_model->awards_record_count();

			if ($total_records > 0)
			{
				// get current page records
				$data["awards"] = $this->pagination_model->get_current_awards_page_records($limit_per_page, $page*$limit_per_page);

				$config['base_url'] = base_url() . 'Awarded_Contracts/index';
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				$config["uri_segment"] = 3;

				// custom paging configuration
				$config['num_links'] = 2;
				$config['use_page_numbers'] = TRUE;
				$config['reuse_query_string'] = TRUE;

				$config['full_tag_open'] = '<div class="pagination">';
				$config['full_tag_close'] = '</div>';

				$config['first_link'] = 'First Page';
				$config['first_tag_open'] = '<span class="firstlink">';
				$config['first_tag_close'] = '</span>';

				$config['last_link'] = 'Last Page';
				$config['last_tag_open'] = '<span class="lastlink">';
				$config['last_tag_close'] = '</span>';

				$config['next_link'] = 'Next';
				$config['next_tag_open'] = '<span class="nextlink">';
				$config['next_tag_close'] = '</span>';

				$config['prev_link'] = 'Prev';
				$config['prev_tag_open'] = '<span class="prevlink">';
				$config['prev_tag_close'] = '</span>';

				$config['cur_tag_open'] = '<span class="curlink" style="background-color:#C6C6C6; padding:8px; color: blue;">';
				$config['cur_tag_close'] = '</span>';

				$config['num_tag_open'] = '<span class="numlink">';
				$config['num_tag_close'] = '</span>';

				$this->pagination->initialize($config);

				// build paging links
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
			}
			$this->load->model('awards_m');
			$data['tdictionary']=$this->awards_m->GetTenderDictionary();			
			$this->load->view('header_v',$data);
			$this->load->view('awards_v',$data);
			$this->load->view('footer_v',$data);
	}
	/*
	
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
	*/
	
      	function searchAward(){
			$search = trim($this->input->post('search'));
			if($search){
				
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			
			$this->load->model('Awards_m');
			$data['awards']=$this->Awards_m->GetSearch($search);				
			$data['tdictionary']=$this->Awards_m->GetTenderDictionary();		
			$this->load->view('header_v',$data);
			$this->load->view('awards_v',$data);
			$this->load->view('footer_v',$data);
			
		}
	}
	
	function AwardDetail($id){
	
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('Awards_m');
			$data['award']=$this->Awards_m->GetAwardDetail($id);	
			$data['tdictionary']=$this->Awards_m->GetTenderDictionary();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('archive,back');
			$this->load->view('header_v',$data);
			$this->load->view('awards_detail_v',$data);
			$this->load->view('footer_v',$data);	
	
	}
	
	function Archive(){
	
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
			$this->load->model('Awards_m');
			$data['awards']=$this->Awards_m->GetExTenders();	
			$data['tdictionary']=$this->Awards_m->GetTenderDictionary();
			$this->load->model('dictionary_m');
			$data['dic']=$this->dictionary_m->translate('back');		
			$this->load->view('header_v',$data);
			$this->load->view('awards_v',$data);
			$this->load->view('footer_v',$data);	
	
	}
	
}
?>