<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('Anggota_m', 'anggota');
        $this->load->model('Kelas_m', 'kelas');
        cekstatuslogin();
        cekroleadmin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = "Siswa";
        $data['siswa'] = $this->anggota->getSiswa()->result_array();
        $data['kelas'] = $this->kelas->getAll()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('template/footer');
    }
    public function haltambahdata()
    {
        $data['setting'] = $this->setting;
        $data['title'] = "Siswa";
        $data['kelas'] = $this->kelas->getAll()->result_array();
        $idLast = $this->anggota->getLast();
        if ($idLast == '') {
            $data['idanggota'] = 1;
        } else {
            $data['idanggota'] = $idLast['idanggota'] + 1;
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/tambahsiswa', $data);
        $this->load->view('template/footer');
    }
    public function tambahdata()
    {
        $role = $this->input->post('role');
        $kodeanggota = $this->input->post('kodeanggota');
        $identitas = $this->input->post('identitas');
        $nama = $this->input->post('nama');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $email = $this->input->post('email');
        $foto = $_FILES['foto'];
        if (!file_exists($foto['tmp_name'])) {
            $foto = 'profildefault.jpg';
            $input = $this->anggota->tambahData($role, $kodeanggota, $identitas, $nama, $telp, $alamat, $status, $foto, $email);
        } else {
            $config['upload_path']          = './assets/data/anggota/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = date("Y-m-d") . rand(123, 999) . $foto['name'];

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('foto');
            if ($upload) {
                $foto = $this->upload->data('file_name');
                $input = $this->anggota->tambahData($role, $kodeanggota, $identitas, $nama, $telp, $alamat, $status, $foto, $email);
            } else {
                $input = false;
            }
        }
        if ($input) {
            $this->session->set_tempdata('message', 'tambah berhasil', 3);
            redirect(base_url('admin/siswa'));
        } else {
            $this->session->set_tempdata('message', 'tambah gagal', 3);
            redirect(base_url('admin/siswa'));
        }
    }
    public function haleditdata($idanggota)
    {
        $data['setting'] = $this->setting;
        $data['title'] = "Siswa";
        $data['siswa'] = $this->anggota->getDetail($idanggota)->row_array();
        $data['kelas'] = $this->kelas->getAll()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/editsiswa', $data);
        $this->load->view('template/footer');
    }
    public function editdata()
    {
        $idanggota = $this->input->post('idanggota');
        $role = $this->input->post('role');
        $kodeanggota = $this->input->post('kodeanggota');
        $identitas = $this->input->post('identitas');
        $nama = $this->input->post('nama');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $email = $this->input->post('email');
        $foto = $_FILES['foto'];
        if (!file_exists($foto['tmp_name'])) {
            $this->db->where('idanggota', $idanggota);
            $oldimage = $this->db->get('anggota')->row_array();

            if ($oldimage['foto'] != 'profildefault.jpg') {
                $foto = $oldimage['foto'];
            } else {
                $foto = 'profildefault.jpg';
            }

            $input = $this->anggota->editData($idanggota, $role, $kodeanggota, $identitas, $nama, $telp, $alamat, $status, $foto, $email);
        } else {
            $config['upload_path']          = './assets/data/anggota/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = date("Ymd")  . rand(123, 999) . $foto['name'];

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('foto');
            if ($upload) {
                $this->db->where('idanggota', $idanggota);
                $oldimage = $this->db->get('anggota')->row_array();

                if ($oldimage['foto'] != 'profildefault.jpg') {
                    unlink('./assets/data/anggota/' . $oldimage['foto']);
                }
                $foto = $this->upload->data('file_name');
                $input = $this->anggota->editData($idanggota, $role, $kodeanggota, $identitas, $nama, $telp, $alamat, $status, $foto, $email);
            } else {
                $input = false;
            }
        }
        if ($input) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/siswa'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/siswa'));
        }
    }
    public function hapusdata($idanggota)
    {
        $this->db->where('idanggota', $idanggota);
        $oldimage = $this->db->get('anggota')->row_array();

        if ($oldimage['foto'] != 'profildefault.jpg') {
            unlink('./assets/data/anggota/' . $oldimage['foto']);
        }
        $hapus = $this->anggota->deleteData($idanggota);
        if ($hapus) {
            $this->session->set_tempdata('message', 'hapus berhasil', 3);
            redirect(base_url('admin/siswa'));
        } else {
            $this->session->set_tempdata('message', 'hapus gagal', 3);
            redirect(base_url('admin/siswa'));
        }
    }
    public function ubahkelas()
    {
        $idanggota = $this->input->post('idanggota');
        $status = $this->input->post('status');
        if ($idanggota != '') {
            $tot =  count($idanggota);
            for ($i = 0; $i < $tot; $i++) {
                $this->anggota->ubahStatus($status, $idanggota[$i]);
            }
            $input = true;
        } else {
            $input = false;
        }
        if ($input) {
            $this->session->set_tempdata('message', 'edit berhasil', 3);
            redirect(base_url('admin/siswa'));
        } else {
            $this->session->set_tempdata('message', 'edit gagal', 3);
            redirect(base_url('admin/siswa'));
        }
    }
    public function cetakkartu($idanggota)
    {
        $data['anggota'] = $this->anggota->getDetail($idanggota)->row_array();
        $data['setting'] = $this->setting;
        $html = $this->load->view('admin/cetakanggota', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'potrait');
    }
    public function cetakbanyak()
    {
        $idanggota = $this->input->post('idanggota');
        $data['anggota'] = [];
        if ($idanggota != '') {
            $x = count($idanggota);
            for ($i = 0; $i < $x; $i++) {
                $anggota = $this->anggota->getDetail($idanggota[$i])->row_array();
                $data['anggota'][$i] = $anggota;
            }
        } else {
            redirect(base_url('admin/siswa'));
        }
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakbanyakag', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'potrait');
    }
    public function cetakdatasiswa()
    {
        
        // $idanggota = $this->input->post('idanggota');
        // $data['anggota'] = [];
        // if ($idanggota != '') {
        //     $x = count($idanggota);
        //     for ($i = 0; $i < $x; $i++) {
        //         $anggota = $this->anggota->getDetail($idanggota[$i])->row_array();
        //         $data['anggota'][$i] = $anggota;
        //     }
        // } else {
        //     redirect(base_url('admin/guru'));
        // }

        $data['siswa'] = $this->anggota->getSiswa()->result_array();
        $data['setting'] = $this->setting;
        // $this->load->view('admin/cetakbanyakag', $data);
        $html = $this->load->view('admin/cetakdatasiswa', $data, true);
        $this->fungsi->PdfGenerator($html, date('Ymd') . rand(100, 999), 'A4', 'landscape');
    }
	public function templateexcel(){
		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Master Data Siswa');
		$sheet->mergeCells('A1:E1');
		$sheet->getStyle('A1')->getFont()->setBold(TRUE);
		$sheet->getStyle('A1')->getFont()->setSize(14);
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		
		$sheet->setCellValue('A3', 'NIS');
		$sheet->setCellValue('B3', 'Nama');
		$sheet->setCellValue('C3', 'No. HP');
		$sheet->setCellValue('D3', 'Alamat');
		$sheet->setCellValue('E3', 'Kelas');

		ob_start();
		$filename = "Template-Import-Siswa-".date("YmdHis").".xlsx";

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
				redirect(base_url('admin/siswa'));
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
				$idanggota = $this->anggota->getID();
				$nis = $row['A'];
				$nama = $row['B'];
				$no_hp = $row['C'];
				$alamat = $row['D'];
				$kelas = $row['E'];
				
				$idanggota = 'G00'.$idanggota;
				
				$input = $this->anggota->tambahData('siswa', $idanggota, $nis, $nama, $no_hp, $alamat, $kelas, 'profildefault.jpg');
				
				$numrow++; // Tambah 1 setiap kali looping
			}
			//$this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
			$this->session->set_tempdata('message', 'tambah berhasil', 3);
		}
		header('location: /perpus/admin/siswa'); 
	}
}
