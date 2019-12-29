<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_view extends CI_Controller {

	public function index()
	{
		$data['title'] = "Admin | Home";
        $data['nama_section'] = "Home";
        $data['title_section'] = "Selamat Datang!";
        $data['subtitle_section'] = "This page is just an example for you to create your own page.";
        $this->load->view('header',$data);
            $this->load->view('user/side-nav-top',$data);
            $this->load->view('user/home',$data);
            $this->load->view('user/side-nav-bottom',$data);
        $this->load->view('footer',$data);
	}
	
	public function user_login()
	{
		$data['title'] = "Admin | Login";
        $data['nama_section'] = "Login";
        $data['title_section'] = "Selamat Datang!";
        $data['subtitle_section'] = "This page is just an example for you to create your own page.";
        $this->load->view('header',$data);
            $this->load->view('user/auth-login',$data);
        $this->load->view('footer',$data);
	}
	
	public function user_register()
	{
		
	}
	
	public function user_history()
	{
		
    }

  
    
}
