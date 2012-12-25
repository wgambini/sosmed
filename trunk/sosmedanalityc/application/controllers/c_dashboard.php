<?php

class c_dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->user_authentication->validation('c_home', 'member');
	}

	function index(){
		$this->load->view('v_dashboard',$this->session->all_userdata());
	}
	
	function get_request(){
		$this->library->request_token();
	}
	
	function do_signout(){
		$this->session->sess_destroy();
		redirect('c_home');
	}
}
?>