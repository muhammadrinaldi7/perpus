<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('presensi');
        return $data;
    }
    public function getDetail($idpresensi)
    {
        $this->db->where('idpresensi', $idpresensi);
        $data = $this->db->get('presensi');
        return $data;
    }
    public function tambahData($nama, $status, $keperluan)
    {
        $data = [
            'nama' => $nama,
            'status' => $status,
            'keperluan' => $keperluan
        ];
        $query = $this->db->insert('presensi', $data);
        return $query;
    }
    public function editData($idpresensi, $nama, $status, $keperluan)
    {
        $this->db->set('nama', $nama);
        $this->db->set('status', $status);
        $this->db->set('keperluan', $keperluan);
        $this->db->where('idpresensi', $idpresensi);
        $query = $this->db->update('presensi');
        return $query;
    }
    public function deleteData($idpresensi)
    {
        $this->db->where('idpresensi', $idpresensi);
        $query = $this->db->delete('presensi');
        return $query;
    }
}
