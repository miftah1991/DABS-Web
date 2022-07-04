<?PHP
	class Votes_Model extends CI_Model{
		public function add_record($data)
		{
			$data = $this->security->xss_clean($data);
			$this->db->insert("tbl_votes",$data);
		}
	}