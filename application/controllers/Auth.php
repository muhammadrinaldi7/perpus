<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m', 'user');
        $this->setting = $this->settingan->getSetting();
    }

    public function index()
    {
        if ($this->session->userdata('iduser')) {
            redirect(base_url('admin/dashboard'));
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['setting'] = $this->setting;
            $this->load->view("login", $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $now=date('Y-m-d');
        $query=$this->db->query("SELECT * FROM peminjaman where tgldikembalikan>='$now'")->result();
        foreach ($query as $key) {
            $idpinjam=$key->idpinjam;
            $cari=$this->db->query("SELECT * from peminjaman p left join anggota a on p.kodeanggota=a.kodeanggota left join buku b on p.idbuku=b.idbuku where idpinjam='$idpinjam'")->row();

            $email=$cari->email;
            $judul=$cari->judul;
            $qty=$cari->qty;
            $tglpinjam=$cari->tglpinjam;
            $tgldikembalikan=$cari->tgldikembalikan;
            $jatuh_tempo=$key->tgldikembalikan;
            $tgl1 = new DateTime($jatuh_tempo);
            $tgl2 = new DateTime($now);
            $d = $tgl2->diff($tgl1)->days;
            // var_dump($email);exit;
            // var_dump($no_pinjaman);exit;
            // var_dump($cari->id_role);exit;
            if ($d<=1) {
        // $mail->isSMTP();
        // $mail->Host = 'smtp.gmail.com';
        // $mail->SMTPAuth = true;
        //   //email dan password yang sudah tervalidasi oleh gmail
        // $mail->Username = 'anangafh@gmail.com';
        // $mail->Password = 'hkfdjkigixvxzxar';
        // $mail->SMTPSecure = 'tls';
        // $mail->Port = 587;

$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = 'b338c2d127d6fd';
$mail->Password = 'da53d481721fb8';
      
        $mail->setFrom('anangafh@gmail.com', 'Perpustakaan');
        $mail->addReplyTo('anangafh@gmail.com', 'Perpustakaan');
        // // $mail->addAddress($dt['email']);
        // if ($cari->id_role!='3') {
        // $mail->addAddress('noviaanggraini029@gmail.com');
        // }else{
            $mail->addAddress($email);//tidak bisa 2 kali
        // }
        $mail->Subject = 'Perpustakaan MTsN 2 KAPUAS';
        $mail->isHTML(true);

        $lap="<h3 style='color:blue;'><b>Besok hari jatuh tempo pengembalian Buku. Berikut data buku yang dipinjam:<br>
        <table>
        <thead>
        <tr>
        <td>Judul</td>
        <td>:</td>
        <td>".strtoupper($judul)."</td>
        </tr>
        <tr>
        <td>Tanggal Pinjam</td>
        <td>:</td>
        <td>".$tglpinjam."</td>
        </tr>
        <tr>
        <td>Tanggal Kembali</td>
        <td>:</td>
        <td>".$tgldikembalikan."</td>
        </tr>
        <thead>
        </table></b></h3><br><br><br><br><br><br><p>*jam operasional perpustakaan dari pukul 08.00 - 15.00 WITA.</p>";
        $mail->Body = $lap;
        // $tambah = mysqli_query($con, "UPDATE surat_keluar SET status='Terima' where id_surat_keluar='$id_surat_keluar'");
        if (!$mail->send()) {
          echo 'Pesan tidak dapat dikirim.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
            }
        }

        $username = $this->input->post('username', true);
        $password = $this->input->post('password');
        $hasil = $this->user->login($username, $password);
        if ($hasil['role']=='admin') {
            // True
            $data = [
                "iduser" => $hasil['iduser'],
                "username" => $hasil['username'],
                "pass" => $hasil['pass'],
                "role" => $hasil['role']
            ];
            $this->session->set_userdata($data);
            redirect(base_url('admin/dashboard'));
        }else if($hasil['role']=='user')
        {
            $data = [
                "iduser" => $hasil['iduser'],
                "username" => $hasil['username'],
                "pass" => $hasil['pass'],
                "role" => $hasil['role']
            ];
            $this->session->set_userdata($data);
            redirect(base_url('admin/dashboard'));
        } 
        else {
            // false
            $this->session->set_flashdata('message', 'gagal');
            redirect(base_url('auth'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'berhasil');
        redirect(base_url('auth'));
    }
}
