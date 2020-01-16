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
		if ($this->isLoggedIn()) {
            
        } else {
            redirect('admin_view/admin_login');
        }
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
						"id" => $cek->id_admin,
						"username" => $cek->username,
						"email" => $cek->email,
						"status" => true,
					);
					$this->session->set_userdata('admin_data', $user);
					$this->session->set_userdata('file_manager',true);

				//	die(json_encode($user));
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
		$id = $this->input->post('kodegejala');
		
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

			
			$config['upload_path']          = realpath(APPPATH . '../upload');
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['file_name']            = "Penyakit_".$kode;
			$config['overwrite']			= true;
			$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
	
		$path = $_FILES['fotopenyakit']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('fotopenyakit')) {
				$data = array(
					"id_penyakit" => $kode,
					"foto"=>"Penyakit_".$kode.".".$ext,
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
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-danger mr-auto">Data gagal dimasukkan</div>'
					);
					redirect('admin_view/admin_data_penyakit');
				}
			}else{
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">'.$this->upload->display_errors().'</div>'
				);
				redirect('admin_view/admin_data_penyakit');
			}
			

		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">Gagal</div>'
			);
			redirect('admin_view/admin_data_penyakit');
		}
	}

	public function admin_ubah_penyakit(){
		
		if($this->input->post('kirim')){
			$kode = $this->input->post('id');
			$nama = $this->input->post('namapenyakit');
			$deskripsi = $this->input->post('deskripsipenyakit');
			$solusi = $this->input->post('solusipenyakit');
			$gambar_lama = $this->input->post('gambarlama');
			$nama_file = "";
	

			$config['upload_path']          = realpath(APPPATH . '../upload');
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['file_name']            = "Penyakit_".$kode;
			$config['overwrite']			= true;
			$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
	
			$path = $_FILES['fotopenyakit']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$this->load->library('upload', $config);
			if (!empty($_FILES["fotopenyakit"]["name"])) {
				$nama_file = "Penyakit_".$kode.".".$ext;
			} else {
				$nama_file = $gambar_lama;
			}
	
			if ($this->upload->do_upload('fotopenyakit')) {
				$data = array(
					"nama_penyakit" => $nama,
					"foto" => $nama_file,
					"deskripsi_penyakit" => $deskripsi,
					"solusi_penyakit" => $solusi,
					"updated_at" => date("Y-m-d H:i:s")
				);
				
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
					'<div class="alert alert-danger mr-auto">'.$this->upload->display_errors().'</div>'
				);
				redirect('admin_view/admin_data_penyakit');
			}
		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">Gagal</div>'
			);
			redirect('admin_view/admin_data_penyakit');
		}
			
	}

	public function admin_hapus_penyakit(){
		$id = $this->input->post('kodepenyakit');
		
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

	public function admin_tambah_artikel_full(){

		//die(json_encode($this->session->userdata['admin_data']));
		if ($this->isLoggedIn()) {
		$kode = "";
		$query = $this->db->get('artikel');
        $urutan_surat = $query->num_rows();
        
        if($urutan_surat == 0){
            $urut_surat = 1;
        }else {
            $urut_surat = $urutan_surat+1;
		}
		$kode = sprintf("%03d", $urut_surat);
		$config['upload_path']          = realpath(APPPATH . '../upload');
    	$config['allowed_types']        = 'jpg|png|jpeg';
    	$config['file_name']            = "Artikel_".$kode;
    	$config['overwrite']			= true;
    	$config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

	$path = $_FILES['thumbnail']['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
    	$this->load->library('upload', $config);

    	if ($this->upload->do_upload('thumbnail')) {
			
            $data = array(
				"id_artikel" => "Artikel_".$kode, 
				"isi_artikel" => $this->input->post("isi"),
				"id_admin" => $this->session->userdata['admin_data']['id'],
				"thumbnail" => "Artikel_".$kode.".".$ext,
				"judul_artikel"  => $this->input->post("judul"),
				"created_at" => date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s")
			);
			$simpan = $this->DataModel->insert("artikel",$data);
			if($simpan){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data berhasil ditambah</div>'
				);
				redirect('admin_view/admin_data_artikel');
			}else{
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">Tidak dapat menambahkan data</div>'
				);
				redirect('admin_view/admin_tambah_artikel');
			}
   		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">'.$this->upload->display_errors().'</div>'
			);
			redirect('admin_view/admin_tambah_artikel');
		}
        

    } else {
        redirect('admin_view/admin_login');
	}
	
}
public function admin_hapus_artikel_full(){
	$id = $this->input->post('kodeartikel');
		
		if($id != null){
			
			$hapus = $this->DataModel->delete('id_artikel',$id,'artikel');
			if($hapus){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data berhasil dihapus</div>'
				);
				redirect('admin_view/admin_data_artikel');
			}else{
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">Data gagal dihapus</div>'
				);
				redirect('admin_view/admin_data_artikel');
			}
		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">Data gagal dihapus!</div>'
			);
			redirect('admin_view/admin_data_artikel');
		}
		

}
	public function admin_update_artikel_full(){

		//die(json_encode($this->session->userdata['admin_data']));
		if ($this->isLoggedIn()) {
		$kode = "";
		$query = $this->db->get('artikel');
        $urutan_surat = $query->num_rows();
        
        if($urutan_surat == 0){
            $urut_surat = 1;
        }else {
            $urut_surat = $urutan_surat+1;
		}
		$kode = sprintf("%03d", $urut_surat);
		$config['upload_path']          = realpath(APPPATH . '../upload');
    	$config['allowed_types']        = 'jpg|png|jpeg';
    	$config['file_name']            = "Artikel_".$kode;
    	$config['overwrite']			= true;
    	$config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    	$this->load->library('upload', $config);

    	if ($this->upload->do_upload('thumbnail')) {
			
            $data = array(
				"id_artikel" => "Artikel_".$kode, 
				"isi_artikel" => $this->input->post("isi"),
				"id_admin" => $this->session->userdata['admin_data']['id'],
				"thumbnail" => "Artikel_".$kode,
				"judul_artikel"  => $this->input->post("judul"),
				"created_at" => date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s")
			);
			$simpan = $this->DataModel->insert("artikel",$data);
			if($simpan){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-success mr-auto">Data berhasil ditambah</div>'
				);
				redirect('admin_view/admin_data_artikel');
			}else{
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">Tidak dapat menambahkan data</div>'
				);
				redirect('admin_view/admin_tambah_artikel');
			}
   		}else{
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger mr-auto">'.$this->upload->display_errors().'</div>'
			);
			redirect('admin_view/admin_tambah_artikel');
		}
        

    } else {
        redirect('admin_view/admin_login');
    }
	
}

	public function admin_ubah_password()
	{
		if (isset($this->session->userdata['admin_data'])) {

			$new_pass = $this->input->post('password_baru');
			$cek_pass = $this->input->post('konfirmasi_pass');
			$this->form_validation->set_rules('password_baru', 'Password', 'trim|required|min_length[8]');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata(
					'reset-error',
					'<div class="alert alert-danger mr-auto">Password minimal 8 Karakter.</div>'
				);
				redirect('admin_view/admin_ubah_password');
			}else{
				if($cek_pass === $new_pass){
				
					$dataupdate = array(
						'password' => $new_pass,
						'updated_at' => date("Y-m-d H:i:s")
					);
				//	die(json_encode($dataupdate));
					$update = $this->DataModel->update('id_admin',$this->session->userdata['admin_data']['id'],'admin',$dataupdate);
					if($update){
						$this->session->set_flashdata(
							'login-error',
							'<div class="alert alert-success mr-auto">Ubah Password Berhasil!</div>'
						);
						$sess_array = array(
							'email' => '',
						);
						$this->session->unset_userdata('admin_data', $sess_array);
						redirect('/admin_view/admin_login', 'refresh');
						exit();
						//$this->admin_logout();
					}else{
						$this->session->set_flashdata(
							'reset-error',
							'<div class="alert alert-danger mr-auto">Ubah Password Gagal!</div>'
						);
						redirect("admin_view/admin_ubah_password");
					}
				}else{
					$this->session->set_flashdata(
						'reset-error',
						'<div class="alert alert-danger mr-auto">Konfirmasi password tidak sesuai</div>'
					);
					redirect("admin_view/admin_ubah_password");
				}
			}

			
		}else{
			$this->session->set_flashdata(
				'login-error',
				'<div class="alert alert-danger mr-auto">Tidak bisa merubah password,Kamu sudah logout</div>'
			);
			redirect('admin_view/admin_login');
		}
	}
	function isLoggedIn()
    {
        if ($this->session->userdata('admin_data') != null) {
            return $this->session->userdata['admin_data']['status'];
        } else {
            return false;
        }
    }

}
