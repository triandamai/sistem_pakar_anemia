<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_event extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function admin_logout(){
		redirect(base_url("index.php/admin_view/admin_login"));
	}

}
