<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_event extends CI_Controller
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
						'<div class="alert alert-danger mr-auto">Password salah</div>'
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
		} 
		// else {
		// 	$this->session->set_flashdata(
		// 		'login-error',
		// 		'<div class="alert alert-danger mr-auto">Server Error Coba Lagi</div>'
		// 	);
		// 	redirect("user_view/user_login");
		// }
	}

	public function user_register()
	{
		if ($this->input->post('simpan')) {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$cpassword = $this->input->post('password-confirm');

			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger mr-auto">Password minimal 8 Karakter.</div>'
				);
				redirect('user_view/user_register');
			} else {
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
							"token"	   => base64_encode($username . "_" . $email),
							"created_at" => date("Y-m-d H:i:s")
						);
						$register = $this->DataModel->set_data('id_user', 'UUID()');
						$register = $this->DataModel->insert('user', $data);
						// die(json_encode($register));
						if ($register) {
							if ($this->send_verification($email, base64_encode($username . "_" . $email))) {
								$this->session->set_flashdata(
									'pesan',
									'<div class="alert alert-success mr-auto">Akun berhasil dibuat, untuk dapat melanjutkan silahkan cek email anda.</div>'
								);
							} else {
								$this->session->set_flashdata(
									'pesan',
									$this->email->print_debugger()
									// "<div class='alert alert-danger mr-auto'>Ada masalah pengiriman verifikasi email , Error: '".$this->email->print_debugger(array('headers'));."' </div>"
								);
							}
							redirect('user_view/user_login');
							//echo $this->session->flashdata('pesan');
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

	function user_logout()
	{
		$sess_array = array(
			'email' => '',
		);
		$this->session->unset_userdata('user_data', $sess_array);
		redirect('/user_view/user_login', 'refresh');
		exit();
	}

	private function idKonsultasi()
	{
		$cek = $this->DataModel->selectMax("id_konsultasi");
		$cek = $this->DataModel->getData('konsultasi')->row();
		$no = (int) substr($cek->id_konsultasi, 4, 4);
		$no++;
		$char = "KST-";
		$id = $char . sprintf("%03s", $no);
		return $id;
	}

	private function send_verification($email, $code)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_port' => '465',
			'smtp_user' => 'desiputri875@gmail.com', // informasi rahasia ini jangan di gunakan sembarangan
			'smtp_pass' => '10google1010', // informasi rahasia ini jangan di gunakan sembarangan
			'smtp_crypto' => 'ssl',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$message =     "
                  <html>
                  <head>
                      <title>Verifikasi Akun anda</title>
                  </head>
                  <body>
                      <h2>Terima kasih sudah Mendaftar.</h2>
                      <p>Akun anda:</p>
                      <p>Email: " . $email . "</p>
                      <p>Silahkan klik link berikut untuk memverifikasi akun anda.</p>
                      <h4><a href='" . base_url() . "user/verification?code=" . $code . "'>Verifikasi Akun Saya</a></h4>
                  </body>
                  </html>
                  ";

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($config['smtp_user']);
		$this->email->to($email);
		$this->email->subject('Verifikasi akun');
		$this->email->message($message);

		return $this->email->send();
	}

	function user_diagnosa()
	{
		if ($this->input->post('kirim')) {
			$id_user = $this->session->userdata['user_data']['id'];
			$jawab = $this->input->post('jawab');
			$gejala = $this->input->post('gejala');
			$tanggal = date("Y-m-d H:i:s");
			$cek = $this->session->userdata('diagnosa_data');
			$data_arr = array(
				"id_konsultasi" => $this->idKonsultasi(),
				"id_user" => $id_user,
				"tanggal_konsultasi" => $tanggal,
			);

			// die(json_encode($data));

			if ($gejala == "G1") {
				if ($cek) {
					$sess = array(
						"gejala" => []
					);
				//	$this->session->unset_userdata('diagnosa_data', $sess);
					$this->DataModel->insert('konsultasi', $data_arr);
				}else{
					$this->DataModel->insert('konsultasi', $data_arr);
				}
				$this->session->set_userdata('diagnosa_data',$data_arr);

				if ($jawab == "1") {
					// $data = array(
					// 	"gejala" => array($gejala)
					// );

					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					// $this->session->set_userdata['diagnosa_data'], $data);

					redirect('user_view/user_diagnosa_baru?kode=G2');

				}else{
					redirect('user_view/user_diagnosa_baru?kode=G6');
				}
			}else if($gejala == "G2"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G3');
					// die(json_encode($this->session->userdata['diagnosa_data']));
				}else{
					redirect('user_view/user_diagnosa_baru?kode=G10');
				}
			}else if($gejala == "G3"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G4');
				}else{
					redirect('user_view/user_diagnosa_baru?kode=G16');
				}
			}else if($gejala == "G4"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G5');
				}else{
					redirect('user_view/user_diagnosa_baru?kode=G5');
				}
			}else if($gejala == "G5"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					$this->session->userdata['diagnosa_data']['penyakit'] = "P1";
					// die(json_encode($this->session->userdata()));
					$data = array();
					foreach($this->session->userdata['diagnosa_data']['gejala'] as $row){
						$dataa = array(
							"id_konsultasi" => $this->session->userdata['diagnosa_data']['id_konsultasi'],
							"id_gejala" => $row
						);
						array_push($data,$dataa);
					}
					$penyakit = array(
						"id_penyakit" => $this->session->userdata['diagnosa_data']['penyakit'] = "P1"
					);
					$id_kon = $this->session->userdata['diagnosa_data']['id_konsultasi'];
					$this->DataModel->update("id_konsultasi",$id_kon,"konsultasi",$penyakit);
					$this->DataModel->save_batch("detail_konsultasi",$data);
					//$this->session->unset_userdata['diagnosa_data'];
					redirect('user_view/hasil_diagnosa');
				} else {

					redirect('user_view/hasil_diagnosa');
					// echo "anda juga menderita penyakit 1";
				}
			} elseif ($gejala == "G6") {
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G7');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=G14');
				}
			} elseif ($gejala == "G7") {
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G8');
				}else{
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G21');
				}
			} else if($gejala == "G8"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G9');
				}else{
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G9"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					$this->session->userdata['diagnosa_data']['penyakit'] = "P2";
					$data = array();
					foreach($this->session->userdata['diagnosa_data']['gejala'] as $row){
						$dataa = array(
							"id_konsultasi" => $this->session->userdata['diagnosa_data']['id_konsultasi'],
							"id_gejala" => $row
						);
						array_push($data,$dataa);
					}
					$penyakit = array(
						"id_penyakit" => $this->session->userdata['diagnosa_data']['penyakit']
					);
					$id_kon = $this->session->userdata['diagnosa_data']['id_konsultasi'];
					$this->DataModel->update("id_konsultasi",$id_kon,"konsultasi",$penyakit);
					$this->DataModel->save_batch("detail_konsultasi",$data);
				//	$this->session->unset_userdata['diagnosa_data'];
					redirect('user_view/hasil_diagnosa');
					// die(json_encode($this->session->userdata['diagnosa_data']));
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}

			} else if ($gejala == "G10") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G11');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=G18');
				}
			} else if ($gejala == "G11") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G12');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G12") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G13');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G13") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					$this->session->userdata['diagnosa_data']['penyakit'] = "P3";
					$data = array();
					foreach($this->session->userdata['diagnosa_data']['gejala'] as $row){
						$dataa = array(
							"id_konsultasi" => $this->session->userdata['diagnosa_data']['id_konsultasi'],
							"id_gejala" => $row
						);
						array_push($data,$dataa);
					}
					$penyakit = array(
						"id_penyakit" => $this->session->userdata['diagnosa_data']['penyakit']
					);
					$id_kon = $this->session->userdata['diagnosa_data']['id_konsultasi'];
					$this->DataModel->update("id_konsultasi",$id_kon,"konsultasi",$penyakit);
					$this->DataModel->save_batch("detail_konsultasi",$data);
					// die(json_encode($this->session->userdata['diagnosa_data']));
					// redirect('user_view/user_diagnosa_baru?kode=G13');
					//$this->session->unset_userdata['diagnosa_data'];
					redirect('user_view/hasil_diagnosa');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} elseif($gejala == "G14"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G15');
				}else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} elseif($gejala == "G15"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					$this->session->userdata['diagnosa_data']['penyakit'] = "P4";
					$data = array();
					foreach($this->session->userdata['diagnosa_data']['gejala'] as $row){
						$dataa = array(
							"id_konsultasi" => $this->session->userdata['diagnosa_data']['id_konsultasi'],
							"id_gejala" => $row
						);
						array_push($data,$dataa);
					}
					$penyakit = array(
						"id_penyakit" => $this->session->userdata['diagnosa_data']['penyakit']
					);
					$id_kon = $this->session->userdata['diagnosa_data']['id_konsultasi'];
					$this->DataModel->update("id_konsultasi",$id_kon,"konsultasi",$penyakit);
					$this->DataModel->save_batch("detail_konsultasi",$data);
					//$this->session->unset_userdata['diagnosa_data'];
					// die(json_encode($this->session->userdata['diagnosa_data']));
					redirect('user_view/hasil_diagnosa');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G16") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G17');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G17") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					$this->session->userdata['diagnosa_data']['penyakit'] = "P5";
					$data = array();
					foreach($this->session->userdata['diagnosa_data']['gejala'] as $row){
						$dataa = array(
							"id_konsultasi" => $this->session->userdata['diagnosa_data']['id_konsultasi'],
							"id_gejala" => $row
						);
						array_push($data,$dataa);
					}
					$penyakit = array(
						"id_penyakit" => $this->session->userdata['diagnosa_data']['penyakit'] = "P1"
					);
					$id_kon = $this->session->userdata['diagnosa_data']['id_konsultasi'];
					$this->DataModel->update("id_konsultasi",$id_kon,"konsultasi",$penyakit);
					$this->DataModel->save_batch("detail_konsultasi",$data);
				//	$this->session->unset_userdata['diagnosa_data'];
					// die(json_encode($this->session->userdata['diagnosa_data']));
					redirect('user_view/hasil_diagnosa');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if($gejala == "G18"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G19');
				}else{
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if($gejala == "G19"){
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G20');
				}else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G20") {
				if($jawab == "1"){
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					$this->session->userdata['diagnosa_data']['penyakit'] = "P6";
					// die(json_encode($this->session->userdata['diagnosa_data']));
					$data = array();
					foreach($this->session->userdata['diagnosa_data']['gejala'] as $row){
						$dataa = array(
							"id_konsultasi" => $this->session->userdata['diagnosa_data']['id_konsultasi'],
							"id_gejala" => $row
						);
						array_push($data,$dataa);
					}
					$penyakit = array(
						"id_penyakit" => $this->session->userdata['diagnosa_data']['penyakit']
					);
					$id_kon = $this->session->userdata['diagnosa_data']['id_konsultasi'];
					$this->DataModel->update("id_konsultasi",$id_kon,"konsultasi",$penyakit);
					$this->DataModel->save_batch("detail_konsultasi",$data);
					//$this->session->unset_userdata['diagnosa_data'];
					redirect('user_view/hasil_diagnosa');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G21") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G22');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G22") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					redirect('user_view/user_diagnosa_baru?kode=G23');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			} else if ($gejala == "G23") {
				if ($jawab == "1") {
					$this->session->userdata['diagnosa_data']['gejala'][] = $gejala;
					$this->session->userdata['diagnosa_data']['penyakit'] = "P7";
					$data = array();
					foreach($this->session->userdata['diagnosa_data']['gejala'] as $row){
						$dataa = array(
							"id_konsultasi" => $this->session->userdata['diagnosa_data']['id_konsultasi'],
							"id_gejala" => $row
						);
						array_push($data,$dataa);
					}
					$penyakit = array(
						"id_penyakit" => $this->session->userdata['diagnosa_data']['penyakit']
					);
					$id_kon = $this->session->userdata['diagnosa_data']['id_konsultasi'];
					$this->DataModel->update("id_konsultasi",$id_kon,"konsultasi",$penyakit);
					$this->DataModel->save_batch("detail_konsultasi",$data);
					//$this->session->unset_userdata['diagnosa_data'];
					// die(json_encode($this->session->userdata['diagnosa_data']));
					redirect('user_view/hasil_diagnosa');
				} else {
					redirect('user_view/user_diagnosa_baru?kode=0');
				}
			}
		}
	}

	public function user_ubah_password()
	{
		if (isset($this->session->userdata['user_data'])) {

			$new_pass = $this->input->post('password_baru');
			$cek_pass = $this->input->post('konfirmasi_pass');
			$this->form_validation->set_rules('password_baru', 'Password', 'trim|required|min_length[8]');
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata(
					'reset-error',
					'<div class="alert alert-danger mr-auto">Password minimal 8 Karakter.</div>'
				);
				redirect('user_view/user_ubah_password');
			}else{
				if($cek_pass === $new_pass){
				
					$dataupdate = array(
						'password' => $this->bcrypt->hash_password($new_pass),
						'updated_at' => date("Y-m-d H:i:s")
					);
			
					$update = $this->DataModel->update('id_user',$this->session->userdata['user_data']['id'],'user',$dataupdate);
					if($update){
						$this->session->set_flashdata(
							'login-error',
							'<div class="alert alert-success mr-auto">Ubah Password Berhasil!</div>'
						);
						$this->user_logout();
					}else{
						$this->session->set_flashdata(
							'reset-error',
							'<div class="alert alert-danger mr-auto">Ubah Password Gagal!</div>'
						);
						redirect("user_view/user_ubah_password");
					}
				}else{
					$this->session->set_flashdata(
						'reset-error',
						'<div class="alert alert-danger mr-auto">Konfirmasi password tidak sesuai</div>'
					);
					redirect("user_view/user_ubah_password");
				}
			}

			
		}else{
			$this->session->set_flashdata(
				'login-error',
				'<div class="alert alert-danger mr-auto">Tidak bisa merubah password,Kamu sudah logout</div>'
			);
			redirect('user_view/user_login');
		}
	}
}
