<?php

class c_home extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		//$this->user_authentication->validation('c_login', 'member');
	}

	function index(){
		$this->load->view('v_homepage');
	}
	
	function get_request(){
		$this->library->request_token();
	}
}