<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_m extends CI_Model
{
    public function getPeminjaman()
    {
        $this->db->select('idpinjam, kodepinjam, peminjaman.kodeanggota, peminjaman.idanggota, anggota.kodeanggota, identitas, nama,telp, alamat,anggota.status as status, kodebuku, idbuku, peminjaman.status as statpe, tglpinjam, lamapinjam, tgldikembalikan, tglpengembalian, qty');
        $this->db->where('peminjaman.status', 'dipinjam');
        $this->db->join('anggota', 'peminjaman.idanggota=anggota.idanggota');
        $this->db->group_by('kodepinjam');
        $this->db->order_by('idpinjam', 'ASC');
        $data = $this->db->get('peminjaman');
        return $data;
    }
    public function getPeminjamanFull()
    {
        $this->db->select('idpinjam, kodepinjam, peminjaman.kodeanggota, peminjaman.idanggota, anggota.kodeanggota, identitas, nama,telp, alamat,anggota.status as status, buku.kodebuku, buku.idbuku, peminjaman.status as statpe, tglpinjam, lamapinjam, tgldikembalikan, tglpengembalian, qty, judul');
        $this->db->where('peminjaman.status', 'dipinjam');
        $this->db->join('anggota', 'peminjaman.idanggota=anggota.idanggota','left');
        $this->db->join('buku', 'peminjaman.idbuku=buku.idbuku','left');
        $this->db->group_by('kodepinjam');
        $this->db->order_by('idpinjam', 'ASC');
        $data = $this->db->get('peminjaman');
        return $data;
    }
    public function getPengembalian()
    {
        $this->db->select('peminjaman.idpinjam as idpinjam, peminjaman.kodepinjam as kodepinjam, peminjaman.kodeanggota, peminjaman.idanggota, anggota.kodeanggota, identitas, nama,telp, alamat,anggota.status as status, kodebuku, idbuku, peminjaman.status as statpe, tglpinjam, lamapinjam, tgldikembalikan, tglpengembalian, peminjaman.qty as qty, SUM(biaya) as denda');
        $this->db->where('peminjaman.status', 'dikembalikan');
        $this->db->join('anggota', 'peminjaman.idanggota=anggota.idanggota');
        $this->db->join('denda', 'peminjaman.idpinjam=denda.idpinjam', 'LEFT');
        $this->db->group_by('kodepinjam');
        $this->db->order_by('idpinjam', 'ASC');
        $data = $this->db->get('peminjaman');
        return $data;
    }
    public function getLast()
    {
        $this->db->order_by('idpinjam', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get('peminjaman')->row_array();
        return $data;
    }
    public function getDetail($kodepinjam)
    {
        $this->db->select('idpinjam, kodepinjam, peminjaman.kodeanggota, peminjaman.idanggota, anggota.kodeanggota, identitas, nama,telp, alamat,anggota.status as status, peminjaman.kodebuku as kodebuku, peminjaman.idbuku as idbuku, peminjaman.status as statpe, tglpinjam, lamapinjam, tgldikembalikan, qty, judul');
        $this->db->where('kodepinjam', $kodepinjam);
        $this->db->join('anggota', 'peminjaman.idanggota=anggota.idanggota');
        $this->db->join('buku', 'peminjaman.idbuku=buku.idbuku');
        $data = $this->db->get('peminjaman');
        return $data;
    }
    public function tambahData($kodepinjam, $kodeanggota, $kodebuku, $idbuku, $status, $tglpinjam, $lamapinjam, $tgldikembalikan, $qty, $idanggota)
    {

        $cari=$this->db->query("SELECT stok from buku where idbuku='$idbuku'")->row_array();
        $stok=$cari['stok'];
        $stok_akhir=$stok-$qty;


        $upd=$this->db->query("UPDATE buku set stok='$stok_akhir' where idbuku='$idbuku'");
        $data = [
            'kodepinjam' => $kodepinjam,
            'kodeanggota' => $kodeanggota,
            'kodebuku' => $kodebuku,
            'idbuku' => $idbuku,
            'status' => $status,
            'tglpinjam' => $tglpinjam,
            'lamapinjam' => $lamapinjam,
            'tgldikembalikan' => $tgldikembalikan,
            'qty' => $qty,
            'idanggota' => $idanggota,
        ];
        $query = $this->db->insert('peminjaman', $data);
        return $query;
    }
    public function kembalikan($kodepinjam)
    {
        $cari=$this->db->query("SELECT * FROM peminjaman where kodepinjam='$kodepinjam'")->row_array();

        $kodebuku=$cari['kodebuku'];
        $qty=$cari['qty'];

        $cek=$this->db->query("SELECT * FROM buku where kodebuku='$kodebuku'")->row_array();
        $stok=$cek['stok'];
        $akhir=$stok+$qty;


$this->db->set('stok', $akhir);
        $this->db->where('kodebuku', $kodebuku);
        $this->db->update('buku');

        $this->db->set('status', 'dikembalikan');
        $this->db->set('tglpengembalian', date('Y-m-d'));
        $this->db->where('kodepinjam', $kodepinjam);
        $kembali = $this->db->update('peminjaman');
        return $kembali;
    }
    public function deleteData($kodepinjam)
    {
        $this->db->where('kodepinjam', $kodepinjam);
        $query = $this->db->delete('peminjaman');
        return $query;
    }
}
