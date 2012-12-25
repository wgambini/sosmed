<?php

class c_login extends CI_Controller{
	
	private $value;

	function __construct(){
		parent::__construct();
		$this->user_authentication->logged_in('c_dashboard', 'user_id');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->init();
	}
	
	function init(){
		$this->value['user_name'] = '';
		$this->value['user_first_name'] = '';
		$this->value['user_last_name'] = '';
		$this->value['user_address'] ='';
		$this->value['user_email'] = '';
	}

	function index()
	{
		if ($this->form_validation->run() == false){
			$this->load->view('v_login', $this->value);
		}else{
			$this->do_login();
		}
	}

	function do_login(){
		$this->form_validation->set_rules('user_name_login', 'Username', 'required');
		$this->form_validation->set_rules('user_password_login', 'Password', 'required');
		
		if ($this->form_validation->run() == false){
			$this->load->view('v_login', $this->value);
		}else{
			$user_name = $_REQUEST['user_name_login'];
			$user_password = $_REQUEST['user_password_login'];
			$this->load->model('m_user');
			$user = $this->m_user->get_user($user_name,$user_password);
			if($user->num_rows()>0){
				$member = $user->result_array();
				$this->session->set_userdata($member[0]);
				redirect('c_dashboard');
			}else{
				show_error("Username atau password salah");
			}
		}
	}

	function do_signup(){
		$this->form_validation->set_rules('user_name', 'Username', 'required|min_length[5]|max_length[12]|is_unique[user.user_name]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[user.user_email]');
		$this->form_validation->set_rules('user_first_name', 'Nama Depan', 'required');
		$this->form_validation->set_rules('user_last_name', 'Nama Belakang', 'required');
		$this->form_validation->set_rules('user_address', 'Alamat', 'required');
		if ($this->form_validation->run() == false){
			$this->load->view('v_login', $this->value);
		}else{
			$this->value['user_name'] = $this->input->post('user_name');
			$this->value['user_first_name'] = $this->input->post('user_first_name');
			$this->value['user_last_name'] = $this->input->post('user_last_name');
			$this->value['user_address'] = $this->input->post('user_address');
			$this->value['user_email'] = $this->input->post('user_email');
			$this->value['user_password'] = md5($this->input->post('user_password'));
			$this->value['payment_method'] = 0;
			$this->value['package_type'] = $this->input->post('package_type');
			$this->load->model('m_user');
			$res = $this->m_user->insert_user($this->value);
			if($res) {
				redirect('c_login');
			}
			else show_error('Registrasi Gagal');
		}
	}

	function update($userid){
		$this->load->model('m_user');
		$user = $this->m_user->get_one($userid)->result_array();
		$this->load->view('v_signup', $user[0]);
	}
}