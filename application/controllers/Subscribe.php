<?php
Class Subscribe extends CI_Controller{
		
		function validate(){
        $this->load->library('form_validation');
    	$this->form_validation->set_rules('cname', 'Name', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('cemail', 'Email','required|trim|xss_clean|strip_tags|valid_email|is_unique[users.cemail]');
		//$this->form_validation->set_rules('m_link', 'Message Link','callback_username_check');

        return $this->form_validation->run();
    	}
		
		function index(){
				$validate=$this->validate();
			
			
			
			if($validate == FALSE ){
				$this->load->model('headerfooter_m');
				$data['dictionary']=$this->headerfooter_m->GetDictionary();
				$data['langs']=$this->headerfooter_m->GetLang();
				$data['mrow']=$this->headerfooter_m->show_menu();
				$data['message']='';			
				$this->load->view('header_v',$data);
				$this->load->view('sub_add_v',$data);
				$this->load->view('footer_v',$data);
				
			}else{
			
			$inputsArray=array(
		    'cname'=>$this->input->post('cname'),
		    'cemail'=>$this->input->post('cemail'),
			'news'=>$this->input->post('news'),
		    'jobs'=>$this->input->post('jobs'),
		    'tenders'=>$this->input->post('tenders')
		    );
			$this->load->model('subscribe_m');
			$id=$this->subscribe_m->AddUser($inputsArray);
			$this->approval_email($id,$this->input->post('cemail'));
			$this->load->model('headerfooter_m');
				$data['dictionary']=$this->headerfooter_m->GetDictionary();
				$data['langs']=$this->headerfooter_m->GetLang();
				$data['mrow']=$this->headerfooter_m->show_menu();
				$data['message']='
You have successfully subscribed to DABS Updates. You\'ll receive a confirmation email in few minutes. Please follow the link in it to confirm your subscription. If the email takes more than 15 minutes to appear in your mailbox, please check your spam folder.';
				$this->load->view('header_v',$data);
				$this->load->view('sub_add_v',$data);
				$this->load->view('footer_v',$data);	
			//$this->session->set_flashdata('msg','Message Added Successfully');
        	//redirect(base_url().'admin/Messages/');
			}
		}
		
		
		public function subscribe_approved($id)
	{
		$data = array(
			'confirm' => 1
		);
		$this->db->where("uid",$id);
		$this->db->update("users",$data);
		echo "Congratulations! You are now subscribed to DABS Updates. ";
		echo anchor(base_url(),"Home");
		//redirect("pages");
	}
		
		public function approval_email($id,$email)
	{
		$config = array (
		  'mailtype' => 'html',
		  'charset'  => 'utf-8',
		  'priority' => '1'
	   	);

		$message = "Greetings,<br/><br/>";
		$message .= "Thank you for Subscring up for DABS Updates. Please confirm your subscription by <a href='".base_url()."subscribe/subscribe_approved/".$id."'>clicking here</a>.<br/><br/>";
		$message .= "We hope you find this Updates to be a valuable resource, and we appreciate any feedback you have at <a href='mailto:info@dabs.af'>info@dabs.af</a><br/><br/>";
		$message .= "Warm regards,<br/>DABS";
		
		$this->load->library('email',$config);
		$this->email->to($email);				
		$this->email->from('dabs.pr@gmail.com'); 				
		$this->email->subject("Subscription");
		$this->email->message($message);		

		$this->email->send();
	}
		
		
		
		
		
		
		
		
		
		
		
}
?>