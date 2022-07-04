<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Votes extends CI_Controller {
	
	function index(){
			$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['mrow']=$this->headerfooter_m->show_menu();
		$this->load->model("Dictionary_m");
		$data['dictionary']=$this->Dictionary_m->translate('cast_vote,wlcom_msg,company_profile,subcribe');
		$this->load->view('header_v',$data);
		$this->load->view("question_vote",$data);
		$this->load->view('footer_v',$data);
		}
	public function post_vote()
	{
		
			//$this->load->model("Users_Model");
			//$data["user"] = $this->Users_Model->get_user_info();
		
		$bool = $this->check_cast($this->uri->segment(3),$_SERVER['REMOTE_ADDR']);
		if($bool==false)
		{
			$data = array(
					'question_id' => $this->uri->segment(3),
					'option_id' => $this->input->post("vote"),
					'ip_voter' => $_SERVER['REMOTE_ADDR'],
				);
			$this->load->model("Votes_Model");
			$this->Votes_Model->add_record($data);
			
			$this->load->model("Dictionary_m");
			$dic = $this->Dictionary_m->translate('casted_vote');
			foreach($dic as $d){$casted=$d->casted_vote; }
			$this->session->set_flashdata('votemsg', $casted);
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			
			echo '<script type="text/javascript">alert("'.$casted.'")</script>';
			echo '<script type="text/javascript">location.href="'.$ref.'"</script>';
			//redirect($ref,'refresh'); 
		}
		else
		{
			
			$this->load->model("Dictionary_m");
			$dic = $this->Dictionary_m->translate('casted_already');
			foreach($dic as $d){echo $casteda=$d->casted_already; }
				
			$this->session->set_flashdata('votemsg', $casteda);
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			
			echo '<script type="text/javascript">alert("'.$casteda.'")</script>';
			echo '<script type="text/javascript">location.href="'.$ref.'"</script>';
			//redirect($ref,'refresh'); 
		}
	}
	
	public function check_cast($question,$ip)
	{
		$this->db->where("ip_voter",$ip);
		$this->db->where("question_id",$question);
		$q = $this->db->get("tbl_votes");
		$rows = $q->num_rows();
		
		if($rows>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
