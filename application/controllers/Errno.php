<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errno extends CI_Controller
{
    public function index()
    {
        $data['setting'] = $this->settingan->getSetting();
        $this->load->view("errno.php", $data);
    }
}
