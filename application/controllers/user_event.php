<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_event extends CI_Controller
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

	public function user_login()
	{
		if ($this->input->post('email')) {
			$username = $this->input->post('email');
			$password = $this->input->post('password');

			$cek = $this->DataModel->getWhere('email', $username);
			$cek = $this->DataModel->getData('user')->row();

			if ($cek != null) {
				if($this->bcrypt->check_password($password,$cek->password)){
				// if ($cek->password == $password) {
					$datas = array(
						"updated_at" => date("Y-m-d H:i:s")
					);

					$this->DataModel->update('id_user', $cek->id_user, 'user', $datas);

					$user = array(
						"id" => $cek->id_user,
						"username" => $cek->username,
						"email" => $cek->email,
						"status" => true,
					);
					$this->session->set_userdata('user_data', $user);

					//kie bar di redirect maring view apa pwe?
					//aku bingung hehe
					//A: mng halaman user_view/index
					redirect("user_view");
				} else {
					$this->session->set_flashdata(
						'login-error',
						'<div class="alert alert-danger mr-auto">Login Gagal</div>'
					);
					redirect("user_view/user_login");
				}
			} else {
				$this->session->set_flashdata(
					'login-error',
					'<div class="alert alert-danger mr-auto">Akun tidak ditemukan</div>'
				);
				redirect("user_view/user_login");
			}
		} else {
			$this->session->set_flashdata(
				'login-error',
				'<div class="alert alert-danger mr-auto">Server Error Coba Lagi</div>'
			);
			redirect("user_view/user_login");
		}
	}

	public function user_register()
	{
		if ($this->input->post('simpan')) {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$cpassword = $this->input->post('password-confirm');

			$cek = $this->DataModel->select(array("username", "email"));
			$cek = $this->DataModel->get_whereArr("user", "username = '" . $username . "' or email = '" . $email . "'")->row();
			if ($cek != null) {
				if ($cek->username == $username) {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-danger mr-auto">Username yang anda masukkan sudah ada.</div>'   //tambaih dimissable yan
					);
					redirect('user_view/user_register');
				} else if ($cek->email == $email) {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-danger mr-auto">Email yang anda masukkan sudah ada.</div>'
					);
					redirect('user_view/user_register');
				}
			} else {
				if ($password == $cpassword) {
					$data = array(
						"username" => $username,
						"email"    => $email,
						"password" => $this->bcrypt->hash_password($password),
						"created_at" => date("Y-m-d H:i:s")
					);

					$register = $this->DataModel->set_data('id_user', 'UUID()');
					$register = $this->DataModel->insert('user', $data);

					if ($register) {
						$this->session->set_flashdata(
							'pesan',
							'<div class="alert alert-danger mr-auto">Akun berhasil dibuat, anda dapat melanjutkan untuk login</div>'
						);
						echo $this->session->flashdata('pesan');
					} else {
						$this->session->set_flashdata(
							'pesan',
							'<div class="alert alert-danger mr-auto">Ada Kesalahan server.</div>'
						);
						redirect('user_view/user_register');
					}
				} else {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-danger mr-auto">Password yang anda masukkan tidak sama.</div>'
					);
					redirect('user_view/user_register');
				}
			}
		}
	}
}
