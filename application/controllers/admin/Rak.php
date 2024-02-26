<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Rak_m', 'rak');
        cekstatuslogin();
        cekroleadmin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Rak Buku';
        $data['rak'] = $this->rak->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/rak', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $namarak = $this->input->post('namarak');
        $input = $this->rak->tambahData($namarak);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/rak'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/rak'));
        }
    }
    public function editdata()
    {
        $idrak = $this->input->post('idrak');
        $namarak = $this->input->post('namarak');
        $edit = $this->rak->editData($idrak, $namarak);
        if ($edit) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/rak'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/rak'));
        }
    }
    public function hapusdata($idrak)
    {
        $hapus = $this->rak->deleteData($idrak);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/rak'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/rak'));
        }
    }
}
