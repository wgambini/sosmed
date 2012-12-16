<?php

class c_admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->user_authentication->validation('c_admin_login', 'admin');
	}

	function index(){
		$this->load->model('m_user');
		$data['rows'] = $this->m_user->get_all()->result();
		$this->load->view('v_admin_header', $data);
	}
	
	function create_member(){
		redirect("c_signup");
	}
	
	function article(){
		redirect("c_article");
	}
	
	function logout(){
		$this->session->sess_destroy();
	}
}