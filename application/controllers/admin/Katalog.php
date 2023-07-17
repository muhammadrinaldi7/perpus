<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Buku_m', 'buku');
        $this->load->model('Klasifikasi_m', 'klasifikasi');
        $this->load->model('Kategori_m', 'kategori');
        $this->load->model('Sumber_m', 'sumber');
        $this->load->model('Rak_m', 'rak');
        cekstatuslogin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = "Katalog";
        $data['katalog'] = $this->buku->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/katalog', $data);
        $this->load->view('template/footer');
    }
    public function cetakdatakatalog()
    {
        
        
        $data['katalog'] = $this->buku->getAll()->result_array();
        // var_dump($data['p']);exit;
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatakatalog', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
    public function haltambahdata()
    {
        $data['setting'] = $this->setting;
        $data['title'] = "Katalog";
        $data['klasifikasi'] = $this->klasifikasi->getAll()->result_array();
        $data['kategori'] = $this->kategori->getAll()->result_array();
        $data['sumber'] = $this->sumber->getAll()->result_array();
        $data['rak'] = $this->rak->getAll()->result_array();
        $idLast = $this->buku->getLast();
        if ($idLast == '') {
            $data['idbuku'] = 1;
        } else {
            $data['idbuku'] = $idLast['idbuku'] + 1;
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/tambahkatalog', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $isbn = $this->input->post('isbn');
        $judul = $this->input->post('judul');
        $penulis = $this->input->post('penulis');
        $penerbit = $this->input->post('penerbit');
        $thnterbit = $this->input->post('thnterbit');
        $tempatterbit = $this->input->post('tempatterbit');
        $halaman = $this->input->post('halaman');
        $tebal = $this->input->post('tebal');
        $rak = $this->input->post('rak');
        $kodebuku = $this->input->post('kodebuku');
        $sumberbuku = $this->input->post('sumberbuku');
        $kategori = $this->input->post('kategori');
        $kodeklasifikasi = $this->input->post('kodeklasifikasi');
        $stok = $this->input->post('stok');
        $sampul = $_FILES['sampul'];
require "phpqrcode/qrlib.php"; 
 $penyimpanan = "assets/image/";
$isi=$kodebuku.'/'.$judul;
$nama_qr=md5($isi);
// var_dump($nama_qr);exit;
  QRcode::png($isi, $penyimpanan.$nama_qr.'.png', QR_ECLEVEL_L, 10, 5); 
  $qr=$nama_qr.'.png';
  // $validasi_link=$cetak_link.'.png';
  // var_dump($qr);exit;
        if (!file_exists($sampul['tmp_name'])) {
            $sampul = 'noimage.jpg';
            $input = $this->buku->tambahData($isbn, $judul, $penulis, $penerbit, $thnterbit, $tempatterbit, $halaman, $tebal, $rak, $sampul, $kodebuku, $sumberbuku, $kategori, $kodeklasifikasi, $stok,$qr);
        } else {
            $config['upload_path']          = './assets/data/buku/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = date("Y-m-d") . rand(123, 999) . $sampul['name'];

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('sampul');
            if ($upload) {
                $sampul = $this->upload->data('file_name');
                $input = $this->buku->tambahData($isbn, $judul, $penulis, $penerbit, $thnterbit, $tempatterbit, $halaman, $tebal, $rak, $sampul, $kodebuku, $sumberbuku, $kategori, $kodeklasifikasi, $stok,$qr);
            } else {
                $input = false;
            }
        }
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/katalog'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/katalog'));
        }
    }
    public function haleditdata($idbuku)
    {
        $data['setting'] = $this->setting;
        $data['title'] = "Katalog";
        $data['katalog'] = $this->buku->getDetail($idbuku)->row_array();
        $data['klasifikasi'] = $this->klasifikasi->getAll()->result_array();
        $data['kategori'] = $this->kategori->getAll()->result_array();
        $data['sumber'] = $this->sumber->getAll()->result_array();
        $data['rak'] = $this->rak->getAll()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/editkatalog', $data);
        $this->load->view('template/footer');
    }
    public function editdata()
    {
        $idbuku = $this->input->post('idbuku');
        $isbn = $this->input->post('isbn');
        $judul = $this->input->post('judul');
        $penulis = $this->input->post('penulis');
        $penerbit = $this->input->post('penerbit');
        $thnterbit = $this->input->post('thnterbit');
        $tempatterbit = $this->input->post('tempatterbit');
        $halaman = $this->input->post('halaman');
        $tebal = $this->input->post('tebal');
        $rak = $this->input->post('rak');
        $kodebuku = $this->input->post('kodebuku');
        $sumberbuku = $this->input->post('sumberbuku');
        $kategori = $this->input->post('kategori');
        $kodeklasifikasi = $this->input->post('kodeklasifikasi');
        $stok = $this->input->post('stok');
        $sampul = $_FILES['sampul'];
        if (!file_exists($sampul['tmp_name'])) {
            $this->db->where('idbuku', $idbuku);
            $oldimage = $this->db->get('buku')->row_array();

            if ($oldimage['sampul'] != 'noimage.jpg') {
                $sampul = $oldimage['sampul'];
            } else {
                $sampul = 'noimage.jpg';
            }

            $input = $this->buku->editData($idbuku, $isbn, $judul, $penulis, $penerbit, $thnterbit, $tempatterbit, $halaman, $tebal, $rak, $sampul, $kodebuku, $sumberbuku, $kategori, $kodeklasifikasi, $stok);
        } else {
            $config['upload_path']          = './assets/data/buku/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = date("Ymd")  . rand(123, 999) . $sampul['name'];

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('sampul');
            if ($upload) {
                $this->db->where('idbuku', $idbuku);
                $oldimage = $this->db->get('buku')->row_array();

                if ($oldimage['sampul'] != 'noimage.jpg') {
                    unlink('./assets/data/buku/' . $oldimage['sampul']);
                }
                $sampul = $this->upload->data('file_name');
                $input = $this->buku->editData($idbuku, $isbn, $judul, $penulis, $penerbit, $thnterbit, $tempatterbit, $halaman, $tebal, $rak, $sampul, $kodebuku, $sumberbuku, $kategori, $kodeklasifikasi, $stok);
            } else {
                $input = false;
            }
        }
        if ($input) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/katalog'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/katalog'));
        }
    }
    public function hapusdata($idbuku)
    {
        $this->db->where('idbuku', $idbuku);
        $oldimage = $this->db->get('buku')->row_array();

        if ($oldimage['sampul'] != 'noimage.jpg') {
            unlink('./assets/data/buku/' . $oldimage['sampul']);
        }
        $hapus = $this->buku->deleteData($idbuku);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/katalog'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/katalog'));
        }
    }
    public function cetakkartu($idbuku)
    {
        $data['katalog'] = $this->buku->getDetail($idbuku)->row_array();
        $data['setting'] = $this->setting;
        $html = $this->load->view('admin/cetakkatalog', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'potrait');
    }
    public function cetakbanyak()
    {
        $idbuku = $this->input->post('idbuku');
        $data['katalog'] = [];
        if ($idbuku != '') {
            $x = count($idbuku);
            for ($i = 0; $i < $x; $i++) {
                $buku = $this->buku->getDetail($idbuku[$i])->row_array();
                $data['katalog'][$i] = $buku;
            }
        } else {
            redirect(base_url('admin/katalog'));
        }
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakbanyakkatalog', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'potrait');
    }
	public function templateexcel(){
		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Master Data Buku Temporary');
		$sheet->mergeCells('A1:M1');
		$sheet->getStyle('A1')->getFont()->setBold(TRUE);
		$sheet->getStyle('A1')->getFont()->setSize(14);
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		
		$sheet->setCellValue('A3', 'No Induk');
        $sheet->setCellValue('B3', 'ISBN');
		$sheet->setCellValue('C3', 'Judul');
		$sheet->setCellValue('D3', 'Penulis');
		$sheet->setCellValue('E3', 'Penerbit');
		$sheet->setCellValue('F3', 'Tahun Terbit');
		$sheet->setCellValue('G3', 'Tempat Terbit');
		$sheet->setCellValue('H3', 'Halaman');
		$sheet->setCellValue('I3', 'Tebal Buku');
		$sheet->setCellValue('J3', 'Lokasi Rak');
		$sheet->setCellValue('K3', 'Sumber Buku');
		$sheet->setCellValue('L3', 'Kategori');
		$sheet->setCellValue('M3', 'Klasifikasi');
		$sheet->setCellValue('N3', 'Stok');

		ob_start();
		$filename = "Template-Import-Buku-".date("YmdHis").".xlsx";

		try {
			$writer = new Xlsx($spreadsheet);
			$writer->save($filename);
			$content = file_get_contents($filename);
		} catch(Exception $e) {
			exit($e->getMessage());
		}

		header("Content-Disposition: attachment; filename=".$filename);

		unlink($filename);
		exit($content);
	}
	
	public function importexcel(){
		if(isset($_POST['btn-import-excel'])){
			$ext = pathinfo($_FILES['excel-file']['name'], PATHINFO_EXTENSION);
			
			if ($ext != "xlsx") {
				$this->session->set_flashdata('error', 'Format File Salah!');
				redirect(base_url('admin/katalog'));
			}
			
			$ext = pathinfo($_FILES['excel-file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
			$tmp_file = $_FILES['excel-file']['tmp_name'];
			
			$reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$spreadsheet = $reader->load($tmp_file);
			$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			$numrow = 1;
			foreach($sheet as $row){
				if($numrow < 4){
					$numrow++;
					continue;
				}
				$idbuku = $this->buku->getID();
				$isbn = $row['B'];
				$judul = $row['C'];
				$penulis = $row['D'];
				$penerbit = $row['E'];
				$thnterbit = $row['F'];
				$tempatterbit = $row['G'];
				$halaman = $row['H'];
				$tebal = $row['I'];
				$rak = $row['J'];
				$sumberbuku = $row['K'];
				$kategori = $row['L'];
				$kodeklasifikasi = $row['M'];
				$stok = $row['N'];
				
				$kodebuku = $idbuku."/".$sumberbuku."/PS/".$thnterbit;
				
				$this->buku->tambahData($isbn, $judul, $penulis, $penerbit, $thnterbit, $tempatterbit, $halaman, $tebal, $rak, 'noimage.jpg', $kodebuku, $sumberbuku, $kategori, $kodeklasifikasi, $stok);
				
				$numrow++; // Tambah 1 setiap kali looping
			}
			//$this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
			$this->session->set_tempdata('message', 'tambah berhasil', 3);
		}
		header('location: /perpus/admin/katalog'); 
	}
}
