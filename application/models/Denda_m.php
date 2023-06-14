<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Denda_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('biaya_denda');
        return $data;
    }
    public function getTelat()
    {
        $this->db->where('status', 'aktif');
        $data = $this->db->get('biaya_denda');
        return $data;
    }
    public function getActive()
    {
        $this->db->where('status', 'aktif');
        $data = $this->db->get('biaya_denda');
        return $data;
    }
    public function tambahData($nama,$biaya, $status, $keterangan, $tgl)
    {
        $data = [

            'nama' => $nama,
            'biaya' => $biaya,
            'status' => $status,
            'keterangan' => $keterangan,
            'tgltetap' => $tgl
        ];
        $query = $this->db->insert('biaya_denda', $data);
        return $query;
    }
    public function editData($nama,$idbiaya, $biaya, $status, $keterangan, $tgl)
    {
        $this->db->set('nama', $nama);
        $this->db->set('biaya', $biaya);
        $this->db->set('status', $status);
        $this->db->set('keterangan', $keterangan);
        $this->db->set('tgltetap', $tgl);
        $this->db->where('idbiaya', $idbiaya);
        $query = $this->db->update('biaya_denda');
        return $query;
    }
    public function deleteData($idbiaya)
    {
        $this->db->where('idbiaya', $idbiaya);
        $query = $this->db->delete('biaya_denda');
        return $query;
    }
}
