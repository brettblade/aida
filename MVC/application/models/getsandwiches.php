<?php

class Getsandwiches extends CI_Model {
	public function listSandwiches() {

		$query = $this->db->query('SELECT * FROM ProjectProducts');

		foreach ($query->result() as $row)
			{
			    $data[] =  $row;
			}
		return $data;
	}
}

?>