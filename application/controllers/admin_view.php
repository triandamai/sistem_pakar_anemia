<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_view extends CI_Controller {

	public function index()
	{
        $data['title'] = "Admin | Login";
        $this->load->view('header',$data);
            $this->load->view('admin/auth-login',$data);
        $this->load->view('footer',$data);
    }

    public function admin_dashboard(){
        $data['title'] = "Admin | Home";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/home',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }
    
}
