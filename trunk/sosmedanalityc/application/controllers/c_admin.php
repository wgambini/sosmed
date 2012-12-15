<?php

class c_admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'required');

		$data['form_action'] = "c_admin";

		if ($this->form_validation->run() == false){
			$this->load->view('v_login', $data);
		}else{
			$this->submit_login();
		}
	}

	function submit_login(){
		$admin_id = $this->input->post('user_name');
		$admin_password = md5($this->input->post('user_password'));
		$ini = parse_ini_file("/application/config.ini");
		if($admin_id == $ini['admin_id'] && $admin_password == $ini['admin_password']){
			$ini['user_type'] = "admin";
			$this->session->set_userdata($ini);
			redirect('c_admin/home/');
		}else{
			show_error("error2");
		}
	}

	function home(){
		$this->load->model('m_user');
		$data['rows'] = $this->m_user->get_all()->result();
		$this->load->view('v_admin_header', $data);
	}
	
	function create_member(){
		redirect("c_signup");
	}
	
	function article(){
		$this->load->view("v_admin_article");
	}
}