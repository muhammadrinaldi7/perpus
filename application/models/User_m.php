<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('pass', $password);
        $hasil = $this->db->get('user')->row_array();
        return $hasil;
    }
    public function ubah($username, $password, $iduser)
    {
        $data = [
            "username" => $username,
            "pass" => $password
        ];
        $this->db->where('iduser', $iduser);
        $hasil = $this->db->update('user', $data);
        if ($hasil) {
            return true;
        } else {
            return false;
        }
    }
}
