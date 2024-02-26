<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bukuhilang_m extends CI_Model
{
    public function getAll()
    {
        $this->db->order_by('idbuku', 'DESC');
        $data = $this->db->get('buku');
        return $data;
    }

    public function getComplt()
    {
        $this->db->query('SELECT * FROM buku_hilang bh 
        LEFT JOIN buku b ON b.idbuku = bh.idbuku 
        LEFT JOIN anggota a ON a.idanggota = bh.idanggota
        LEFT JOIN peminjaman p ON p.idpinjam = bh.idpinjam');
    }
    public function getBuku($kodebuku)
    {
        $this->db->where('idbuku', $kodebuku);
        $data = $this->db->get('buku');
        return $data;
    }
    public function getLast()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get('buku_hilang')->row_array();
        return $data;
    }
    public function getDetail($idbuku)
    {
        $this->db->where('idbuku', $idbuku);
        $data = $this->db->get('buku');
        return $data;
    }
    public function tambahData($isbn, $judul, $penulis, $penerbit, $thnterbit, $tempatterbit, $halaman, $tebal, $rak, $sampul, $kodebuku, $sumberbuku, $kategori, $kodeklasifikasi, $stok,$qr,$deskripsi)
    {
        $data = [
            'isbn' => $isbn,
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'thnterbit' => $thnterbit,
            'tempatterbit' => $tempatterbit,
            'halaman' => $halaman,
            'tebal' => $tebal,
            'rak' => $rak,
            'sampul' => $sampul,
            'kodebuku' => $kodebuku,
            'sumberbuku' => $sumberbuku,
            'kategori' => $kategori,
            'kodeklasifikasi' => $kodeklasifikasi,
            'stok' => $stok,
			'tglmasuk' => date("Y-m-d"),
            'qr' => $qr,
            'deskripsi' => $deskripsi

        ];
        // var_dump($data);exit;
        $query = $this->db->insert('buku', $data);
        return $query;
    }
    public function editData($idbuku, $isbn, $judul, $penulis, $penerbit, $thnterbit, $tempatterbit, $halaman, $tebal, $rak, $sampul, $kodebuku, $sumberbuku, $kategori, $kodeklasifikasi, $stok, $deskripsi)
    {
        $this->db->set('isbn', $isbn);
        $this->db->set('judul', $judul);
        $this->db->set('penulis', $penulis);
        $this->db->set('penerbit', $penerbit);
        $this->db->set('thnterbit', $thnterbit);
        $this->db->set('tempatterbit', $tempatterbit);
        $this->db->set('halaman', $halaman);
        $this->db->set('tebal', $tebal);
        $this->db->set('rak', $rak);
        $this->db->set('sampul', $sampul);
        $this->db->set('kodebuku', $kodebuku);
        $this->db->set('sumberbuku', $sumberbuku);
        $this->db->set('kategori', $kategori);
        $this->db->set('kodeklasifikasi', $kodeklasifikasi);
        $this->db->set('stok', $stok);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->where('idbuku', $idbuku);
        $query = $this->db->update('buku');
        return $query;
    }
    public function deleteData($idbuku)
    {
        $this->db->where('idbuku', $idbuku);
        $query = $this->db->delete('buku');
        return $query;
    }
	public function getID()
    {
        $this->db->select('max(idbuku) + 1 as ID');
        $data = $this->db->get('buku');
        return $data->result()[0]->ID;
    }
}
