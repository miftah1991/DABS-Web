<?php
Class Articles extends CI_Controller{
		function __construct()
			{		
			parent::__construct();			
			$logged_in=$this->session->userdata('logged_in');
			$USERNAME=$this->session->userdata('USERNAME');
			$this->load->model('login_m');			
			//$USERNAME=$this->session->userdata('USERNAME');			
			$data['usrper']=$this->login_m->ReadUserData($USERNAME);
			foreach($data['usrper'] as $us){
			 $news_per=$us->articles; 
			}
			if($logged_in != 'TRUE' || $USERNAME == '' || !isset($logged_in) || !isset($USERNAME) )
			{
				redirect(base_url().'Login/');
			}
			if($news_per !=1){
				$this->session->set_flashdata('msg','You Dont Have Permission to Manage This Moduel');
				redirect(base_url().'admin/AdminHome');
			}
			}
		function index(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('new_m');
				$data['nws']=$this->new_m->GetAllArticles();	
				$this->load->view('admin/articles_v',$data);
		}
		
	private function set_upload_options(){
				$config = array();
				$config['upload_path']          = './uploads/news';
				$config['allowed_types']        = 'jpg|png|pdf|doc|docx|xls|xlsx';
				$config['encrypt_name'] 		 =	 true;
				$config['max_width']            = 2000;
                $config['max_height']           = 1000;	
				return $config;		
	}
	function do_upload(){
				
				$this->load->library('upload');
				$files=$_FILES;
				$cpt=count($_FILES['userfile']['name']);
				for($i=0; $i<$cpt; $i++)
				{
					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
        			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
        			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
        			$_FILES['userfile']['size']= $files['userfile']['size'][$i]; 
        			$this->upload->initialize($this->set_upload_options());
        			$up=$this->upload->do_upload();
					$data=$this->upload->data();
					if($up){
						echo $data['file_name'];
					}
				}
	}
		function EditArticle($nid){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('new_m');
				$data['nws']=$this->new_m->GetArticle($nid);
				$this->load->model('lang_m');
				$data['lng']=$this->lang_m->GetAll();
				$this->load->view('admin/articles_edit_v',$data);
			
			}
		
		function AddArticle(){
				$USERNAME=$this->session->userdata('USERNAME');
				$data['usrper']=$this->login_m->ReadUserData($USERNAME);
				$this->load->model('lang_m');
				$data['lng']=$this->lang_m->GetAll();
				$this->load->view('admin/articles_add_v',$data);			
		}
		
		function Delete($nid){
				$this->load->model('new_m');
        		$this->new_m->DeleteArticle($nid);
        		$this->session->set_flashdata('msg','Article  Deleted.');
				redirect(base_url().'admin/Articles/');
    }
		
		
		function validate(){
        $this->load->library('form_validation');
    	$this->form_validation->set_rules('subtitle', 'News Title', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('language_id', ' Language Type', 'required|trim|xss_clean|strip_tags');
    	$this->form_validation->set_rules('date', 'News Publish Date', 'required|trim|xss_clean|strip_tags');
		$this->form_validation->set_rules('text', 'News Deatil','xss_clean');
		
        return $this->form_validation->run();
    	}
		
		
		 /*public function do_upload()
        {
                $config['upload_path']          = './uploads/reports';
                $config['allowed_types']        = 'jpg|png|pdf|doc|docx|xls|xlsx';
				$config['encrypt_name'] = true;
                 $this->load->library('upload', $config);
				return $this->upload->do_upload();				
		}*/
		
		
		
		
		function add_article(){
			//$upload_status=$this->do_upload();
			$validate=$this->validate();
			//$error = array('error' => $this->upload->display_errors());
			//$data=$this->upload->data();
			//$file_name=$data['file_name'];
			if($validate == FALSE ){
				$this->AddArticle();
				
			}
			else{
			
			$inputsArray=array(
		    'subtitle'=>$this->input->post('subtitle'),
		  //  'image'=>rtrim($this->input->post('project_report'),','),
			'language_id'=>$this->input->post('language_id'),
		    'date'=>$this->input->post('date'),
			'text'=>$this->input->post('text')
		    );

			$this->load->model('new_m');
			$this->new_m->AddArticle($inputsArray);	
			$this->session->set_flashdata('msg','Article Uploaded Successfully');
        	redirect(base_url().'admin/Articles/');
			}
			
		}
		
		function update_article(){
				$validate=$this->validate();
				if($validate == FALSE ){
				$this->EditArticle($this->input->post('nid'));
				
			}else{
			$nid=$this->input->post('nid');
			$inputsArray=array(
		    'subtitle'=>$this->input->post('subtitle'),
			'language_id'=>$this->input->post('language_id'),
		    'date'=>$this->input->post('date'),
			'text'=>$this->input->post('text')
		    );
			$this->load->model('new_m');
			$this->new_m->UpdateArticle($nid,$inputsArray);	
			$this->session->set_flashdata('msg','Article Updated Successfully');
        	redirect(base_url().'admin/Articles/');
			
			}
		}
		
		
		function SendtoSubscrib($nid){
			
			$this->load->model('subscribe_m');
			$sub=$this->subscribe_m->GetNews();
			$to='';
			foreach($sub as $s){
				
			$to.=$s->cemail.",";
				
			}
			$to=rtrim($to,',');
			$this->load->model('new_m');
			$nws=$this->new_m->GetNews($nid);
			foreach($nws as $n){
			$config = array (
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'priority' => '1'
					);
		$message = "Greetings Mr,<br/><br/>";	
		$message .= "<h4>".$n->subtitle."</h4>";
		//$message .= "<img src='".base_url()."uploads/news/".$n->image."'>";
		$message .= "<p>".$n->text."</p>";
		
		$this->load->library('email',$config);
		$this->email->to($to);				
		$this->email->from('info@dabs.af'); 				
		$this->email->subject("Subscription");
		$this->email->message($message);		

		$this->email->send();		
		$this->session->set_flashdata('msg','Email has been sended to Subscribers');
        redirect(base_url().'admin/News/'); 
										
		
			}
		}
}
?>