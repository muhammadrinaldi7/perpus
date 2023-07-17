<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m', 'user');
         $this->load->model('Buku_m', 'buku');
        $this->setting = $this->settingan->getSetting();
    }

    public function index()
    {
        $judul=[
            'title'=> "Halaman Utama",
            'sub title'=> "",
        ];
        // $data['setting'] = $this->setting;
        $data['katalog'] = $this->buku->getAll()->result_array();
        $this->load->view('frontend/header',$judul);
        $this->load->view('frontend/home',$data);
        $this->load->view('frontend/footer');
        
    }

}
