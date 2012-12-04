<?php

class m_user extends CI_Model{
	
	var $table = "user";
	var $field_id = "user_name";
	
	function __construct(){
		
	}
	
	function get_user($id,$pass){
		$sql = "SELECT * FROM $this->table WHERE $this->field_id = '$id' AND user_password = md5('$pass')";
		$query = $this->db->query($sql);
		return $query;
	}
}
?>