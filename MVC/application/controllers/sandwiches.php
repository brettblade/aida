<?php

class Sandwiches extends CI_Controller {
	public function index() {
		$this->load->model('getsandwiches', '', TRUE);
		$data['sandwiches'] = $this->getsandwiches->listSandwiches();
		$this->load->view('sandwichlist', $data);
	}
	public function search() {
		$this->load->model('getsandwiches', '', TRUE);
		$search = $this->input->post('search');
		print_r($search);
	}
	public function register() {
		$this->load->model('register_model');
		$data = array(
			'Username' => $this->input->post('dname'),
			'Email' => $this->input->post('demail'),
			'Password1' => $this->input->post('dmobile'),
			'Password2' => $this->input->post('daddress')
	);
	if ($this->input->server('REQUEST_METHOD') === 'POST')
	{
	$this->register_model->form_insert($data);
	}
	$this->load->view('form');

	}
}

?>