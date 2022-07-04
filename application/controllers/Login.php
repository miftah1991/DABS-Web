<?php
Class Login extends CI_Controller{
	/*function __construct()
	{
			// Call the Model constructor
			parent::__construct();
		
			$this->load->library('session');
			$this->load->model("Site_Model");
			$language_id = $this->session->userdata('languageid');
			if(!isset($language_id) || $language_id=="")
			{
				$this->Site_Model->index();
			}
	}
	*/
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
	function index(){
		 $data['image']=$this->captcha();
		$this->load->view('login_v',$data);
	}
	function check_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('u_username','USERNAME','required|xss_clean|trim');
        $this->form_validation->set_rules('u_password','PASSWORD','required|xss_clean|trim');
        //$this->form_validation->set_rules('captcha','captcha','match_captcha[captcha.word]');       
        return $this->form_validation->run();
        
    }
	function UserSubmit(){
		$return_validate=$this->check_validation();
		if ($return_validate == FALSE)
				{
					$this->index();	
				}else{
					$cpc=$this->input->post('captcha');
					 if($cpc!=$_SESSION['val']){$this->index();}
					 
					 else{	 
					$pass=md5($this->input->post('u_password'));
					$data=array(
               					'uname'=> $this->input->post('u_username'),
               					'upassword'=> $pass
			   					);
					$this->load->model('login_m');
					$result = $this->login_m->CheckUser($data);
						if ($result == TRUE) {
							$uname=$this->input->post('u_username');
							
							$user_data=$this->login_m->ReadUserData($uname);
							foreach($user_data as $u){
								$USERNAME = $u->uname;	
								$UFNAME = $u->ufname;
								$ULNAME = $u->ulname;
							}
							$this->session->set_userdata('logged_in', 'TRUE');
							$this->session->set_userdata('USERNAME', $USERNAME);							
							$this->session->set_userdata('UFNAME', $UFNAME);
							$this->session->set_userdata('ULNAME', $ULNAME);
							redirect(base_url().'admin/AdminHome/');
							
						}else{
							
							$data['image']=$this->captcha();
							$data['erroMessage']='Invalid USERNAME or PASSWORD';
							$this->load->view('login_v',$data);
							
						}
					
				}
			}
		
	}

}
?>