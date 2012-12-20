<?php

class c_dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->user_authentication->validation('c_login', 'member');
	}

	function index(){
		$this->load->view('v_dashboard');
	}
	
	function get_request(){
		$this->library->request_token();
	}
}
?>