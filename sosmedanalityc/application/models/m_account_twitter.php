<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_account_twitter extends CI_Model {

	var $table = "account_twitter";
	var $field_id = "twitter_id";

	function get_by_account_id($account_id)
	{
		return $this->db->get_where($this->table, array('user_id' => $account_id))->result();
	}

	// --------------------------------------------------------------------

	/**
	 * Get account twitter
	 *
	 * @access public
	 * @param string $twitter_id
	 * @return object account twitter
	 */
	function get_by_twitter_id($twitter_id)
	{
		return $this->db->get_where($this->table, array('twitter_id' => $twitter_id))->row();
	}

	// --------------------------------------------------------------------

	/**
	 * Insert account twitter
	 *
	 * @access public
	 * @param int $account_id
	 * @param int $twitter_id
	 * @param string $oauth_token
	 * @param string $oauth_token_secret
	 * @return void
	 */
	function insert($value)
	{
		if (!$this->get_by_twitter_id($value['twitter_id'])) // ignore insert
		{
			$this->db->insert($this->table, $value);
			return TRUE;
		}
		return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Delete account twitter
	 *
	 * @access public
	 * @param int $twitter_id
	 * @return void
	 */
	function delete($twitter_id)
	{
		$this->db->delete($this->table, array('twitter_id' => $twitter_id));
	}

}


/* End of file account_twitter_model.php */
/* Location: ./application/modules/account/models/account_twitter_model.php */