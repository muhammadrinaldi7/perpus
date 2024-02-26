<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Bukuhilang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Buku_m', 'buku');
        $this->load->model('Klasifikasi_m', 'klasifikasi');
        $this->load->model('Kategori_m', 'kategori');
        $this->load->model('Sumber_m', 'sumber');
        $this->load->model('Rak_m', 'rak');
        $this->load->model('Bukuhilang_m', 'bukuhilang');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = "Buku Hilang";
        $data['katalog'] = $this->bukuhilang->getAll()->result_array();
        $data['bukuh'] = $this->db->query('SELECT * FROM buku_hilang bh 
        LEFT JOIN buku b ON b.idbuku = bh.idbuku 
        LEFT JOIN anggota a ON a.idanggota = bh.idanggota
        LEFT JOIN peminjaman p ON p.idpinjam = bh.idpinjam')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/bukuhilang', $data);
        $this->load->view('template/footer');
    }
   public function haltambahdata(){
    $data['setting'] = $this->setting;
    $data['title'] = "Buku Hilang";
    $data['buku'] = $this->db->query('SELECT * FROM buku')->result_array();
    $data['anggota'] = $this->db->query('SELECT * FROM anggota')->result_array();
    $idLast = $this->bukuhilang->getLast();
        if ($idLast == '') {
            $data['id'] = 1;
        } else {
            $data['id'] = $idLast['id'] + 1;
        }
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('admin/tambahbukuhilang', $data);
    $this->load->view('template/footer');
   }
}
