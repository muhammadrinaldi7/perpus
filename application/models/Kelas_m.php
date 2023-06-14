<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('kelas');
        return $data;
    }
    public function tambahData($kelas)
    {
        $data = ['namakelas' => $kelas];
        $query = $this->db->insert('kelas', $data);
        return $query;
    }
    public function editData($idkelas, $kelas)
    {
        $this->db->set('namakelas', $kelas);
        $this->db->where('idkelas', $idkelas);
        $query = $this->db->update('kelas');
        return $query;
    }
    public function deleteData($idkelas)
    {
        $this->db->where('idkelas', $idkelas);
        $query = $this->db->delete('kelas');
        return $query;
    }
}
