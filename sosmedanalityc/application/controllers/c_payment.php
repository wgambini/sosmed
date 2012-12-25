<?php

class c_payment extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->user_authentication->logged_in('c_admin', 'admin');
		$this->load->helper(array('paypal/class/paypal'));
	}

	function index(){
		$this->load->view('v_payment');
	}

	function do_payment(){
		$amount = $this->input->get('amount');
		$r = new PayPal();
		$r->doExpressCheckout($amount, 'Da Greatest Library You Ever Seen');
		$final = $r->doPayment();
		if ($final['ACK'] == 'Success') {
			echo 'Succeed!';
		} else {
			echo 'Error!';
		}
	}
}
?>