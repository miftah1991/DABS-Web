<?PHP
class Site_Model extends CI_Model{
	
	public function index()
	{		$language_id = $this->session->userdata('languageid');
		if(!isset($language_id) || $language_id==""){
			$id = $this->get_default_language();
			$this->session->set_userdata("languageid",$id);
			
			$data=$this->language_info();
			$this->session->set_userdata("language",$data->language);		
			$this->session->set_userdata("align",$data->align);		
			$this->session->set_userdata("alignment",$data->alignment);		
			$this->session->set_userdata("code",$data->code);
		}

	}
	
	public function get_default_language()
	{
		$q = $this->db->query("select language_id from tbl_lng where default_language=1");	
		$row = $q->row();
		return $row->language_id;
	}
	
	public function language_info()
	{
		$id = $this->session->userdata("languageid");
		$this->db->where('language_id',$id);
		$query = $this->db->get('tbl_lng');
		$row = $query->row();
		//$data = array('languageid'=>$row->language_id,'language' => $row->language,'alignment'=>$row->alignment);
		//$this->session->set_userdata('languageid',$row->language_id);
		
		return $row;	
	}
	
	
	
}
