<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('klasifikasi');
        return $data;
    }
    public function tambahData($kodeklasifikasi, $klasifikasi)
    {
        $data = [
            'kodeklasifikasi' => $kodeklasifikasi,
            'klasifikasi' => $klasifikasi
        ];
        $query = $this->db->insert('klasifikasi', $data);
        return $query;
    }
    public function editData($idklasifikasi, $kodeklasifikasi, $klasifikasi)
    {
        $this->db->set('kodeklasifikasi', $kodeklasifikasi);
        $this->db->set('klasifikasi', $klasifikasi);
        $this->db->where('idklasifikasi', $idklasifikasi);
        $query = $this->db->update('klasifikasi');
        return $query;
    }
    public function deleteData($idklasifikasi)
    {
        $this->db->where('idklasifikasi', $idklasifikasi);
        $query = $this->db->delete('klasifikasi');
        return $query;
    }
}
