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
            $data['title'] = "Admin | Home";
            $data['nama_section'] = "Home";
            $data['title_section'] = "Selamat Datang!";
            $data['subtitle_section'] = "This page is just an example for you to create your own page.";
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
        }else{
            $data['title'] = "Admin | Login";
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
        $data['title'] = "Admin | Daftar";
        $data['nama_section'] = "Membuat Akun";
        $data['title_section'] = "Selamat Datang!";
        $data['subtitle_section'] = "This page is just an example for you to create your own page.";
        $this->load->view('header',$data);
            $this->load->view('user/auth-register',$data);
        $this->load->view('footer',$data);
	}
	
	public function user_history()
	{
		if ($this->isLoggedIn()) {
           
            $data['title'] = "User | History";
            $data['nama_section'] = "History";
            $data['title_section'] = "Daftar Diagnosa";
            $data['subtitle_section'] = "This page is just an example for you to create your own page.";
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
            $data['subtitle_section'] = "This page is just an example for you to create your own page.";
           
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
            $data['subtitle_section'] = "This page is just an example for you to create your own page.";
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
    public function user_profil()
	{
		
    }
    public function user_ubah_password()
	{
		
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
