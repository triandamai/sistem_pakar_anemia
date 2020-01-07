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


	public function admin_tambah_gejala(){
		if($this->input->post('kirim')){
			$kode = $this->input->post('kodegejala');
			$nama = $this->input->post('namagejala');
			$deskripsi = $this->input->post('deskripsigejala');

			$data = array(
				"id_gejala" => $kode,
				"nama_gejala" => $nama,
				"deskripsi_gejala" => $deskripsi,
				"created_at" => date("Y-m-d H:i:s")
			);

			$gejala = $this->DataModel->insert("gejala",$data);
			if($gejala){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data Berhasil dimasukkan</div>'
				);
				redirect('admin_view/admin_data_gejala');
			}else{
				echo "error";
			}
		}
	}

	public function admin_ubah_gejala(){
		if($this->input->post('kirim')){
			$kode = $this->input->post('id');
			$nama = $this->input->post('namagejala');
			$deskripsi = $this->input->post('deskripsigejala');

			$data = array(
			//	 "id_gejala" => $kode,
				"nama_gejala" => $nama,
				"deskripsi_gejala" => $deskripsi,
				"updated_at" => date("Y-m-d H:i:s")
			);
			//echo json_encode($data);
			//die();
			$gejala = $this->DataModel->update("id_gejala",$kode,"gejala",$data);
			if($gejala){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data Berhasil diubah</div>'
				);
				redirect('admin_view/admin_data_gejala');
			}else{
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">Data gagal diubah</div>'
				);
				redirect('admin_view/admin_data_gejala');
			}
		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">Data gagal diubah!</div>'
			);
			redirect('admin_view/admin_data_gejala');
		}
	}

	public function admin_hapus_gejala(){
		$id = $this->input->get('id');
		
		if($id != null){
			
			$hapus = $this->DataModel->delete('id_gejala',$id,'gejala');
			if($hapus){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data berhasil dihapus</div>'
				);
				redirect('admin_view/admin_data_gejala');
			}else{
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">Data gagal dihapus</div>'
				);
				redirect('admin_view/admin_data_gejala');
			}
		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">Data gagal dihapus!</div>'
			);
			redirect('admin_view/admin_data_gejala');
		}
		
	}

	public function admin_tambah_penyakit(){
		if($this->input->post('kirim')){
			$kode = $this->input->post('kodepenyakit');
			$nama = $this->input->post('namapenyakit');
			$deskripsi = $this->input->post('deskripsipenyakit');
			$solusi = $this->input->post('solusipenyakit');

			$data = array(
				"id_penyakit" => $kode,
				"nama_penyakit" => $nama,
				"deskripsi_penyakit" => $deskripsi,
				"solusi_penyakit" => $solusi,
				"created_at" => date("Y-m-d H:i:s")
			);

			$penyakit = $this->DataModel->insert("penyakit",$data);

			if($penyakit){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data berhasil dimasukkan</div>'
				);
				redirect('admin_view/admin_data_penyakit');
			}else{
				echo "error cuy";
			}

		}
	}

	public function admin_ubah_penyakit(){
		
		if($this->input->post('kirim')){
			$kode = $this->input->post('id');
			$nama = $this->input->post('namapenyakit');
			$deskripsi = $this->input->post('deskripsipenyakit');
			$solusi = $this->input->post('solusipenyakit');

			$data = array(
				"nama_penyakit" => $nama,
				"deskripsi_penyakit" => $deskripsi,
				"solusi_penyakit" => $solusi,
				"updated_at" => date("Y-m-d H:i:s")
			);
			// echo json_encode($data);
			// die();
			$penyakit = $this->DataModel->update("id_penyakit",$kode,"penyakit",$data);

			if($penyakit){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data berhasil diubah</div>'
				);
				redirect('admin_view/admin_data_penyakit');
			}else{
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">Data gagal diubah</div>'
				);
				redirect('admin_view/admin_data_penyakit');
			}
		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">Data gagal diubah(method salah)</div>'
			);
			redirect('admin_view/admin_data_penyakit');
		}
	}

	public function admin_hapus_penyakit(){
		$id = $this->input->get('id');
		
		if($id != null){
			
			$hapus = $this->DataModel->delete('id_penyakit',$id,'penyakit');
			if($hapus){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data berhasil dihapus</div>'
				);
				redirect('admin_view/admin_data_penyakit');
			}else{
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">Data gagal dihapus</div>'
				);
				redirect('admin_view/admin_data_penyakit');
			}
		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">Data gagal dihapus!</div>'
			);
			redirect('admin_view/admin_data_penyakit');
		}
		
	}

}
