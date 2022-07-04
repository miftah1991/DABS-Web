<?php
Class Complaints extends CI_Controller{
	
	function services(){
		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();	
		$this->load->model('Complaint_m');
			$data['complaint_dic']= $this->Complaint_m->getDictionary();
			$data['services']=$this->Complaint_m->getComplaintType('services');
		$data['image']=$this->captcha();
		$this->load->view('header_v', $data);
		$this->load->view('complaints-v', $data);
		$this->load->view('footer_v', $data);
	}
	 function random_char( $length = 5 ) {
        $chars = "abcdefghijklmnpqrstuvwxyz123456789";
        $random_char = substr( str_shuffle( $chars ), 0, $length );
        return $random_char;
    }
	function captcha(){
        $this->load->helper('captcha');
        $vals = array(
            'word' => $this->random_char(),
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
			'img_width' => '350',
            'font_path' => './fonts/Titr.ttf',
            'expiration' => 3600
                );              
        $cap = create_captcha($vals);
		$_SESSION['val']= $vals['word'];
        $data = array(
                        'captcha_time' => $cap['time'],
                        'ip_address' => $this->input->ip_address(),
                        'word' => $cap['word']
                            );
        $this->load->model('login_m');
        $this->login_m->AddCaptcha($data);
        return $cap['image'];
    }
	function general(){
		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();	
		$this->load->model('Complaint_m');
			$data['complaint_dic']= $this->Complaint_m->getDictionary();
			$data['services']=$this->Complaint_m->getComplaintType('general');
			$data['image']=$this->captcha();
		$this->load->view('header_v', $data);
		$this->load->view('complaints-v', $data);
		$this->load->view('footer_v', $data);
	}
	function emergency(){
		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();	
		$this->load->model('Complaint_m');
			$data['complaint_dic']= $this->Complaint_m->getDictionary();
			$data['services']=$this->Complaint_m->getComplaintType('emergency');
			$data['image']=$this->captcha();
		$this->load->view('header_v', $data);
		$this->load->view('complaints-v', $data);
		$this->load->view('footer_v', $data);
	}
	
	function employee(){
		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();	
		$this->load->model('Complaint_m');
			$data['complaint_dic']= $this->Complaint_m->getDictionary();
			$data['services']=$this->Complaint_m->getComplaintType('employee');
			$data['image']=$this->captcha();
		$this->load->view('header_v', $data);
		$this->load->view('complaints-v', $data);
		$this->load->view('footer_v', $data);
	}
	function theft(){
		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();	
		$this->load->model('Complaint_m');
			$data['complaint_dic']= $this->Complaint_m->getDictionary();
			$data['services']=$this->Complaint_m->getComplaintType('theft');
			$data['image']=$this->captcha();
		$this->load->view('header_v', $data);
		$this->load->view('complaints-v', $data);
		$this->load->view('footer_v', $data);
	}
	function bill(){
		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();	
		$this->load->model('Complaint_m');
			$data['complaint_dic']= $this->Complaint_m->getDictionary();
			$data['services']=$this->Complaint_m->getComplaintType('bill');
			$data['image']=$this->captcha();
		$this->load->view('header_v', $data);
		$this->load->view('complaints-v', $data);
		$this->load->view('footer_v', $data);
	}
	function meter(){
		$this->load->model('headerfooter_m');
			$data['dictionary']=$this->headerfooter_m->GetDictionary();
			$data['langs']=$this->headerfooter_m->GetLang();
			$data['lang']=$this->headerfooter_m->GetInfoForOneLang();
			$data['mrow']=$this->headerfooter_m->show_menu();	
		$this->load->model('Complaint_m');
			$data['complaint_dic']= $this->Complaint_m->getDictionary();
			$data['services']=$this->Complaint_m->getComplaintType('meter');
			$data['image']=$this->captcha();
		$this->load->view('header_v', $data);
		$this->load->view('complaints-v', $data);
		$this->load->view('footer_v', $data);
	}
	
	function validate(){
        $this->load->library('form_validation');
    	$this->form_validation->set_rules('name', 'Complaint Name', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('account', ' Acount Number', 'trim|xss_clean|strip_tags');
    	$this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('email', 'Email Address','trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('type', 'Complaint Type', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('comments', 'Comments and Complaint', 'required|trim|xss_clean|strip_tags');    	
		$this->form_validation->set_rules('address', 'News Deatil','required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('respond', 'News Publish Date', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('captcha', 'Clean Captcha', 'required|trim|xss_clean|strip_tags');
        return $this->form_validation->run();
    	}
		
	function addComplaint(){
			//$upload_status=$this->do_upload();
			$validate=$this->validate();
			//$error = array('error' => $this->upload->display_errors());
			//$data=$this->upload->data();
			//$file_name=$data['file_name'];
			if($validate == FALSE ){
				echo 'field';
				
			}else{
				$cpc=$this->input->post('captcha');
					 if($cpc == $_SESSION['val']){
			$inputsArray=array(
		    'name'				=>$this->input->post('name'),
			'bill_number'		=>$this->input->post('account'),
		    'phone_number'		=>$this->input->post('phone'),
			'complaint_group'	=>$this->input->post('group'),
			'complaint_type'	=>$this->input->post('type'),
			'comments'			=>$this->input->post('comments'),
		    'specific_address'	=>$this->input->post('address'),
			'seen'				=>0,
			'breshna_respond'	=>$this->input->post('respond'),
			'language'			=>$this->session->userdata('languageid'),
			'email'				=>$this->input->post('email')
		    );
						
			$this->load->model('Complaint_m');
			$this->Complaint_m->add_complaint($inputsArray);
			$this->session->set_flashdata('msg', 'Success');
        	redirect(base_url().'Complaints/'.$this->input->post('complaint_type'));
					 }else{			
			$this->session->set_flashdata('msg', 'Error');
        	redirect(base_url().'Complaints/'.$this->input->post('complaint_type'));
					 }
			}
			
		}
}
?>