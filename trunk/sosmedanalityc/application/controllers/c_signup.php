<?php

class c_signup extends CI_Controller {

	function index(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Username', 'required|min_length[5]|max_length[12]|is_unique[user.user_name]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[user.user_email]');
		$this->form_validation->set_rules('user_first_name', 'Nama Depan', 'required');
		$this->form_validation->set_rules('user_last_name', 'Nama Belakang', 'required');
		$this->form_validation->set_rules('user_address', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('v_signup');
		}
		else{
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
		$this->load->model('m_user');
		$res = $this->m_user->insert_user($value);
		if($res) redirect('c_login');
		else show_error('Registrasi Gagal');
	}
}
?>