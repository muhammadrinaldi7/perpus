<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas extends CI_Controller
{
    private $title = "Kas";
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Kas_m', 'kas');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        if (isset($_POST['cari'])) {
            $jenis_kas=$_POST['jenis_kas'];
            // var_dump($jenis_kas);exit;
            if ($jenis_kas=='Kas Masuk') {
                $jenis='masuk';
                $data['kas']=$this->db->query("SELECT * FROM kas where tipe='$jenis'")->result_array();
            }elseif($jenis_kas=='Kas Keluar'){
                $jenis='keluar';
                $data['kas']=$this->db->query("SELECT * FROM kas where tipe='$jenis'")->result_array();
            }else{
                $data['kas']=$this->db->query("SELECT * FROM kas")->result_array();
            }
            
        }else{

        $data['kas'] = $this->kas->getAll()->result_array();   
        }
        $data['totalkas'] = $this->kas->totalKas();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/kas', $data);
        $this->load->view('template/footer');
    }
    public function cetakdatakas()
    {
        $jenis_kas=$_POST['jenis_kas'];
        if ($jenis_kas=='Kas Masuk') {
            $jenis='masuk';
            $data['kas'] = $this->kas->getAllcetak($jenis)->result_array();
        }elseif ($jenis_kas=='Kas Keluar') {
            $jenis='keluar';
            $data['kas'] = $this->kas->getAllcetak($jenis)->result_array();
        }else{
            $data['kas'] = $this->kas->getAll()->result_array();
        }
        
        // var_dump($data['kas']);exit;
        $data['totalkas'] = $this->kas->totalKas();
        // var_dump($data['p']);exit;
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatakas', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    public function haltambahdata()
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $idLast = $this->kas->getLast();
        if ($idLast == '') {
            $data['idkas'] = 1;
        } else {
            $data['idkas'] = $idLast['idkas'] + 1;
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/tambahkas', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $kodekas = $this->input->post('kodekas');
        // $nama = $this->input->post('nama');
        $tanggal = $this->input->post('tanggal');
        $tipe = $this->input->post('tipe');
        $nominal = $this->input->post('nominal');
        $keterangan = $this->input->post('keterangan');
        $input = $this->kas->tambahData($kodekas, $tanggal, $tipe, $nominal, $keterangan);
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/kas'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/kas'));
        }
    }
    public function haleditdata($idkas)
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['kas'] = $this->kas->getDetail($idkas)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/editkas', $data);
        $this->load->view('template/footer');
    }
    public function editdata()
    {
        $idkas = $this->input->post('idkas');
        $tanggal = $this->input->post('tanggal');
        $tipe = $this->input->post('tipe');
        $nominal = $this->input->post('nominal');
        $keterangan = $this->input->post('keterangan');
        $kodekas = $this->input->post('kodekas');
        $input = $this->kas->editData($idkas, $kodekas, $tanggal, $tipe, $nominal, $keterangan);

        if ($input) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/kas'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/kas'));
        }
    }
    public function hapusdata($idkas)
    {
        $hapus = $this->kas->deleteData($idkas);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/kas'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/kas'));
        }
    }
}
