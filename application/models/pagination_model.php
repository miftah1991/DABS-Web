<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_Model extends CI_Model {
      function __construct() {
        parent::__construct();
    }
    // Count all record of table "contact_info" in database.
       public function record_count() {
        $languageid=$this->session->userdata('languageid');
		$this->db->from("tbl_news");
        $this->db->where('language_id', $languageid);
		$this->db->order_by('nid', 'desc');
      //  $this->db->limit(100);
        $count = $this->db->count_all_results();
        return $count;
    }
	public function complaint_record_count() {        
		$this->db->from("customer_complaints");
		$this->db->order_by('id', 'desc');
        $count = $this->db->count_all_results();
        return $count;
    }
	
	

    public function get_current_page_records($limit, $start)
    {
        $languageid=$this->session->userdata('languageid');
        $this->db->where('language_id', $languageid);
        $this->db->order_by('date', 'desc');
		$this->db->order_by('nid', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_news");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }
	
	public function complaint_current_page_records($limit, $start)
    {		
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$query = $this->db->get("customer_complaints");
        

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }
	
	public function awards_record_count() { 
		$this->db->from("tbl_contracts_award");
		$this->db->order_by('id', 'desc');
        $count = $this->db->count_all_results();
        return $count;
    }
	
	public function get_current_awards_page_records($limit, $start)
    {
		
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_contracts_award");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }



   /*  public function report_record_count() {
        $languageid=$this->session->userdata('languageid');
		$this->db->from("tbl_reports");
        $this->db->where('language_id', $languageid);
		$this->db->order_by('nid', 'desc');
      //  $this->db->limit(100);
        $count = $this->db->count_all_results();
        return $count;
    } */


}
?>