<?PHP 
	class Questions_Model extends CI_Model
	{
		public function get_records($id)
		{
			$this->db->where("language_id",$id);
			$this->db->order_by("question_id desc");
			return $this->db->get("tbl_questions")->result();
		}
		
		public function add_record($data)
		{
			$data = $this->security->xss_clean($data);
			$this->db->insert("tbl_questions",$data);

			$mId = $this->max_question_id();
			return $mId['question_id'];

		}
		
		function max_question_id()
		{
			$this->db->select_max('question_id');
			$query = $this->db->get('tbl_questions');	
	
			return $query->row_array(); //return the row as an associative array
		}
	}