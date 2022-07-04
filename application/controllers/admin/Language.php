<?php
Class Language extends CI_Controller{
    
    function index(){
        $this->load->model('lang_m');
	$dat['langs']=$this->lang_m->GetAll();
        $this->load->view('admin/lang_v',$dat);
    }
    function AddLanguage(){
        $this->load->view('admin/lang_add_v');
    }
    function Edit($id){
        $this->load->model('lang_m');
        $data['fields']=$this->lang_m->get_lang($id);
        $this->load->view('admin/lang_edit_v',$data);
    }
    function validate(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('language', 'Language', 'required|trim|xss_clean|strip_tags');
	$this->form_validation->set_rules('code', 'Language Code','required|trim|xss_clean|strip_tags');
        return $this->form_validation->run();
    }
    function new_language(){
        $check=$this->validate();
	if ($check == FALSE)
            {
	    $this->load->view('admin/lang_add_v');
            }
	    else {
                $this->load->model('lang_m');
                $inputsArray=array(
		    'language'=>$this->input->post('language'),
		    'code'=>$this->input->post('code'),
                    'alignment'=>$this->input->post('alignment'),
                    'align'=>$this->input->post('align'),
                    'default_language'=>$this->input->post('default_language'),
                    'visible'=>$this->input->post('visible')
                    );
		
	$id=$this->lang_m->Addrec($inputsArray);
             if($this->input->post('default_language')==1){
                $this->lang_m->SetDefault($id);   
                }                
        $this->session->set_flashdata('msg','\''.$this->input->post('language').'\' has been added.');
	redirect(base_url().'admin/Language/');
                }
    }
    function update(){
        $check=$this->validate();
	if ($check == FALSE)
            {
	    $this->load->model('lang_m');
            $data['fields']=$this->lang_m->get_lang($id);
            $this->load->view('admin/lang_edit_v',$data);
            }
	    else {
                $this->load->model('lang_m');
                $inputsArray=array(
		    'language'=>$this->input->post('language'),
		    'code'=>$this->input->post('code'),
                    'alignment'=>$this->input->post('alignment'),
                    'align'=>$this->input->post('align'),
                    'default_language'=>$this->input->post('default_language'),
                    'visible'=>$this->input->post('visible')
                    );
	$l_id=$this->input->post('language_id');	
	$id=$this->lang_m->update_rec($l_id,$inputsArray);
             if($this->input->post('default_language')==1){
                $this->lang_m->SetDefault($l_id);   
                }                
        $this->session->set_flashdata('msg','\''.$this->input->post('language').'\' has been Updated.');
	redirect(base_url().'admin/Language/');
                }
    }
    function Delete($l_id){
        $this->load->model('lang_m');
        $this->lang_m->delete_rec($l_id);
        $this->session->set_flashdata('msg','Language Deleted.');
	redirect(base_url().'admin/Language/');
    }
    
    
    
    
    
}
?>