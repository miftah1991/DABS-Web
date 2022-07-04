<?php
Class logout extends CI_Controller{
	function index()
	{
		$this->session->sess_destroy();
		redirect('login');

	}
}
?>