<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class public_view extends CI_Controller {

	public function index()
	{
		$data['title'] = "Anemia | Home";
        $data['nama_section'] = "Home";
        $data['title_section'] = "Selamat Datang!";
        $data['subtitle_section'] = "This page is just an example for you to create your own page.";
        $this->load->view('header',$data);
            $this->load->view('public/nav-top',$data);
            $this->load->view('public/home',$data);
            $this->load->view('public/nav-bottom',$data);
        $this->load->view('footer',$data);
	}
	public function diagnosa()
	{
		$data['title'] = "Anemia | Diagnosa";
        $data['nama_section'] = "Diagnosa";
        $data['title_section'] = "Mulai Diagnosa";
        $data['subtitle_section'] = "This page is just an example for you to create your own page.";

        $data['content'] = "Cek Gejala";
        $this->load->view('header',$data);
            $this->load->view('public/nav-top',$data);
            $this->load->view('public/diagnosa',$data);
            $this->load->view('public/nav-bottom',$data);
        $this->load->view('footer',$data);
	}
	public function user_register()
	{
		
	}
	
	public function user_history()
	{
		
    }

  
    
}
