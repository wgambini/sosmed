<?php

class c_login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	function show_login_form(){
		$this->load->helper(array('form', 'url'));
		$this->load->view('v_login');
	}
	
	function do_login(){
		if ($this->form_validation->run() == FALSE)
			$this->load->view('v_login');
		else{
			$user_name = $_REQUEST['user_name'];
			$user_password = $_REQUEST['user_password'];
			$this->load->model('m_user');
			$user = $this->m_user->get_user($user_name,$user_password);
			if($user->num_rows()>1){
				$this->session->set_userdata($user->row());
				redirect('/home');
			}else
				$this->load->view('v_login');
				
		}
		
	}
}