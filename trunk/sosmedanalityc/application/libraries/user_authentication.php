<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Code Igniter AJAX Class
 *
 * This class enables you to check User Authentication with the help of Session.
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    Libraries
 * @author        Aniesh
 * @link        http://www.no-link-yet.com
 */


class user_authentication
{
    private $obj = null;

    function user_authentication(){
        $this->obj =& get_instance();
    }

    function validation($url, $type){
        if(!$this->obj->session->userdata($type))
            redirect($url);
    }

    function logged_in($url, $type){
        if($this->obj->session->userdata($type))
            redirect($url);
    }

}

?> 