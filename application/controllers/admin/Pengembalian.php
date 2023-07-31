<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{
    private $title = "Pengembalian";
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Peminjaman_m', 'peminjaman');
        $this->load->model('Buku_m', 'buku');
        $this->load->model('Anggota_m', 'anggota');
        $this->load->model('Denda_m', 'denda');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['peminjaman'] = $this->peminjaman->getPengembalian()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/pengembalian', $data);
        $this->load->view('template/footer');
    }
    public function cetakdatapengembalian()
    {
        if (isset($_POST['cetak_semua'])) {
        $data['p'] = $this->peminjaman->getPengembalian()->result_array();
        }elseif (isset($_POST['cetak_tanggal'])) {
            $dari=$_POST['dari'];
            $sampai=$_POST['sampai'];
            $data['p'] = $this->db->query("SELECT p.idpinjam as idpinjam, p.kodepinjam as kodepinjam, p.kodeanggota, p.idanggota, a.kodeanggota, identitas, nama,telp, alamat,a.status as status, kodebuku, idbuku, p.status as statpe, tglpinjam, lamapinjam, tgldikembalikan, tglpengembalian, p.qty as qty, SUM(biaya) as denda FROM peminjaman p left join anggota a on p.idanggota=a.idanggota left join denda d on d.idpinjam=p.idpinjam where p.status='dikembalikan' and tglpengembalian between '$dari' and '$sampai' group by kodepinjam order by idpinjam desc")->result_array();
        }
        // var_dump($data['p']);exit;
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatapengembalian', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    public function haltambahdata()
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['idpinjam'] = $this->peminjaman->getLast();
        $data['anggota'] = $this->anggota->getAll()->result_array();
        $data['buku'] = $this->buku->getAll()->result_array();
        // var_dump($data['idpinjam']);exit;
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/tambahpengembalian', $data);
        $this->load->view('template/footer');
    }
    public function detaildata($kodepinjam)
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['pinjam'] = $this->peminjaman->getDetail($kodepinjam)->result_array();
        $data['denda'] = $this->denda->getTelat()->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/detailpengembalian', $data);
        $this->load->view('template/footer');
    }
    public function hapusdata($kodepinjam)
    {
        $hapus = $this->peminjaman->deleteData($kodepinjam);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/pengembalian'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/pengembalian'));
        }
    }
}
