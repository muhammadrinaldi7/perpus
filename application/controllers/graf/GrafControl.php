<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GrafControl extends CI_Controller
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
        $this->load->model('Graf_m', 'graf');
        cekstatuslogin();
    }
    public function index()
    {   
        $data['tahun1'] = $this->db->query("SELECT DATE_FORMAT(p.tglpinjam, '%Y') tahun FROM `peminjaman` p GROUP BY DATE_FORMAT(p.tglpinjam, '%Y');")->result();
        //$data['tahun1'] = $this->db->query("SELECT DATE_FORMAT(DATE_ADD('2023-01-01', INTERVAL m MONTH), '%Y-%m') AS bulan, IFNULL(SUM(p.qty), 0) AS total FROM peminjaman p RIGHT JOIN ( SELECT 0 AS m UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 ) AS months ON MONTH(p.tglpinjam) = (months.m + 1) AND DATE_FORMAT(p.tglpinjam, '%Y') = 2023 GROUP BY bulan ORDER BY bulan ASC;")->result();        
        //$data['qty'] = $this->db->query("SELECT total FROM ( SELECT DATE_FORMAT(DATE_ADD('2023-01-01', INTERVAL m MONTH), '%Y-%m') AS bulan, IFNULL(SUM(p.qty), 0) AS total FROM peminjaman p RIGHT JOIN ( SELECT 0 AS m UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 ) AS months ON MONTH(p.tglpinjam) = (months.m + 1) AND YEAR(p.tglpinjam) = 2023 GROUP BY bulan ORDER BY bulan ASC ) peminjam")->result_array();
        // $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('2023');
        // $data['tahun'] = $tahun;
        $data['qty'] = $this->graf->getpinjam()->result_array();
        $data['setting'] = $this->setting;
        $data['title'] = "Grafik Peminjaman";
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('graf/peminjaman', $data);
        $this->load->view('template/footer');
    }
    // public function get_data_by_year() {
    //     $tahun = $this->input->get('tahun');
    //     $data = $this->graf->getpinjam($tahun);
    //     echo json_encode($data);
    // }

}
