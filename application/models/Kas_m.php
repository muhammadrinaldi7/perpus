<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('kas');
        return $data;
    }

    public function getAllcetak($jenis_kas)
    {
        $this->db->where('tipe',$jenis_kas);
        $data = $this->db->get('kas');
        return $data;
    }
public function totalKascetak()
    {
        $this->db->where('tipe', 'masuk');
        $kas = $this->db->get('kas')->result_array();
        $nominal = 0;
        $out = 0;
        if ($kas != '') {
            foreach ($kas as $data) {
                $nominal += $data['nominal'];
            }
            $this->db->where('tipe', 'keluar');
            $keluar = $this->db->get('kas')->result_array();
            if ($keluar != '') {
                foreach ($keluar as $data) {
                    $out += $data['nominal'];
                }
                $total = $nominal - $out;
            } else {
                $total = $nominal;
            }
        } else {
            $total = 0;
        }
        return $total;
    }
    public function totalKas()
    {
        $this->db->where('tipe', 'masuk');
        $kas = $this->db->get('kas')->result_array();
        $nominal = 0;
        $out = 0;
        if ($kas != '') {
            foreach ($kas as $data) {
                $nominal += $data['nominal'];
            }
            $this->db->where('tipe', 'keluar');
            $keluar = $this->db->get('kas')->result_array();
            if ($keluar != '') {
                foreach ($keluar as $data) {
                    $out += $data['nominal'];
                }
                $total = $nominal - $out;
            } else {
                $total = $nominal;
            }
        } else {
            $total = 0;
        }
        return $total;
    }

    public function getLast()
    {
        $this->db->order_by('idkas', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get('kas')->row_array();
        return $data;
    }
    public function getDetail($idkas)
    {
        $this->db->where('idkas', $idkas);
        $data = $this->db->get('kas');
        return $data;
    }

    public function tambahData($kodekas,$tanggal, $tipe, $nominal, $keterangan)
    {
        $data = [
            'kodekas' => $kodekas,
            'tanggal' => $tanggal,
            'tipe' => $tipe,
            'nominal' => $nominal,
            'keterangan' => $keterangan
        ];
        $query = $this->db->insert('kas', $data);
        return $query;
    }
    public function editData($idkas, $kodekas, $tanggal, $tipe, $nominal, $keterangan)
    {
        $this->db->set('kodekas', $kodekas);
        $this->db->set('tanggal', $tanggal);
        $this->db->set('tipe', $tipe);
        $this->db->set('nominal', $nominal);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('idkas', $idkas);
        $query = $this->db->update('kas');
        return $query;
    }
    public function deleteData($idkas)
    {
        $this->db->where('idkas', $idkas);
        $query = $this->db->delete('kas');
        return $query;
    }
}
