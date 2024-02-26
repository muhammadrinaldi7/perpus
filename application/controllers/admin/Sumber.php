<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sumber extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Sumber_m', 'sumber');
        cekstatuslogin();
        cekroleadmin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Sumber Buku';
        $data['sumber'] = $this->sumber->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/sumber', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $kodesumber = $this->input->post('kodesumber');
        $sumber = $this->input->post('sumber');
        $input = $this->sumber->tambahData($kodesumber, $sumber);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/sumber'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/sumber'));
        }
    }
    public function editdata()
    {
        $idsumber = $this->input->post('idsumber');
        $kodesumber = $this->input->post('kodesumber');
        $sumber = $this->input->post('sumber');
        $edit = $this->sumber->editData($idsumber, $kodesumber, $sumber);
        if ($edit) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/sumber'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/sumber'));
        }
    }
    public function hapusdata($idsumber)
    {
        $hapus = $this->sumber->deleteData($idsumber);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/sumber'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/sumber'));
        }
    }
}
