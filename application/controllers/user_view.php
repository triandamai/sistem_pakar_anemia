<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_view extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("DataModel");
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "User | Home";
            $data['nama_section'] = "Home";
            $data['title_section'] = "Selamat Datang!";
            $data['subtitle_section'] = "Halaman utama user Sistem Pakar.";
            $this->load->view('header', $data);
                $this->load->view('user/side-nav-top', $data);
                $this->load->view('user/home', $data);
                $this->load->view('user/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        }else{
            redirect('user_view/user_login');
        }
    }

    public function user_login()
    {
        if ($this->isLoggedIn()) {
            redirect('user_view/index');
        } else {
            // die(json_encode($this->session->userdata()));   
            $data['title'] = "User | Login";
            $data['nama_section'] = "Login";
            $data['title_section'] = "Selamat Datang!";
            $data['subtitle_section'] = "This page is just an example for you to create your own page.";
            $this->load->view('header', $data);
                $this->load->view('user/auth-login', $data);
            $this->load->view('footer', $data);
        }
    }

    public function user_register()
    {
        $data['title'] = "User | Daftar";
        $data['nama_section'] = "Membuat Akun";
        $data['title_section'] = "Selamat Datang!";
        $data['subtitle_section'] = "This page is just an example for you to create your own page.";
        $this->load->view('header', $data);
        $this->load->view('user/auth-register', $data);
        $this->load->view('footer', $data);
    }

    public function user_verification()
    {
        $data['title'] = "User | Verifikasi";
        $data['nama_section'] = "Verifikasi Akun";
        $data['title_section'] = "Selamat Datang!";
        $data['subtitle_section'] = "This page is just an example for you to create your own page.";
        $this->load->view('header', $data);
            $this->load->view('public/nav-top', $data);
            $this->load->view('user/auth-verification', $data);
        $this->load->view('footer', $data);
    }

    public function user_history()
    {
        if ($this->isLoggedIn()) {

            $data['title'] = "User | History";
            $data['nama_section'] = "History";
            $data['title_section'] = "Daftar Diagnosa";
            $data['subtitle_section'] = "Daftar history diagnosa.";
            // $riwayat = $this->DataModel->getJoin("detail_konsultasi","detail_konsultasi.id_konsultasi = konsultasi.id_konsultasi","inner");
            $riwayat = $this->DataModel->getWhere("konsultasi.id_user",$this->session->userdata['user_data']['id']);
            $riwayat = $this->DataModel->getData("konsultasi")->result_array();
            $data['riwayat'] = $riwayat;
            $this->load->view('header', $data);
            $this->load->view('user/side-nav-top', $data);
            $this->load->view('user/history-diagnosa', $data);
            $this->load->view('user/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('user_view/index');
        }
    }

    public function user_data_penyakit()
	{
        if ($this->isLoggedIn()) {
           
            $data['title'] = "User | Penyakit";
            $data['nama_section'] = "Penyakit";
            $data['title_section'] = "Data Penyakit";
            $data['subtitle_section'] = "Kumpulan data Penyakit.";
            $data['penyakit'] = $this->DataModel->getData("penyakit")->result_array();

            $this->load->view('header', $data);
            $this->load->view('user/side-nav-top', $data);
            $this->load->view('user/data-penyakit', $data);
            $this->load->view('user/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('user_view/index');
        }
    }

    public function user_diagnosa_baru()
    {
        if ($this->isLoggedIn()) {
            $gejala = "";
            $id = $this->input->get('kode');

            if($id == null){
                $gejala = $this->DataModel->getWhere("id_gejala","G1");
            }else{
                $gejala = $this->DataModel->getWhere("id_gejala",$id);
            }
            $gejala = $this->DataModel->getData("gejala")->row();
            $data['title'] = "User | Diagnosa";
            $data['nama_section'] = "Diagnosa";
            $data['title_section'] = "Diagnosa Penyakit";
            $data['subtitle_section'] = "Buat diagnosa baru.";
            $data['gejala'] = $gejala;
            $this->load->view('header', $data);
            $this->load->view('user/side-nav-top', $data);
            $this->load->view('user/diagnosa', $data);
            $this->load->view('user/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('user_view/index');
        }
    }

    public function hasil_diagnosa()
    {
        if ($this->isLoggedIn()) {
            $id_kst = $this->input->get('id');

            if ($id_kst != null) {
                $id_kst = $id_kst;
            } else {
                $id_kst = $this->session->userdata['diagnosa_data']['id_konsultasi'];
            }

            // die(json_encode($id_kst));
            // }
            // if($this->session->userdata['diagnosa_data'] != null){
            $data['title'] = "User | Diagnosa";
            $data['nama_section'] = "Hasil Diagnosa";
            $data['title_section'] = "Diagnosa Penyakit";
            $data['subtitle_section'] = "Hasil proses diagnosa.";
            // $id_kst = $this->input->get('id');
            $gejala = $this->DataModel->getJoin('detail_konsultasi', 'konsultasi.id_konsultasi = detail_konsultasi.id_konsultasi', 'inner');
            $gejala = $this->DataModel->getJoin('gejala', 'detail_konsultasi.id_gejala = gejala.id_gejala', 'inner');
            $gejala = $this->DataModel->getWhere('konsultasi.id_konsultasi', $id_kst);
            // $gejala = $this->DataModel->getWhere('id_user',$this->session->userdata['user_data']['id']);
            $gejala = $this->DataModel->getData('konsultasi')->result_array();

            $penyakit = $this->DataModel->getJoin('penyakit', 'konsultasi.id_penyakit = penyakit.id_penyakit', 'inner');
            $penyakit = $this->DataModel->getWhere('konsultasi.id_konsultasi', $id_kst);
            $penyakit = $this->DataModel->getData('konsultasi')->row();

            $data['gejala'] = $gejala;
            $data['penyakit'] = $penyakit;
            // die(json_encode($data));
            // $penyakit = $this->DataModel->
            // $data['gejala'] = $this->session->userdata['diagnosa_data']['gejala'];
            // die(json_encode($this->session->userdata['diagnosa_data']));
            $this->load->view('header', $data);
            $this->load->view('user/side-nav-top', $data);
            $this->load->view('user/hasil_diagnosa');
            $this->load->view('user/side-nav-bottom', $data);
            $this->load->view('footer', $data);
            // }
        } else {
            redirect('user_view/index');
        }
    }
    

    public function user_profil()
	{
		if ($this->isLoggedIn()) {
            $data['title'] = "User | Profil";
            $data['nama_section'] = "Profil";
            $data['title_section'] = "Selamat Datang!";
            $data['subtitle_section'] = "Halaman Profil.";
            $this->load->view('header', $data);
                $this->load->view('user/side-nav-top', $data);
                $this->load->view('user/profil', $data);
                $this->load->view('user/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        }else{
            redirect('user_view/user_login');
        }
    }
    public function user_ubah_password()
	{
		if ($this->isLoggedIn()) {
            
            $data['title'] = "User | Ubah Password";
            $data['nama_section'] = "Ubah Password";
            $data['title_section'] = "Selamat Datang!";
            $data['subtitle_section'] = "This page is just an example for you to create your own page.";
            $this->load->view('header', $data);
                $this->load->view('user/reset-password', $data);
            $this->load->view('footer', $data);
        }else{
            redirect('user_view/login');
        }
    }
    public function user_about()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "User | About";
            $data['nama_section'] = "About";
            $data['title_section'] = "Credit";
            $data['subtitle_section'] = "Terimakasih kepada para pembuat plugin dan framework ini sehingga aplikasi sistem pakar saya bisa selesai";
            $this->load->view('header', $data);
                $this->load->view('user/side-nav-top', $data);
                $this->load->view('admin/about', $data);
                $this->load->view('user/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }
    function isLoggedIn()
    {
        if ($this->session->userdata('user_data') != null) {
            return $this->session->userdata['user_data']['status'];
        } else {
            return false;
        }
    }
}

