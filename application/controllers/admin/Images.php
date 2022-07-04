<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends CI_Controller {

	function __construct()
	{
		// Call the Model constructor
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
		
		//$this->load->library('auth');
		
		//$this->load->model('Users_Model');
		
		header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1 
		header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1 
		header ("Pragma: no-cache");
		
		//$this->load->model("Site_Model");
		/*$language_id = $this->session->userdata('languageid');
		if(!isset($language_id) || $language_id=="")
		{
			$this->Site_Model->index();
		}
		$data['lng'] = $this->Site_Model->language_info($this->session->userdata('languageid'));*/
	}
		
	public function index($id = 0,$start = 0)
	{
		$this->load->model("Site_Model");
		$language_id = $this->session->userdata('languageid');
		if(!isset($language_id) || $language_id=="")
		{
			$this->Site_Model->index();
		}
		$data['lng'] = $this->Site_Model->language_info($this->session->userdata('languageid'));
		
		$data['perpage'] = 15;
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
	
	public function list_images($id=0)
	{
		
		$this->db->where('album_id', $id);
		$data['album'] = $this->db->get('tbl_albums')->row();
		
		$data['records'] = $this->db->query("select * from tbl_images where album_id='$id'  ORDER BY ordr")->result();
		$USERNAME=$this->session->userdata('USERNAME');
		$data['usrper']=$this->login_m->ReadUserData($USERNAME);
		$this->load->view("admin/images_list",$data);
	}

	public function showmore()
	{	
		$start = $this->input->post("start");
		$id = $this->input->post("aid");
		
		$records = $this->db->query("select * from tbl_images where album_id='".$id."' limit ".$start.",3")->result();
		//$data['tot_records'] = $this->db->query("select count(image_id) as tot_rec from tbl_images where album_id='$id'")->row();
		$tot_records = $this->db->where("album_id",$id)->count_all_results("tbl_images");
		
		foreach($records as $row)
		{
			$ext = substr(strrchr($row->image, '.'), 1);
			$name = substr($row->image,0,strlen($row->image)-(strlen($ext)+1));
			$thumb = $name."_thumb.".$ext;
			
			
				$timestamp = strtotime($row->dated);
				$newdate = date("Y-m-d", $timestamp);
				$title = "Title : " . $row->title . "\n" . "Dated : " . $newdate;
		
      			echo '<li>';
                echo '<table width="100%">';
                echo '<tr>';
                echo '<td width="160">';
                
                echo '<a href=' . base_url() . 'uploads/' . $row->image . '" rel="prettyPhoto[gallery2]" title="'.$row->title. '"><img src="'. base_url() .'uploads/'.$thumb.'" width="150" height="150" alt="'.$row->title.'" title="'.$row->title.'" /></a>'; 
                echo '</td>';
                echo '<td valign="top">';
                    echo '<h3>'.$row->title.'</h3>';
                    echo '<p>'.$row->description.'</p>';
                echo '</td>';
                echo '</tr>';
                echo '</table>';
                echo '</li>';              
        
		}
	}	
	public function remove_image($image)
	{
			
			
		$ext = substr(strrchr($image, '.'), 1);
		$name = substr($image,0,strlen($image)-(strlen($ext)+1));
		$thumb = $name."_thumb.".$ext;
		
		$this->db->where("image",$image);
		$this->db->delete("tbl_images");
		
		chmod("uploads",0777);
		$path = "uploads/".$image;
		@unlink($path);
		$path = "uploads/".$thumb;
		@unlink($path);
		chmod("uploads",0755);
		$this->session->set_flashdata('msg','image have been deleted');
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref."/removed",'refresh');  
	}
	
	public function add_images()
	{ 
			
			
		///////////////////////////////////////////////////////////////
		$title = $this->input->post('title1');
		if(!isset($title) || $title=="")
		{	
			$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			$this->load->view("admin/images_form",$data);
		}
		else
		{	////////////////////////////////////////////////////////////////////////
			  $config['upload_path'] = 'uploads/gallery'; /* NB! create this dir! */  
			  $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';  
			  //$config['max_size']  = '0';  
			  //$config['max_width']  = '0';  
			  //$config['max_height']  = '0';  
			  $this->load->library('upload', $config);  
		  
			  $configThumb = array();  
			  $configThumb['image_library'] = 'gd2';  
			  $configThumb['source_image'] = '';  
			  $configThumb['create_thumb'] = TRUE;  
			  $configThumb['maintain_ratio'] = TRUE;  
			  $configThumb['width'] = 150;  
			  $configThumb['height'] = 150;  
			  $this->load->library('image_lib');  
			////////////////////////////////////////////////////////////////////////
			$tot = $this->input->post('hf');
			for($i = 1 ; $i <= $tot; $i++)
			{	
			  
					$upload = $this->upload->do_upload('image'.$i);  
					if($upload === FALSE) continue;  
					$data = $this->upload->data(); 
					
					$ext = substr(strrchr($data['full_path'], '.'), 1);
					$name = time() . $i .".".$ext;
					
			    	rename($data['full_path'], $data['file_path'].$name);
 					
					$uploadedFiles[$i] = $data;  
					if($data['is_image'] == 1) {  
						  $configThumb['source_image'] = $data['file_path'].$name;  
						  $this->image_lib->initialize($configThumb);  
						  $this->image_lib->resize();  
					}  
					
					$this->save_image_info($name,$i);
			}
			$this->session->set_flashdata('msg','image(s) have been added');
			redirect(base_url()."admin/images/list_images/".$this->uri->segment(4)."/".$this->uri->segment(5)."/added",'refresh');
		///////////////////////////////////////////////////////////////		
		}
	}
	
	public function add_images_now()
	{
			  $config['upload_path'] = 'uploads/gallery'; /* NB! create this dir! */  
			  $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';  
			  $config['max_size']  = '0';  
			  $config['max_width']  = '0';  
			  $config['max_height']  = '0';  
			  $this->load->library('upload', $config);  
		  
			  $configThumb = array();  
			  $configThumb['image_library'] = 'gd2';  
			  $configThumb['source_image'] = '';  
			  $configThumb['create_thumb'] = TRUE;  
			  $configThumb['maintain_ratio'] = TRUE;  
			  $configThumb['width'] = 150;  
			  $configThumb['height'] = 150;  
			  $this->load->library('image_lib');  
			////////////////////////////////////////////////////////////////////////
			$tot = $this->input->post('hf');
			for($i = 1 ; $i <= $tot; $i++)
			{	
			  
					$upload = $this->upload->do_upload('image'.$i);  
					if($upload === FALSE) continue;  
					$data = $this->upload->data(); 
					
					$ext = substr(strrchr($data['full_path'], '.'), 1);
					$name = time() . $i .".".$ext;
					
			    	rename($data['full_path'], $data['file_path'].$name);
 					
					$uploadedFiles[$i] = $data;  
					if($data['is_image'] == 1) {  
						  $configThumb['source_image'] = $data['file_path'].$name;  
						  $this->image_lib->initialize($configThumb);  
						  $this->image_lib->resize();  
					}  
					
					$this->save_image_info($name,$i);
			}
			$this->session->set_flashdata('msg','image(s) have been added');
			redirect(base_url()."admin/images/list_images/".$this->uri->segment(4)."/".$this->uri->segment(5)."/added",'refresh');
	}
	
	
	public function save_image_info($image,$i)
	{
		$data = array(
				'title'=> $this->input->post('title'.$i),
				'image'=> $image,
				'description' => $this->input->post('description'.$i),
				'dated'=> date("Y-m-d"),
				'album_id'=> $this->uri->segment(4)
		);
		
		$this->load->model('Image_model');
		$this->Image_model->add_record($data);
	}
	
	public function edit_image($id, $album){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','trim|required');
		
		if($this->form_validation->run()){
			$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
			);
		
			$this->db->where('image_id',$id);
			$this->db->update('tbl_images', $data);
			$this->session->set_flashdata('msg','Image has been updated.');
			redirect(base_url()."admin/albums/list_album/",'refresh');
		}else{
			$this->db->where('image_id', $id);
			$data['image'] = $this->db->get('tbl_images')->row();
			$USERNAME=$this->session->userdata('USERNAME');
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			$this->load->view('admin/image_edit', $data);
		}
			
	}
	
	public function reorder(){
		$total = $_REQUEST['total'];
		
		for( $i=0 ; $i<$total ; $i++ ){
			$this->db->where('image_id', $_REQUEST['id'.$i]);
			$this->db->update('tbl_images', array('ordr'=>$_REQUEST['order'.$i]));
		}
		
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location'); 
	}
}