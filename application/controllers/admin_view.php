<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_view extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | Home";
            $data['nama_section'] = "Home";
            $data['title_section'] = "Selamat Datang!";
            $data['subtitle_section'] = "Halaman utama admin Sistem Pakar Anemia.";
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/home', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }
    public function admin_login()
    {
        if ($this->isLoggedIn()) {
            redirect('admin_view');
        } else {
            $data['title'] = "Admin | Login";
            $this->load->view('header', $data);
                $this->load->view('admin/auth-login', $data);
            $this->load->view('footer', $data);
        }
    }

    public function admin_data_penyakit()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | Penyakit";
            $data['nama_section'] = "Data Penyakit";
            $data['title_section'] = "Menampilkan Data Penyakit";
            $data['subtitle_section'] = "Halaman ini menampilkan data-data penyakit yang sudh diinputkan oleh admin.";
            $penyakit = $this->DataModel->order_by("LENGTH(id_penyakit)","id_penyakit");
            $penyakit = $this->DataModel->getData('penyakit')->result_array();
            $data['penyakit'] = $penyakit;
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/data-penyakit', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }
    public function admin_tambah_penyakit()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | Penyakit";
            $data['nama_section'] = "Tambah Penyakit";
            $data['title_section'] = "Menambahkan Penyakit";
            $data['subtitle_section'] = "Silahkan isi form dibawah untuk menambahkan penyakit.";
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/tambah-penyakit', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }

    public function admin_data_gejala()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | Gejala";
            $data['nama_section'] = "Data Gejala";
            $data['title_section'] = "Menampilkan Data Gejala";
            $data['subtitle_section'] = "Halaman menampilkan data-data gejala.";
            $gejala = $this->DataModel->order_by("LENGTH(id_gejala)","id_gejala");
            $gejala =  $this->DataModel->getData('gejala')->result_array();
            $data['gejala'] = $gejala;
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/data-gejala', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }

    
    public function admin_tambah_gejala()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | Gejala";
            $data['nama_section'] = "Tambah Gejala";
            $data['title_section'] = "Menambahkan Gejala";
            $data['subtitle_section'] = "Silahkan mengisi form untuk menambahkan data gejala.";
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/tambah-gejala', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }

    

    public function admin_data_user()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | User";
            $data['nama_section'] = "Data User";
            $data['title_section'] = "Menampilkan Data User";
            $data['subtitle_section'] = "Menampilka data-data User.";
            $data['user'] = $this->DataModel->getData('user')->result_array();
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/data-user', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }
    public function admin_tambah_user()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | User";
            $data['nama_section'] = "Tambah User";
            $data['title_section'] = "Menambahkan User";
            $data['subtitle_section'] = "Silahkan mengisi form untuk menambahkan data gejala.";
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/tambah-user', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }
    public function admin_history_user()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | Penyakit";
            $data['nama_section'] = "History User";
            $data['title_section'] = "Daftar History Diagnosa";
            $data['subtitle_section'] = "Daftar hasil diagnosa user";
            $history = $this->DataModel->getJoin("user","konsultasi.id_user = user.id_user","inner");
            $history = $this->DataModel->getData("konsultasi")->result_array();
            $data['konsultasi'] = $history;

            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/history-user', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }

    public function admin_data_artikel()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | Penyakit";
            $data['nama_section'] = "Data Artikel";
            $data['title_section'] = "Menampilkan Data Artikel";
            $data['subtitle_section'] = "Menampilkan data-data artikel.";
            $data['artikel'] = $this->DataModel->getData('artikel')->result_array();
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/data-artikel', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }
    public function admin_tambah_artikel()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | Penyakit";
            $data['nama_section'] = "Tambah Artikel";
            $data['title_section'] = "Menambahkan Artikel";
            $data['subtitle_section'] = "Silahkan mengisi form untuk menambahkan data gejala.";
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/tambah-artikel', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
            redirect('admin_view/admin_login');
        }
    }
    public function admin_about()
    {
        if ($this->isLoggedIn()) {
            $data['title'] = "Admin | About";
            $data['nama_section'] = "About";
            $data['title_section'] = "Credit";
            $data['subtitle_section'] = "Terimakasih kepada para pembuat plugin dan framework ini sehingga aplikasi sistem pakar saya bisa selesai";
            $this->load->view('header', $data);
                $this->load->view('admin/side-nav-top', $data);
                $this->load->view('admin/about', $data);
                $this->load->view('admin/side-nav-bottom', $data);
            $this->load->view('footer', $data);
        } else {
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
