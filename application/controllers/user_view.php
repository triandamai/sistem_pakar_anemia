<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_view extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
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
