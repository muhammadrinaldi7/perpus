<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sumber_m extends CI_Model
{
    public function getAll()
    {
        $this->db->order_by('idsumber', 'ASC');
        $data = $this->db->get('sumber_buku');
        return $data;
    }
    public function tambahData($kodesumber, $sumber)
    {
        $data = [
            'kodesumber' => $kodesumber,
            'sumber' => $sumber
        ];
        $query = $this->db->insert('sumber_buku', $data);
        return $query;
    }
    public function editData($idsumber, $kodesumber, $sumber)
    {
        $this->db->set('kodesumber', $kodesumber);
        $this->db->set('sumber', $sumber);
        $this->db->where('idsumber', $idsumber);
        $query = $this->db->update('sumber_buku');
        return $query;
    }
    public function deleteData($idsumber)
    {
        $this->db->where('idsumber', $idsumber);
        $query = $this->db->delete('sumber_buku');
        return $query;
    }
}
