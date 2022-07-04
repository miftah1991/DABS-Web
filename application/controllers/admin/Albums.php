<?php
class Albums extends CI_Controller{
		
		function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){ $gallery_per=$us->gallery; }
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($gallery_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
	public function index($start=0)
	{
	
		$data['tot_records'] = $this->db->where("visible",1)->count_all_results("tbl_albums");

		$this->load->model("albums_model");
		$data['perpage'] = 20;
		$data['records'] = $this->albums_model->get_records($id,$start, $data['perpage']);

		$this->load->model("Dictionary_model");
		$data['dictionary'] = $this->Dictionary_model->get_dictionary();
		
//		$this->load->model("Menu_model");
//		$data['menu'] = $this->Menu_model->show_menu();

		$this->load->model("Section_Solid_Model");
		$data['left_sections'] = $this->Section_Solid_Model->get_sections("left");
		$data['right_sections'] = $this->Section_Solid_Model->get_sections("right");
		$data['top_center_sections'] = $this->Section_Solid_Model->get_sections("top_center");
		$data['bottom_center_sections'] = $this->Section_Solid_Model->get_sections("bottom_center");

		$this->load->model("Sections_model");
		$data['left_contents'] = $this->Sections_model->get_sections("left");
		$data['right_contents'] = $this->Sections_model->get_sections("right");
		$data['top_center_contents'] = $this->Sections_model->get_sections("top_center");
		$data['bottom_center_contents'] = $this->Sections_model->get_sections("bottom_center");

		$this->load->model("Header_Images_Model");		
		$language_id = $this->session->userdata('languageid');	
		$query = $this->db->query("select page_id from tbl_pages where home=1 and language_id=" . $language_id);
		$id = $query->row()->page_id;
		$data['banners'] = $this->Header_Images_Model->get_records($id);
	
		
		$this->load->model("Menu_model");
		$data['menu'] = $this->Menu_model->show_menu();
		
		$this->load->model("SectionParts_Model");
		$data['quick'] = $this->SectionParts_Model->get_quick();
		
		$this->load->view('albums_view',$data);
	}
	public function list_album($id=0)
	{	
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
		$this->load->model("albums_model");
		$data['records'] = $this->albums_model->get_albums();
		$this->load->view('admin/albums_list',$data);
	}
	
	public function add_album()
	{
			
			
			
		$title = $this->input->post("title");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('custom_url','Custom url','trim|required');
		if($this->form_validation->run()==false)
		{	
			$this->load->model('lang_m');
			$data['languages'] = $this->lang_m->GetAll();
			$USERNAME=$this->session->userdata('USERNAME');
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			$this->load->view("admin/album_form",$data);
		}
		else
		{
			if($this->input->post('custom_url')=='#'){$ext = "";}else{$ext = ".html";}
			$data = array(
					'language_id' => $this->input->post('language_id'),
					'title' => $this->input->post('title'),
					'custom_url' => $this->input->post('custom_url').$ext,
					'dated' => date("Y-m-d"),
			);
			$this->load->model("Albums_model");
			$this->Albums_model->add_record($data);
			$this->Albums_model->albums_route();
			$this->session->set_flashdata('msg','\''.$this->input->post('title').'\' album added.');
			redirect(base_url()."admin/albums/list_album/added",'refresh');
		}
	}
	
	public function delete_album($id)
	{
	
			
		$this->load->model("Albums_model");
		$this->Albums_model->remove_record($id);
		$this->Albums_model->albums_route();
		$this->session->set_flashdata('msg','Album have been deleted');
		redirect(base_url()."admin/albums/list_album/deleted",'refresh');
	}
	
	public function edit_album($id){
				
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('custom_url','Custom url','trim|required');
		if($this->form_validation->run()){
			if($this->input->post('custom_url')=='#'){$ext = "";}else{$ext = ".html";}
			$data = array(
					'title' => $this->input->post('title'),
					'custom_url' => $this->input->post('custom_url').$ext,
			);
			
			$this->db->where('album_id',$id);
			$this->db->update('tbl_albums', $data);
			$this->session->set_flashdata('msg','Album has been updated.');
			redirect(base_url()."admin/albums/list_album/updated",'refresh');
		}else{
			$this->db->where('album_id', $id);
			$data['album'] = $this->db->get('tbl_albums')->row();
			$USERNAME=$this->session->userdata('USERNAME');
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			$this->load->view('admin/album_edit', $data);
		}
	}
	
	public function reorder(){
		if(isset($_POST['total'])){
			for( $i = 0; $i < $_POST['total'] ; $i++ ){
				$SET_VALS['ordr']		=	$_REQUEST['order'.$i];
				$SET_VALS['visible']	=	isset($_REQUEST['check'.$i])?1:0;
				$this->db->where('album_id', $_REQUEST['id'.$i]);
				$this->db->update('tbl_albums', $SET_VALS);
			}
			
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref, 'location');
		}
	}
	
}