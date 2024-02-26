<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Jabatan_m', 'jabatan');
        cekstatuslogin();
        cekroleadmin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Jabatan';
        $data['jabatan'] = $this->jabatan->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/jabatan', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $namajabatan = $this->input->post('jabatan');
        $input = $this->jabatan->tambahData($namajabatan);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/jabatan'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/jabatan'));
        }
    }
    public function editdata()
    {
        $idjabatan = $this->input->post('idjabatan');
        $namajabatan = $this->input->post('jabatan');
        $edit = $this->jabatan->editData($idjabatan, $namajabatan);
        if ($edit) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/jabatan'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/jabatan'));
        }
    }
    public function hapusdata($idjabatan)
    {
        $hapus = $this->jabatan->deleteData($idjabatan);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/jabatan'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/jabatan'));
        }
    }
}
