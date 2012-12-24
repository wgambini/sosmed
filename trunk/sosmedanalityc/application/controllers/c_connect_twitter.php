<?php /* 

class c_connect_twitter extends CI_Controller {

function __construct(){
parent::__construct();
$this->load->helper(array('language', 'ssl', 'url', 'library'));
}

function index(){
maintain_ssl($this->config->item('ssl_enable'));
$library = new Twitter();
$retarr = $library->get_request_token();
if (!empty($retarr)) {
list($info, $headers, $body, $body_parsed) = $retarr;
if ($info['http_code'] == 200 && !empty($body)) {
//if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == ""){
header("Location : https://api.twitter.com");
//}
}
}
}
} */

/** Connect_twitter Controller */

class c_connect_twitter extends CI_Controller {

	/**
	 * Constructor */

	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->config('account', 'twitter');
		$this->load->helper(array('language', 'ssl', 'url', 'oauth', 'date'));
		$this->load->library(array('authentication', 'twitter_lib'));
		$this->load->model(array('m_account_twitter'));
	}

	function index()
	{
		// Enable SSL?
		maintain_ssl($this->config->item("ssl_enabled"));

		if ($this->input->get('oauth_token'))
		{
			try
			{
				// Perform token exchange
				$this->twitter_lib->etw->setToken($this->input->get('oauth_token'));
				$twitter_token = $this->twitter_lib->etw->getAccessToken();
				$this->twitter_lib->etw->setToken($twitter_token->oauth_token, $twitter_token->oauth_token_secret);

				// Get account credentials
				$twitter_info = $this->twitter_lib->etw->get_accountVerify_credentials()->response;
			}
			catch (Exception $e)
			{
				$this->authentication->is_signed_in() ?
				redirect('account/account_linked') :
				redirect('account/sign_up');
			}

			// Check if user has connect twitter to a3m
			if ($user = $this->m_account_twitter->get_by_twitter_id($twitter_info['id']))
			{
				// Check if user is not signed in on a3m
				if (!$this->authentication->is_signed_in())
				{
					// Run sign in routine
					$this->authentication->sign_in($user->user_id);
				}
				$user->user_id === $this->session->userdata('user_id') ?
				$this->session->set_flashdata('linked_error', sprintf(lang('linked_linked_with_this_account'), lang('connect_twitter'))) :
				$this->session->set_flashdata('linked_error', sprintf(lang('linked_linked_with_another_account'), lang('connect_twitter')));
				redirect('c_dashboard');
			}
			// The user has not connect twitter to a3m
			else
			{
				{
					$value['user_id'] = $this->session->userdata('member');
					$value['twitter_id'] = $twitter_info['id'];
					$value['oauth_token'] = $twitter_token->oauth_token;
					$value['oauth_token_secret'] = $twitter_token->oauth_token_secret;
					$value['linkedon'] = mdate('%Y-%m-%d %H:%i:%s', now());
					$this->m_account_twitter->insert($value);
					$this->session->set_flashdata('linked_info', sprintf(lang('linked_linked_with_your_account'), lang('connect_twitter')));
					redirect('c_dashboard');
				}
			}
		}
		header("Location: ".$this->twitter_lib->etw->getAuthorizeUrl());
	}
}

/* End of file connect_twitter.php */
/* Location: ./application/modules/account/controllers/connect_twitter.php */