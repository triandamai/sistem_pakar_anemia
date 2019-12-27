<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_view extends CI_Controller {

	public function index()
	{
       
    }
    public function admin_login()
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

    public function admin_data_penyakit(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/data-penyakit',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }
    public function admin_tambah_penyakit(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/tambah-penyakit',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }

    public function admin_data_gejala(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/data-gejala',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }
    public function admin_tambah_gejala(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/tambah-gejala',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }

    public function admin_data_saran_penyakit(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/data-saran-penyakit',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }
    public function admin_tambah_saran_penyakit(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/tambah-saran-penyakit',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }

    public function admin_data_user(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/data-user',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }
    public function admin_tambah_user(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/tambah-user',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }
    public function admin_history_user(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/history-user',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }

    public function admin_data_artikel(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/data-artikel',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }
    public function admin_tambah_artikel(){
        $data['title'] = "Admin | Penyakit";
        $this->load->view('header',$data);
            $this->load->view('admin/side-nav-top',$data);
            $this->load->view('admin/tambah-artikel',$data);
            $this->load->view('admin/side-nav-bottom',$data);
        $this->load->view('footer',$data);
    }


    
}
