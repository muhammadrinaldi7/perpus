<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        // $this->load->model('Jabatan_m', 'jabatan');
        $this->load->model('Anggota_m', 'anggota');
        $this->load->model('Jabatan_m', 'jabatan');
        $this->load->model('Kelas_m', 'kelas');
        $this->load->model('Presensi_m', 'presensi');
        $this->load->model('Buku_m', 'buku');
        $this->load->model('Kas_m', 'kas');
        cekstatuslogin();
        cekroleadmin();
    }
    public function guru()
    {
        $data['guru'] = $this->anggota->getGuru()->result_array();
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdataguru', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    public function siswa()
    {
        $data['siswa'] = $this->anggota->getSiswa()->result_array();
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatasiswa', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    public function pengunjung()
    {
        $data['p'] = $this->presensi->getAll()->result_array();
        // var_dump($data['p']);exit;
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatapengunjung', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    public function peminjaman()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Peminjaman';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/laporan_peminjaman', $data);
        $this->load->view('template/footer');
    }
    public function pengembalian()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Pengembalian';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/laporan_pengembalian', $data);
        $this->load->view('template/footer');
    }
    public function kas()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Kas';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/laporan_kas', $data);
        $this->load->view('template/footer');
    }
    public function katalog()
    {
        $data['katalog'] = $this->buku->getAll()->result_array();
        // var_dump($data['p']);exit;
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatakatalog', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    
}
