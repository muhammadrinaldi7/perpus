<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Klasifikasi_m', 'klasifikasi');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Klasifikasi';
        $data['klasifikasi'] = $this->klasifikasi->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/klasifikasi', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $kodeklasifikasi = $this->input->post('kodeklasifikasi');
        $klasifikasi = $this->input->post('klasifikasi');
        $input = $this->klasifikasi->tambahData($kodeklasifikasi, $klasifikasi);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/klasifikasi'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/klasifikasi'));
        }
    }
    public function editdata()
    {
        $idklasifikasi = $this->input->post('idklasifikasi');
        $kodeklasifikasi = $this->input->post('kodeklasifikasi');
        $klasifikasi = $this->input->post('klasifikasi');
        $edit = $this->klasifikasi->editData($idklasifikasi, $kodeklasifikasi, $klasifikasi);
        if ($edit) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/klasifikasi'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/klasifikasi'));
        }
    }
    public function hapusdata($idklasifikasi)
    {
        $hapus = $this->klasifikasi->deleteData($idklasifikasi);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/klasifikasi'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/klasifikasi'));
        }
    }
}
