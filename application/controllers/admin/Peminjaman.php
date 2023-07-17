<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    private $title = "Peminjaman";
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Peminjaman_m', 'peminjaman');
        $this->load->model('Buku_m', 'buku');
        $this->load->model('Anggota_m', 'anggota');
        $this->load->model('Denda_m', 'denda');
        $this->load->model('Kas_m', 'kas');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['peminjaman'] = $this->peminjaman->getPeminjaman()->result_array();
        $data['denda'] = $this->denda->getTelat()->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/peminjaman', $data);
        $this->load->view('template/footer');
    }
    public function cetakdatapinjaman()
    {

        $data['p'] = $this->peminjaman->getPeminjaman()->result_array();
        $data['denda'] = $this->denda->getTelat()->row_array();
        // var_dump($data['p']);exit;
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatapinjaman', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    public function haltambahdata()
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['idpinjam'] = $this->peminjaman->getLast();
        
        // var_dump($data['idpinjam']);exit;
        $data['anggota'] = $this->anggota->getAll()->result_array();
        $data['buku'] = $this->buku->getAll()->result_array();
        // var_dump($data['idpinjam']);exit;
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/tambahpeminjaman', $data);
        $this->load->view('template/footer');
    }
    public function cariAnggota($kdanggota = null)
    {
        $data = $this->anggota->getAnggota($kdanggota)->row_array();
        echo json_encode($data);
    }

    public function cariBuku($kodebuku = null)
    {
        $data = $this->buku->getBuku($kodebuku)->row_array();
        // var_dump($kodebuku);exit;
        echo json_encode($data);
    }

    public function cariBukuu($idbuku = null, $smbr = null, $kk = null, $thn = null)
    {
        $kdbuku = $idbuku . '/' . $smbr . '/' . $kk . '/' . $thn;
        $data = $this->buku->getBuku($kdbuku)->row_array();
        echo json_encode($data);
    }
    public function tambahData()
    {
        $kodepinjam = $this->input->post('kodepinjam');
        $kodeanggota = $this->input->post('kodeanggota');
        $idanggota = $this->input->post('idanggota');
        $status = $this->input->post('status');
        $tglpinjam = $this->input->post('tglpinjam');
        $lamapinjam = $this->input->post('lamapinjam');
        $tgldikembalikan = $this->input->post('tgldikembalikan');
        $idbuku = $this->input->post('idbuku');
        $kodebuku = $this->input->post('kodebuku');
        $qty = $this->input->post('qty');
        if ($kodebuku != '') {
            $tot =  count($kodebuku);
            for ($i = 0; $i < $tot; $i++) {
                $this->peminjaman->tambahData($kodepinjam, $kodeanggota, $kodebuku[$i], $idbuku[$i], $status, $tglpinjam, $lamapinjam, $tgldikembalikan, $qty[$i], $idanggota);
            }
            $input = true;
        } else {
            $input = false;
        }
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/peminjaman'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/peminjaman'));
        }
    }
    public function detaildata($kodepinjam)
    {
        $data['setting'] = $this->setting;
        $data['title'] = $this->title;
        $data['pinjam'] = $this->peminjaman->getDetail($kodepinjam)->result_array();
        $data['denda'] = $this->denda->getTelat()->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/detailpeminjaman', $data);
        $this->load->view('template/footer');
    }
    public function kembalikan($kodepinjam)
    {
        $pinjam = $this->peminjaman->getDetail($kodepinjam)->result_array();
        $x = 0;
        foreach ($pinjam as $data) {
            if ($x > 0) {
                break;
            }

            $tghitung = date('Ymd') - preg_replace('/[^0-9]/', '', $data['tgldikembalikan']);
            if ($tghitung > 0) {
                $denda = $this->denda->getTelat()->row_array();
                $bb = $this->peminjaman->getDetail($data['kodepinjam'])->result_array();
                $totdenda = 0;
                foreach ($bb as $dt) {
                    $tgl1 = date_create($data['tgldikembalikan']);
                    $tgl2 = date_create();
                    $beda = date_diff($tgl2, $tgl1);
                    $diff = $beda->d;
                    $d =  $denda['biaya'] * $diff;
                    $dtins = [
                        'idpinjam' => $dt['idpinjam'],
                        'kodepinjam' => $dt['kodepinjam'],
                        'tgldenda' => date('Y-m-d'),
                        'lamawaktu' => $dt['lamapinjam'],
                        'qty' => $dt['qty'],
                        'biaya' => $dt['qty'] * $d
                    ];
                    $totdenda += $dtins['biaya'];

                    $this->db->insert('denda', $dtins);

                    $cek=$this->db->query("SELECT kodekas FROM kas where kodekas like '%IN%' order by idkas desc")->row_array();
                    $kode=substr($cek['kodekas'],16,2);
                    $code=$kode+1;
                    $kode_akhir='KAS/IN/'.date('dmY').'/'.$code;

                    $dtkas = [
                        'kodekas' => $dt['kodepinjam'],
                        'tanggal' => date('Y-m-d'),
                        'tipe' => 'masuk',
                        'nominal' => $dt['qty'] * $d,
                        'keterangan' => 'telat',
                    ];
                    $this->db->insert('kas', $dtkas);

                    // var_dump($kode_akhir);exit;
                }
                $idLast = $this->kas->getLast();
                if ($idLast == '') {
                    $idkas = 1;
                } else {
                    $idkas = $idLast['idkas'] + 1;
                }
                $kodekas = 'KAS/IN/' . date('dmY') . '/' . $idkas;
                $tanggal = date('Y-m-d');
                $tipe = 'masuk';
                $nominal = $totdenda;
                $keterangan = 'telat';
                $this->kas->tambahData($kodekas, $tanggal, $tipe, $nominal, $keterangan);
                $kembali = $this->peminjaman->kembalikan($kodepinjam);
            } else {
                $kembali = $this->peminjaman->kembalikan($kodepinjam);
            }
            $x++;
        }
        if ($kembali) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/pengembalian'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/pengembalian'));
        }
    }
    public function hapusdata($kodepinjam)
    {
        $hapus = $this->peminjaman->deleteData($kodepinjam);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/peminjaman'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/peminjaman'));
        }
    }
}
