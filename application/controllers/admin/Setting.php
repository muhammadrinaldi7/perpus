<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public $setting;
    public function __construct()
    {
        parent::__construct();
        $this->setting = $this->settingan->getSetting();
        $this->load->model('user_m', 'user');
        cekstatuslogin();
        cekroleadmin();
    }
    public function index()
    {
        $data['setting'] = $this->setting;
        $data['title'] = "Setting";
        $this->form_validation->set_rules('username1', 'Username Baru', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('password2', 'Ulang Password', 'trim|required|matches[password1]');
        $this->form_validation->set_rules('usernamecek', 'Username Validation', 'trim|required');
        $this->form_validation->set_rules('passwordcek', 'Password Validation', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/setting', $data);
            $this->load->view('template/footer');
        } else {
            $this->_ubahuser();
        }
    }

    private function _ubahuser()
    {
        $username = $this->input->post('username1', true);
        $password = $this->input->post('password1');
        $cekusername = $this->input->post('usernamecek', true);
        $cekpassword = $this->input->post('passwordcek');
        $iduser = $this->session->userdata('iduser');
        if ($cekusername == $this->session->userdata('username') && $cekpassword == $this->session->userdata('pass')) {
            $hasil = $this->user->ubah($username, $password, $iduser);
            if ($hasil == true) {
                redirect(base_url('auth/logout'));
            } else {
                $this->session->set_tempdata('message', 'gagal', 3);
                redirect(base_url('admin/setting'));
            }
        } else {
            $this->session->set_tempdata('message', 'gagal', 3);
            redirect(base_url('admin/setting'));
        }
    }
    public function ubahtampilan()
    {
        $title = $this->input->post('title');
        $initial = $this->input->post('initial');
        $logo = $_FILES['logo'];
        $latar = $_FILES['latar'];
        $id = $this->setting['idsetting'];
        $hasil = false;
        if (!file_exists($logo['tmp_name']) && !file_exists($latar['tmp_name'])) {
            $logo = $this->setting['logo'];
            $latar = $this->setting['latar'];
            $hasil = $this->settingan->editSetting($logo, $latar, $title, $initial, $id);
        } elseif (file_exists($logo['tmp_name'])) {
            $config['upload_path']          = './assets/image/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = date("Y-m-d") . "00" . "logo";

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('logo');
            if ($upload) {
                $logo = $this->upload->data('file_name');
                unlink('./assets/image/' . $this->setting['logo']);
                if (file_exists($latar['tmp_name'])) {
                    $config['upload_path']          = './assets/image/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 2048;
                    $config['file_name']            = date("Y-m-d") . "00" . "latar";

                    $this->load->library('upload', $config);
                    $upload = $this->upload->do_upload('latar');
                    if ($upload) {
                        $latar = $this->upload->data('file_name');
                        unlink('./assets/image/' . $this->setting['latar']);
                    } else {
                        $latar = $this->setting['latar'];
                    }
                } else {
                    $latar = $this->setting['latar'];
                }
            } else {
                $hasil = false;
            }
        } elseif (!file_exists($logo['tmp_name'])) {
            $config['upload_path']          = './assets/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']            = date("Y-m-d") . "00" . "latar";

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload('latar');
            if ($upload) {
                $latar = $this->upload->data('file_name');
                unlink('./assets/image/' . $this->setting['latar']);
                $logo = $this->setting['logo'];
            } else {
                $hasil = false;
            }
        }
        $hasil = $this->settingan->editSetting($logo, $latar, $title, $initial, $id);
        if ($hasil == true) {
            $this->session->set_tempdata('message', 'setting berhasil', 3);
            redirect(base_url('admin/setting'));
        } else {
            $this->session->set_tempdata('message', 'setting gagal', 3);
            redirect(base_url('admin/setting'));
        }
    }
}
