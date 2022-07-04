<?php
Class Complaints extends CI_Controller{
	

	function __construct()
			{		
			parent::__construct();
			$this->load->model('pagination_model');
			$this->load->library('pagination');
  			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');						
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){
			 $news_per=$us->complaints; 
			}
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($news_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
		function index(){
			
			$USERNAME=$this->session->userdata('USERNAME');
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			$this->load->model('Complaint_m');
			
			// init params
			$config = array();
			$limit_per_page = 5;
			$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
			$total_records = $this->pagination_model->complaint_record_count();	
			if ($total_records > 0)
			{
				
				// get current page records
				$data["complaints"] = $this->pagination_model->complaint_current_page_records($limit_per_page, $page*$limit_per_page);
				$config['base_url'] = base_url() . 'admin/Complaints/index';
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				$config["uri_segment"] = 4;

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
			$this->load->view('admin/complaints_v' ,$data);

		}
		function ExportComplaints(){
			$this->load->library('export');
			$this->load->model('mymodel');
			$sql = $this->mymodel->myqueryfunction();
			$this->export->to_excel($sql, 'customer_complaints'); 
		}
		
		function EditComplaint($id){
		
		}
		function Delete($id){
		
		}
	
}
?>