<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Buku_m', 'buku');
        $this->load->model('Anggota_m', 'anggota');
        $this->load->model('Presensi_m', 'presensi');
        $this->load->model('Kas_m', 'kas');
        $this->load->model('Peminjaman_m', 'peminjaman');
        cekstatuslogin();
    }
    public function index()
    {
        $katalog = $this->buku->getAll()->result_array();
        $guru = $this->anggota->getGuru()->result_array();
        $siswa = $this->anggota->getSiswa()->result_array();
        $pengunjung = $this->presensi->getAll()->result_array();
        $peminjaman = $this->peminjaman->getPeminjaman()->result_array();
        $pengembalian = $this->peminjaman->getPengembalian()->result_array();
        $totalkas = $this->kas->totalKas();
        $data['jkatalog'] = count($katalog);
        $data['jguru'] = count($guru);
        $data['jsiswa'] = count($siswa);
        $data['jpengunjung'] = count($pengunjung);
        $data['totalkas'] = $totalkas;
        $data['jpinjam'] = count($peminjaman);
        $data['jkembali'] = count($pengembalian);
        $data['setting'] = $this->setting;
        $data['title'] = "Dashboard";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer');
    }
}
