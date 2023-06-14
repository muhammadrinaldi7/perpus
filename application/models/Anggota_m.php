<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_m extends CI_Model
{
    public function getAll()
    {
        $data = $this->db->get('anggota');
        return $data;
    }
    public function getAnggota($kodeanggota)
    {
        $this->db->where('kodeanggota', $kodeanggota);
        $data = $this->db->get('anggota');
        return $data;
    }
    public function getGuru()
    {
        $this->db->where('role', 'guru');
        $this->db->order_by('idanggota', 'ASC');
        $data = $this->db->get('anggota');
        return $data;
    }
    public function getSiswa()
    {
        $this->db->where('role', 'siswa');
        $this->db->order_by('idanggota', 'ASC');
        $data = $this->db->get('anggota');
        return $data;
    }
    public function getLast()
    {
        $this->db->order_by('idanggota', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get('anggota')->row_array();
        return $data;
    }
    public function getDetail($idanggota)
    {
        $this->db->where('idanggota', $idanggota);
        $data = $this->db->get('anggota');
        return $data;
    }
    public function tambahData($role, $kodeanggota, $identitas, $nama, $telp, $alamat, $status, $foto)
    {
        $data = [
            'role' => $role,
            'kodeanggota' => $kodeanggota,
            'identitas' => $identitas,
            'nama' => $nama,
            'telp' => $telp,
            'alamat' => $alamat,
            'status' => $status,
            'foto' => $foto,
        ];
        $query = $this->db->insert('anggota', $data);
        return $query;
    }
    public function ubahStatus($status, $idanggota)
    {
        $this->db->set('status', $status);
        $this->db->where('idanggota', $idanggota);
        $ubah = $this->db->update('anggota');
        return $ubah;
    }
    public function editData($idanggota, $role, $kodeanggota, $identitas, $nama, $telp, $alamat, $status, $foto)
    {
        $this->db->set('role', $role);
        $this->db->set('kodeanggota', $kodeanggota);
        $this->db->set('identitas', $identitas);
        $this->db->set('nama', $nama);
        $this->db->set('telp', $telp);
        $this->db->set('alamat', $alamat);
        $this->db->set('status', $status);
        $this->db->set('foto', $foto);
        $this->db->where('idanggota', $idanggota);
        $query = $this->db->update('anggota');
        return $query;
    }
    public function deleteData($idanggota)
    {
        $this->db->where('idanggota', $idanggota);
        $query = $this->db->delete('anggota');
        return $query;
    }
	
	public function getID()
    {
        $this->db->select('max(idanggota) + 1 as ID');
        $data = $this->db->get('anggota');
        return $data->result()[0]->ID;
    }
}
