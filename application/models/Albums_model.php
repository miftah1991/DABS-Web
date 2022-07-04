<?PHP
class Albums_model extends CI_Model{

	public function get_records($start=0, $perpage = 27)
	{
		$query = 'SELECT a.album_id AS album_id, a.ordr, a.visible, a.title AS title,a.custom_url AS custom_url, a.dated AS dated, (select i.image from tbl_images i where a.album_id=i.album_id limit 0,1) AS image FROM tbl_albums a where a.visible=1 ORDER BY  a.album_id DESC limit '.$start.', ' . $perpage;
		$q = $this->db->query( $query );
		return $q->result();
	}
	
	public function get_albums()
	{
		$query = 'SELECT a.album_id AS album_id, a.ordr, a.visible, a.title AS title,a.custom_url AS custom_url, a.dated AS dated, (select i.image from tbl_images i where a.album_id=i.album_id limit 0,1) AS image FROM tbl_albums a ORDER BY  a.ordr ';
		$q = $this->db->query( $query );
		return $q->result();
	}
	
	public function add_record($data)
	{
		$data = $this->security->xss_clean($data);
		$this->db->insert("tbl_albums",$data);
	}
	
	public function remove_record($id)
	{
		$this->db->where("album_id",$id);
		$this->db->delete("tbl_albums");
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function albums_route()
	{
		$this->load->helper('file');
		$this->load->helper('string');

		$q = $this->db->get("tbl_albums")->result();
		
		$data = "<?PHP ";
		
		//$route['pages'] = "pages/index";
		foreach($q as $row):
				
				$data .="\n\t \$route['".$row->custom_url."'] = 'images/index/".$row->album_id."';\n";
				$data .="\n\t \$route['".$row->custom_url."/(:num)'] = 'images/index/".$row->album_id."/$1';\n";
			
		endforeach;
		$data .=" ?>";

		if ( ! write_file('application/config/albums_route.php', $data))
		{
			 echo 'Unable to write the file';
		}
		else
		{
		//	 echo 'File written!';
		}
	}
}