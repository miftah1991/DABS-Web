<?php
class Album extends CI_Controller{
		
		
	public function index($start=0)
	{
	
		$data['tot_records'] = $this->db->where("visible",1)->count_all_results("tbl_albums");

		$this->load->model("albums_model");
		$data['perpage'] = 50;
		//$id=$this->session->userdata('languageid');
		$data['records'] = $this->albums_model->get_records($start, $data['perpage']);

		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
		$this->load->view('header_v',$data);
		$this->load->view('albums_v',$data);
	}
	
	
}