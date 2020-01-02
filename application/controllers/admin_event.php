<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_event extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('DataModel');
		$this->load->library('bcrypt');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function admin_login()
	{
		if ($this->input->post('kirim')) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$cek = $this->DataModel->getWhere('email', $email);
			$cek = $this->DataModel->getData('admin')->row();

			if ($cek != null) {
				// if ($this->bcrypt->check_password($password, $cek->password)) {
				if ($cek->password == $password) {
					$datas = array(
						"updated_at" => date("Y-m-d H:i:s")
					);

					$this->DataModel->update('id_admin', $cek->id_admin, 'admin', $datas);

					$user = array(
						"id" => $cek->id_user,
						"username" => $cek->username,
						"email" => $cek->email,
						"status" => true,
					);
					$this->session->set_userdata('admin_data', $user);

					//kie bar di redirect maring view apa pwe?
					//aku bingung hehe
					redirect('admin_view');

				} else {
					$this->session->set_flashdata(
						'login-error',
						'<div class="alert alert-danger mr-auto">Password salah</div>'
					);
					redirect('admin_view/admin_login');
				}
			} else {
				$this->session->set_flashdata(
					'login-error',
					'<div class="alert alert-danger mr-auto">Akun tidak ditemukan</div>'
				);
				redirect('admin_view/admin_login');
			}
		}
	}


	public function admin_logout()
	{
		$sess_array = array(
			'email' => '',
		);
		$this->session->unset_userdata('admin_data', $sess_array);
		redirect('/admin_view/admin_login', 'refresh');
		exit();
	}
}
