<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Kategori_m', 'kategori');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->kategori->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/kategori', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $kategori = $this->input->post('kategori');
        $deskripsi = $this->input->post('deskripsi');
        $input = $this->kategori->tambahData($kategori, $deskripsi);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/kategori'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/kategori'));
        }
    }
    public function editdata()
    {
        $idkategori = $this->input->post('idkategori');
        $kategori = $this->input->post('kategori');
        $deskripsi = $this->input->post('deskripsi');
        $edit = $this->kategori->editData($idkategori, $kategori, $deskripsi);
        if ($edit) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/kategori'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/kategori'));
        }
    }
    public function hapusdata($idkategori)
    {
        $hapus = $this->kategori->deleteData($idkategori);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/kategori'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/kategori'));
        }
    }
}
