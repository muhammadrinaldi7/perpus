<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('kategori');
        return $data;
    }
    public function tambahData($kategori, $deskripsi)
    {
        $data = [
            'kategori' => $kategori,
            'deskripsi' => $deskripsi
        ];
        $query = $this->db->insert('kategori', $data);
        return $query;
    }
    public function editData($idkategori, $kategori, $deskripsi)
    {
        $this->db->set('kategori', $kategori);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->where('idkategori', $idkategori);
        $query = $this->db->update('kategori');
        return $query;
    }
    public function deleteData($idkategori)
    {
        $this->db->where('idkategori', $idkategori);
        $query = $this->db->delete('kategori');
        return $query;
    }
}
