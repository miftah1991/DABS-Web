<?php 

class Images extends CI_Controller {
	
	public function index($id = 0,$start = 0)
	{
		$this->load->model("Site_Model");
		$language_id = $this->session->userdata('languageid');
		if(!isset($language_id) || $language_id=="")
		{
			$this->Site_Model->index();
		}
		$data['lng'] = $this->Site_Model->language_info($this->session->userdata('languageid'));
		
		$data['perpage'] = 50;
		$data['album'] = $this->db->query('SELECT * FROM tbl_albums WHERE album_id='.$id)->row();
		$data['records'] = $this->db->query("select * from tbl_images where album_id='$id' ORDER BY ordr limit $start, ".$data['perpage'])->result();
		//$data['tot_records'] = $this->db->query("select count(image_id) as tot_rec from tbl_images where album_id='$id'")->row();	
		$this->load->model('headerfooter_m');
		$data['dictionary']=$this->headerfooter_m->GetDictionary();
		$data['langs']=$this->headerfooter_m->GetLang();
		$data['mrow']=$this->headerfooter_m->show_menu();
		$this->load->model('news_m');
		$data['news']=$this->news_m->GetAll();
		$data['tot_records'] = $this->db->where("album_id",$id)->count_all_results("tbl_images");
		$this->load->view('header_v',$data);
		$this->load->view("images_v",$data);
		//$this->load->view('footer_v',$data);
	}
	
	
	
	
	
}