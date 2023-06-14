<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    private $title = "Pengunjung";
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Presensi_m', 'presensi');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['presensi'] = $this->presensi->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/presensi', $data);
        $this->load->view('template/footer');
    }
    public function cetakdatapengunjung()
    {
        
        // $idanggota = $this->input->post('idanggota');
        // $data['anggota'] = [];
        // if ($idanggota != '') {
        //     $x = count($idanggota);
        //     for ($i = 0; $i < $x; $i++) {
        //         $anggota = $this->anggota->getDetail($idanggota[$i])->row_array();
        //         $data['anggota'][$i] = $anggota;
        //     }
        // } else {
        //     redirect(base_url('admin/guru'));
        // }

        $data['p'] = $this->presensi->getAll()->result_array();
        // var_dump($data['p']);exit;
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatapengunjung', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    public function haltambahdata()
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/tambahpresensi', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $keperluan = $this->input->post('keperluan');
        $input = $this->presensi->tambahData($nama, $status, $keperluan);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/presensi'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/presensi'));
        }
    }
    public function haleditdata($idpresensi)
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['presensi'] = $this->presensi->getDetail($idpresensi)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/editpresensi', $data);
        $this->load->view('template/footer');
    }
    public function editdata()
    {
        $idpresensi = $this->input->post('idpresensi');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $keperluan = $this->input->post('keperluan');
        $input = $this->presensi->editData($idpresensi, $nama, $status, $keperluan);
        if ($input) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/presensi'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/presensi'));
        }
    }
    public function hapusdata($idpresensi)
    {
        $hapus = $this->presensi->deleteData($idpresensi);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/presensi'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/presensi'));
        }
    }
}
