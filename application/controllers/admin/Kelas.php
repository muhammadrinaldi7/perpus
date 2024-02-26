<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('kelas_m', 'kelas');
        cekstatuslogin();
        cekroleadmin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Kelas';
        $data['kelas'] = $this->kelas->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $namakelas = $this->input->post('kelas');
        $input = $this->kelas->tambahData($namakelas);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/kelas'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/kelas'));
        }
    }
    public function editdata()
    {
        $idkelas = $this->input->post('idkelas');
        $namakelas = $this->input->post('kelas');
        $edit = $this->kelas->editData($idkelas, $namakelas);
        if ($edit) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/kelas'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/kelas'));
        }
    }
    public function hapusdata($idkelas)
    {
        $hapus = $this->kelas->deleteData($idkelas);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/kelas'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/kelas'));
        }
    }
}
