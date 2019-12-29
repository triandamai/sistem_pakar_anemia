<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_event extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('DataModel');
		$this->load->library('bcrypt');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		if ($this->input->post('kirim')) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->DataModel->getWhere('username', $username);
			$cek = $this->DataModel->getData('user')->row();

			if ($cek != null) {
				if ($this->bcrypt->check_password($password, $cek->password)) {
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

				} else {
					echo "Password yang anda masukkan salah!";
				}
			} else {
				echo "Akun tidak ditemukan";
			}
		}
	}

	public function admin_logout()
	{
		redirect(base_url("index.php/admin_view/admin_login"));
	}
}
