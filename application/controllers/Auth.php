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
        $username = $this->input->post('username', true);
        $password = $this->input->post('password');
        $hasil = $this->user->login($username, $password);
        if ($hasil) {
            // True
            $data = [
                "iduser" => $hasil['iduser'],
                "username" => $hasil['username'],
                "pass" => $hasil['pass']
            ];
            $this->session->set_userdata($data);
            redirect(base_url('admin/dashboard'));
        } else {
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
