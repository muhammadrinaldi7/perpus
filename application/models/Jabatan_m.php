<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('jabatan');
        return $data;
    }
    public function tambahData($jabatan)
    {
        $data = ['namajabatan' => $jabatan];
        $query = $this->db->insert('jabatan', $data);
        return $query;
    }
    public function editData($idjabatan, $jabatan)
    {
        $this->db->set('namajabatan', $jabatan);
        $this->db->where('idjabatan', $idjabatan);
        $query = $this->db->update('jabatan');
        return $query;
    }
    public function deleteData($idjabatan)
    {
        $this->db->where('idjabatan', $idjabatan);
        $query = $this->db->delete('jabatan');
        return $query;
    }
}
