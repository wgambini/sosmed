<?php

class m_user extends CI_Model{
	
	var $table = "user";
	var $field_id = "user_id";
	
	function __construct(){
		
	}
	
	function get_user($id,$pass){
		$sql = "SELECT * FROM $this->table WHERE user_name = '$id' AND user_password = md5('$pass')";
		$query = $this->db->query($sql);
		return $query;
	}
	
	function get_one($id){
		$sql = "SELECT * FROM $this->table WHERE $this->field_id = '$id'";
		$query = $this->db->query($sql);
		return $query;
	}
	
	function get_all(){
		$sql = "SELECT * FROM $this->table";
		$query = $this->db->query($sql);
		return $query;
	}
	
	function insert_user($value){
		$query = $this->db->insert($this->table, $value);
		return $query;
	}
}
?>