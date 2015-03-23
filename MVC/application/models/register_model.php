<?php
class register_model extends CI_Model{
function form_insert($data){
		$this->db->insert('INSERT INTO students (username, password) VALUES ($data->username, $data->password');
	}
}
?>