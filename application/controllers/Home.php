<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m', 'user');
         $this->load->model('Buku_m', 'buku');
         $this->load->model('Klasifikasi_m', 'klasifikasi');
        $this->load->model('Kategori_m', 'kategori');
        $this->load->model('Sumber_m', 'sumber');
        $this->load->model('Rak_m', 'rak');
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

    public function detail($idbuku)
    {
        $judul=[
            'title'=> "Detail Buku",
            'sub title'=> "",
        ];
        // $data['setting'] = $this->setting;
        $data['katalog'] = $this->db->query("SELECT * FROM buku b left join klasifikasi k on b.kodeklasifikasi=k.kodeklasifikasi where idbuku='$idbuku'")->row_array();
        $this->load->view('frontend/header_detail',$judul);
        $this->load->view('frontend/detail',$data);
        $this->load->view('frontend/footer');
        
    }

}
