<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('rak');
        return $data;
    }
    public function tambahData($namarak)
    {
        $data = [
            'namarak' => $namarak
        ];
        $query = $this->db->insert('rak', $data);
        return $query;
    }
    public function editData($idrak, $namarak)
    {
        $this->db->set('namarak', $namarak);
        $this->db->where('idrak', $idrak);
        $query = $this->db->update('rak');
        return $query;
    }
    public function deleteData($idrak)
    {
        $this->db->where('idrak', $idrak);
        $query = $this->db->delete('rak');
        return $query;
    }
}
