<?php

class c_signup extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$value['user_name'] = '';
		$value['user_first_name'] = '';
		$value['user_last_name'] = '';
		$value['user_address'] ='';
		$value['user_email'] = '';
		$value['user_status'] = 1;
		$value['user_type'] = 1;

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_signup', $value);
		}else{
			$this->do_signup();
		}
	}
	
	function do_signup(){
		$value['user_name'] = $this->input->post('user_name');
		$value['user_first_name'] = $this->input->post('user_first_name');
		$value['user_last_name'] = $this->input->post('user_last_name');
		$value['user_address'] = $this->input->post('user_address');
		$value['user_email'] = $this->input->post('user_email');
		$value['user_password'] = md5($this->input->post('user_password'));
		$value['user_status'] = 1;
		$value['user_type'] = 1;
		$this->load->model('m_user');
		$res = $this->m_user->insert_user($value);
		if($res) {
			switch($this->session->userdata('user_type')){
				case "admin": redirect('c_admin'); break;
				case "member" : redirect('c_login'); break;
			}
		}
		else show_error('Registrasi Gagal');
	}
	
	function update($userid){
		$this->load->model('m_user');
		$user = $this->m_user->get_one($userid)->result_array();
		$this->load->view('v_signup', $user[0]);
	}
}
?>