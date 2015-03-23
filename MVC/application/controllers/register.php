
<?php
class Register extends CI_Controller {
function index()
{
	$this->load->model('register_model');
	$data = array(
		'Username' => $this->input->post('dname'),
		'Email' => $this->input->post('demail'),
		'Password1' => $this->input->post('dmobile'),
		'Password2' => $this->input->post('daddress')
);
$this->register_model->form_insert($data);
$this->load->view('form');

}
}
?>