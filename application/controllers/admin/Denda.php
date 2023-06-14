<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Denda extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Denda_m', 'denda');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = 'Biaya Denda';
        $data['denda'] = $this->denda->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/biayadenda', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $biaya = $this->input->post('biaya');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        $tgltetap = $this->input->post('tgltetap');
        $input = $this->denda->tambahData($nama,$biaya, $status, $keterangan, $tgltetap);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/denda'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/denda'));
        }
    }
    public function editdata()
    {
        $idbiaya = $this->input->post('idbiaya');
        $nama = $this->input->post('nama');
        $biaya = $this->input->post('biaya');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        $tgltetap = $this->input->post('tgltetap');
        $edit = $this->denda->editData($nama,$idbiaya, $biaya, $status, $keterangan, $tgltetap);
        if ($edit) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/denda'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/denda'));
        }
    }
    public function hapusdata($idbiaya)
    {
        $hapus = $this->denda->deleteData($idbiaya);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/denda'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/denda'));
        }
    }
}
