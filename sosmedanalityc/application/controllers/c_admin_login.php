<?php

class c_admin_login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->user_authentication->logged_in('c_admin', 'admin');
	}

	function index()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'required');

		$data['form_action'] = "c_admin_login";

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
			$ini['admin'] = "admin";
			$this->session->set_userdata($ini);
			redirect('c_admin');
		}else{
			show_error("error2");
		}
	}
}
?>