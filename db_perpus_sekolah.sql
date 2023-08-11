-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2023 pada 15.25
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `idanggota` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `kodeanggota` varchar(100) NOT NULL,
  `identitas` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`idanggota`, `role`, `kodeanggota`, `identitas`, `nama`, `telp`, `alamat`, `status`, `foto`, `email`) VALUES
(2, 'guru', 'G002', '910230910981230', 'Bambang S', '081283928320', 'Jl.Angsau', 'Staff', '20220111815avatar5.png', 'halyalvin@gmail.com'),
(8, 'siswa', 'S003', '20001239812389', 'Ahmad Munawir', '081234568798', 'Jl.Purnawirawan', 'X TKR', '20220111464avatar2.png', ''),
(12, 'siswa', 'S0012', '20001076212389', 'Siti Maimunah', '081345528690', 'Jl. Pabahanan', 'XI TKR', 'profildefault.jpg', ''),
(13, 'siswa', 'S0013', '20001296234389', 'Bella Ramadini', '087867775564', 'Jl. Panggung', 'XII TKR', 'profildefault.jpg', ''),
(14, 'siswa', 'S0014', '20001239817865', 'Ady Suprapto', '082112394921', 'Jl.Swadaya', 'X TAV', 'profildefault.jpg', ''),
(15, 'guru', 'G0015', '910231210981239', 'Yustinah', '08123213989', 'Jl.KNPI', 'Guru (Tenaga Pendidik)', 'profildefault.jpg', ''),
(16, 'siswa', 'S0016', '20001239812743', 'Muhammad Zainudin', '085389731568', 'Komp. Kijang Mas', 'XI TEI', 'profildefault.jpg', ''),
(20, 'siswa', 'S0017', '20001239578341', 'Zia Ambarwati', '082289885643', 'Jl. Panggung', 'XI TITL', '2022-10-27498lambang_kab_tanah_laut.png', 'zia@yahoo.com'),
(23, 'guru', 'G0021', '910239083981237', 'Kusrianto', '085789034126', 'Jl. Matah 2', 'Guru (Tenaga Pendidik)', 'profildefault.jpg', ''),
(24, 'guru', 'G0024', '910230910981238', 'Risdiana', '087865764565', 'Jl. Purnawirawan', 'Guru (Tenaga Pendidik)', 'profildefault.jpg', ''),
(25, 'guru', 'G0025', '910230914567232', 'Indah P', '085378980142', 'Jl. Desa Pemuda, KNPI', 'Guru (Tenaga Pendidik)', 'profildefault.jpg', ''),
(26, 'guru', 'G0026', '9102309105641230', 'Hadiansyah', '085246579073', 'Jl. Sarang Halang', 'Guru (Tenaga Pendidik)', 'profildefault.jpg', ''),
(27, 'guru', 'G0027', '1910711210009', 'Dwi Okta Eriawan', '081346234353', 'Jl. Antesa RT. 5B', 'Ketua Komite ', 'profildefault.jpg', ''),
(28, 'siswa', 'S0028', '002', 'halywavin', '085348465432', 'Jl. Kihajar', 'X TITL', 'profildefault.jpg', 'halyalvin@gmail.com'),
(29, 'guru', 'G0029', '001', 'avin', '08989999', 'nana', 'Kepala Sekolah', 'profildefault.jpg', 'avin@gmail.com'),
(30, 'guru', 'G0030', '12311321', 'Muhammad Haly Wavin', '08988', 'jl', 'Kepala Sekolah', 'profildefault.jpg', 'halyalvin@gmail.com'),
(31, 'siswa', 'S0031', '01', 'Alya Zulqa Erika', '090909', 'm', 'X TKR', 'profildefault.jpg', 'halyalvin@gmail.com'),
(32, 'guru', 'G0032', '1', 'q', '1', '1', 'Staff', 'profildefault.jpg', 'halyalvin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_denda`
--

CREATE TABLE `biaya_denda` (
  `idbiaya` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `tgltetap` date NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biaya_denda`
--

INSERT INTO `biaya_denda` (`idbiaya`, `biaya`, `status`, `keterangan`, `tgltetap`, `nama`) VALUES
(1, 5000, 'tidak aktif', 'Telat mengembalikan buku', '2021-12-28', 'Dwi Okta Eriawan'),
(8, 5000, 'aktif', 'Telat mengembalikan buku', '2022-01-24', 'Ahmad Munawir'),
(11, 5000, 'aktif', 'Telat mengembalikan buku', '2023-02-13', 'Muhammad Al Fatih'),
(12, 5000, 'tidak aktif', 'Telat mengembalikan buku', '2023-02-16', 'Risdiana'),
(13, 5000, 'tidak aktif', 'Telat mengembalikan buku', '2023-02-16', 'Zia Ambarwati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(11) NOT NULL,
  `tglmasuk` date NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `thnterbit` varchar(5) NOT NULL,
  `tempatterbit` varchar(200) NOT NULL,
  `halaman` varchar(100) NOT NULL,
  `tebal` varchar(100) NOT NULL,
  `rak` varchar(100) NOT NULL,
  `sampul` text NOT NULL,
  `kodebuku` varchar(100) NOT NULL,
  `sumberbuku` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `kodeklasifikasi` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `qr` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`idbuku`, `tglmasuk`, `isbn`, `judul`, `penulis`, `penerbit`, `thnterbit`, `tempatterbit`, `halaman`, `tebal`, `rak`, `sampul`, `kodebuku`, `sumberbuku`, `kategori`, `kodeklasifikasi`, `stok`, `qr`, `deskripsi`) VALUES
(373, '2023-07-14', '0902982888', 'Buku Paket Bahasa Indonesia Kelas XI', '-', 'Kementrian Pendidikan', '2017', 'Jakarta', '200', '2cm', 'Rak Buku 001', '2023-07-14283cover_buku.jpg', '001/01/2022', 'BOS', 'Buku Sekolah', '400', 10, 'a62e9a0d98c0ca86fa2ea832786a4b9a.png', 'Buku paket pelajaran Bahasa Indonesia untuk kelas 11'),
(374, '2023-07-16', '2772872801', 'Buku Paket Bahasa Inggris Kelas XI', '-', 'Kementrian Pendidikan', '2020', 'Jakarta', '120', '3cm', 'Rak Buku 001', '20230717449bing.jpg', '112/16/2022', 'BOS', 'Buku Sekolah', '400', 30, 'fc8db0e47fc80686acf01d271d1ea015.png', 'Buku paket pelajaran Bahasa Inggris untuk kelas 11'),
(375, '2023-07-17', '8790623453', 'Buku Paket Kimia Kelas XI', '-', 'Kementrian Pendidikan', '2020', 'Jakarta', '139', '2cm', 'Rak Buku 001', '2023-07-17883kimia.jpg', '111/01/2022', 'BOS', 'Buku Umum', '000', 38, 'c7d18b9ae391c0b8e5c3949819720308.png', 'Buku paket pelajaran Kimia untuk kelas 11'),
(376, '2023-07-17', '7834521321', 'Buku Paket Matematika Kelas XI', '-', 'Kementrian Pendidikan', '2021', 'Jakarta', '198', '2cm', 'Rak Buku 001', '2023-07-17984mtk.jpg', '119/87/2021', 'BOS', 'Buku Umum', '000', 35, 'd262fb675e5a5ee734b85aa7c1bd1456.png', 'Buku paket pelajaran Matematika untuk kelas 11'),
(377, '2023-07-17', '6745390765', 'Buku Paket Pendidikan Jasmani & Kesehatan Kelas XI', '-', 'Erlangga', '2021', 'Jakarta', '100', '1,5cm', 'Rak Buku 001', '2023-07-17413penjas.jpg', '312/09/2021', 'BOS', 'Buku Sekolah', '700', 43, '395ed1c8f7275c3e7508bfa4c6889697.png', 'Buku paket pelajaran Penjaskes untuk kelas 11'),
(378, '2023-07-23', '1', 'hsjhaj', 'hajhja', 'haj', '123', 'hssh', '12', '1', 'Rak Buku 001', 'noimage.jpg', '1', 'BOS', 'Buku Sekolah', '000', 1, '6dc6e54d0cbb1bc4fbaaa479a6e72e78.png', 'ggdydgy'),
(379, '2023-07-28', '1212', 'dfdfd', 'fddfd', 'fdfd', '2022', 'ghghg', '111', '67', 'Rak Buku 001', 'noimage.jpg', '11111', 'BOS', 'Buku Umum', '000', 34, 'add892b06c93d1a0fdb8f52f30243d5e.png', 'ghghjg'),
(380, '2023-07-28', '222565', 'sdsds', 'sdsds', 'ds', '2021', 're', '34', '11', 'Rak Buku 001', 'noimage.jpg', '222', 'BOS', 'Buku Umum', '000', 331, '3212c56aee5dc3ae227f96839366ab5b.png', 'qewe'),
(381, '2023-08-03', '1111', 'eqeaw', 'ewwe', 'eaeaw', '2021', 'osus', '13', '11', 'Rak Buku 001', 'noimage.jpg', '1', 'BOS', 'Buku Umum', '100', 11, '5a9021da4f93878d9c106e884cd5e82b.png', 'awawawsw'),
(382, '2023-08-03', '277278278', 'ahahaahah', 'huwuwhu', 'whuhsbs', '2021', 'abhsbhs', '100', '2 cm', 'Rak Buku 001', '2023-08-03830kimia.jpg', '112/171', 'BOS', 'Buku Sekolah', '000', 29, '1fdbb296c593ec13e7992eea39b81e4c.png', 'lkljikhibbsjbdidhishidhishdihdishdhncnkncnc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE `denda` (
  `iddenda` int(11) NOT NULL,
  `idpinjam` int(11) NOT NULL,
  `kodepinjam` varchar(100) NOT NULL,
  `tgldenda` date NOT NULL,
  `lamawaktu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `denda`
--

INSERT INTO `denda` (`iddenda`, `idpinjam`, `kodepinjam`, `tgldenda`, `lamawaktu`, `qty`, `biaya`) VALUES
(24, 58, 'PJ0058', '2023-07-23', 1, 3, 75000),
(25, 64, 'PJ0063', '2023-07-25', 1, 5, 125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `idjabatan` int(11) NOT NULL,
  `namajabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`idjabatan`, `namajabatan`) VALUES
(8, 'Kepala Sekolah'),
(9, 'Wakil Kepala Sekolah Kesiswaaan'),
(11, 'Wakil Kepala Sekolah Akademik'),
(12, 'Wakil Kepala sekolah Infrastruktur'),
(13, 'Guru (Tenaga Pendidik)'),
(14, 'Staff'),
(16, 'Ketua Komite ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `idkas` int(11) NOT NULL,
  `kodekas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`idkas`, `kodekas`, `tanggal`, `tipe`, `nominal`, `keterangan`) VALUES
(5, 'KAS/OUT/18012022/5', '2022-01-18', 'keluar', 15000, 'Beli Sampul'),
(6, 'KAS/IN/04012022/6', '2022-01-04', 'masuk', 50000, 'Denda Hilang Buku'),
(8, 'KAS/OUT/20012022/7', '2022-01-20', 'keluar', 2000, 'Beli Pulpen'),
(9, 'KAS/IN/27012022/9', '2022-01-27', 'masuk', 2000, 'telat'),
(14, 'KAS/OUT/27012018/14', '2018-01-27', 'keluar', 10000, 'Beli Alat Kebersihan'),
(15, 'KAS/IN/27012022/15', '2022-01-27', 'masuk', 20000, 'telat'),
(16, 'KAS/IN/27012022/16', '2022-01-27', 'masuk', 4000, 'telat'),
(17, 'KAS/OUT/29012022/17', '2022-01-29', 'keluar', 10000, 'Beli Keperluan Perpus'),
(18, 'KAS/IN/01022022/18', '2022-02-01', 'masuk', 8000, 'telat'),
(19, 'KAS/IN/01022022/19', '2022-02-01', 'masuk', 1000, 'telat'),
(20, 'KAS/IN/01022022/20', '2022-02-01', 'masuk', 5000, 'telat'),
(21, 'KAS/IN/01022022/21', '2022-02-01', 'masuk', 4000, 'telat'),
(24, 'KAS/IN/18012023/22', '2023-01-18', 'masuk', 1000000, 'BOS'),
(26, 'KAS/IN/13022023/25', '2023-02-13', 'masuk', 2000, 'telat'),
(27, 'KAS/IN/21022023/27', '2023-02-21', 'masuk', 25000, 'telat'),
(28, 'KAS/IN/08032023/28', '2023-03-08', 'masuk', 110000, 'telat'),
(29, 'KAS/IN/05072023/29', '2023-07-05', 'masuk', 120000, 'telat'),
(30, 'KAS/IN/07072023/30', '2023-07-07', 'masuk', 60000, 'telat'),
(31, 'PJ0044', '2023-07-12', 'masuk', 85000, 'telat'),
(32, 'KAS/IN/12072023/32', '2023-07-12', 'masuk', 85000, 'telat'),
(33, 'PJ0050', '2023-07-16', 'masuk', 20000, 'telat'),
(34, 'KAS/IN/16072023/34', '2023-07-16', 'masuk', 20000, 'telat'),
(35, 'PJ0052', '2023-07-16', 'masuk', 25000, 'telat'),
(36, 'KAS/IN/16072023/36', '2023-07-16', 'masuk', 25000, 'telat'),
(37, 'PJ0058', '2023-07-23', 'masuk', 75000, 'telat'),
(38, 'KAS/IN/23072023/38', '2023-07-23', 'masuk', 75000, 'telat'),
(39, 'PJ0063', '2023-07-25', 'masuk', 125000, 'telat'),
(40, 'KAS/IN/25072023/40', '2023-07-25', 'masuk', 125000, 'telat'),
(41, 'KAS/OUT/26072023/41', '2023-07-26', 'keluar', 10000, 'beli pensil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `kategori`, `deskripsi`) VALUES
(1, 'Buku Umum', 'Cerita, Novel, dll'),
(2, 'Buku Sekolah', 'Matematika, IPA, dll'),
(8, 'Karya Ilmiah', 'Makalah, Jurnal, Essay, dll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(11) NOT NULL,
  `namakelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`idkelas`, `namakelas`) VALUES
(1, 'X TKR'),
(4, 'XI TKR'),
(6, 'XII TKR'),
(15, 'X TAV'),
(18, 'XI TAV'),
(20, 'XII TAV'),
(21, 'X TEI'),
(22, 'XI TEI'),
(23, 'XII TEI'),
(24, 'X TITL'),
(25, 'XI TITL'),
(26, 'XII TITL'),
(27, 'X AK'),
(28, 'XI AK'),
(29, 'XII AK'),
(30, 'XII AK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `idklasifikasi` int(11) NOT NULL,
  `kodeklasifikasi` varchar(100) NOT NULL,
  `klasifikasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`idklasifikasi`, `kodeklasifikasi`, `klasifikasi`) VALUES
(1, '000', 'Karya Umum'),
(2, '100', 'Filsafat'),
(4, '200', 'Agama'),
(5, '300', 'Ilmu-Ilmu Sosial'),
(6, '400', 'Bahasa'),
(7, '500', 'Ilmu-Ilmu Murni'),
(8, '600', 'Ilmu-Ilmu Terapan (Teknologi)'),
(9, '700', 'Kesenian, Olahraga, dan Hiburan'),
(10, '800', 'Kesusesasteraan'),
(11, '900', 'Geografi, Sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `idpinjam` int(11) NOT NULL,
  `kodepinjam` varchar(100) NOT NULL,
  `kodeanggota` varchar(100) NOT NULL,
  `kodebuku` varchar(100) NOT NULL,
  `idbuku` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tglpinjam` date NOT NULL,
  `lamapinjam` int(11) NOT NULL,
  `tgldikembalikan` date NOT NULL,
  `tglpengembalian` date NOT NULL,
  `qty` int(11) NOT NULL,
  `idanggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`idpinjam`, `kodepinjam`, `kodeanggota`, `kodebuku`, `idbuku`, `status`, `tglpinjam`, `lamapinjam`, `tgldikembalikan`, `tglpengembalian`, `qty`, `idanggota`) VALUES
(55, 'PJ001', 'G002', '112/16/0001', 374, 'dikembalikan', '2023-07-16', 2, '2023-07-18', '2023-07-16', 10, 2),
(57, 'PJ0056', 'G0030', '001/01/2022', 373, 'dipinjam', '2023-07-16', 7, '2023-07-23', '0000-00-00', 10, 30),
(58, 'PJ0058', 'G0021', '312/09/2021', 377, 'dikembalikan', '2023-07-17', 1, '2023-07-18', '2023-07-23', 3, 23),
(59, 'PJ0059', 'G0029', '119/87/2021', 376, 'dikembalikan', '2023-07-19', 1, '2023-07-20', '2023-07-19', 6, 29),
(60, 'PJ0060', 'S0028', '119/87/2021', 376, 'dikembalikan', '2023-07-19', 1, '2023-07-20', '2023-07-19', 5, 28),
(61, 'PJ0061', 'S0028', '119/87/2021', 376, 'dikembalikan', '2023-07-19', 1, '2023-07-20', '2023-07-19', 5, 28),
(62, 'PJ0062', 'S0031', '119/87/2021', 376, 'dikembalikan', '2023-07-19', 1, '2023-07-20', '2023-07-19', 5, 31),
(64, 'PJ0063', 'S0031', '119/87/2021', 376, 'dikembalikan', '2023-07-19', 1, '2023-07-20', '2023-07-25', 5, 31),
(65, 'PJ0065', 'S0031', '111/01/2022', 375, 'dikembalikan', '2023-07-20', 1, '2023-07-21', '2023-07-20', 10, 31),
(66, 'PJ0066', 'S0012', '111/01/2022', 375, 'dipinjam', '2023-07-20', 5, '2023-07-25', '0000-00-00', 2, 12),
(67, 'PJ0067', 'G002', '001/01/2022', 373, 'dipinjam', '2023-07-23', 7, '2023-07-30', '0000-00-00', 1, 2),
(68, 'PJ0068', 'G002', '001/01/2022', 373, 'dipinjam', '2023-07-23', 7, '2023-07-30', '0000-00-00', 1, 2),
(69, 'PJ0069', 'S0031', '001/01/2022', 373, 'dipinjam', '2023-07-23', 1, '2023-07-24', '0000-00-00', 1, 31),
(70, 'PJ0070', 'G002', '001/01/2022', 373, 'dipinjam', '2023-07-25', 7, '2023-08-01', '0000-00-00', 2, 2),
(71, 'PJ0071', 'S003', '222', 380, 'dipinjam', '2023-07-31', 1, '2023-08-01', '0000-00-00', 1, 8),
(72, 'PJ0072', 'S0031', '112/171', 382, 'dipinjam', '2023-08-03', 1, '2023-08-04', '0000-00-00', 1, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `idpresensi` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `keperluan` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`idpresensi`, `nama`, `status`, `keperluan`, `timestamp`) VALUES
(4, 'Muhammad Al Fatih', 'Dinas Pendidikan', 'Monitoring Perpustakaan Sekolah', '2022-01-17 15:33:47'),
(6, 'Fredi S', 'Dinas Pendidikan', 'Monitoring perpustakaan', '2022-01-29 06:44:23'),
(7, 'Zia Ambarwati', 'Kelas X TEI', 'Membaca buku\r\n', '2022-02-01 04:18:42'),
(9, 'Risdiana', 'Guru', 'Berkunjung', '2023-02-07 14:35:58'),
(10, 'Risa Anggiana', 'Kelas XI TITL', 'Berkunjung', '2023-02-07 14:36:50'),
(11, 'Clara Septiani', 'Kelas XI TITL', 'Berkunjung', '2023-02-07 14:37:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `idrak` int(11) NOT NULL,
  `namarak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`idrak`, `namarak`) VALUES
(1, 'Rak Buku 001'),
(2, 'Rak Buku 002'),
(7, 'Rak Buku 003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `idsetting` int(11) NOT NULL,
  `logo` text NOT NULL,
  `latar` text NOT NULL,
  `title` varchar(200) NOT NULL,
  `initial` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`idsetting`, `logo`, `latar`, `title`, `initial`) VALUES
(1, '2022-01-0300logo1.png', '2022-01-0300logo.jpg', 'PERPUSTAKAAN SMKN 2 PELAIHARI', 'Perpus SMKN2PLH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber_buku`
--

CREATE TABLE `sumber_buku` (
  `idsumber` int(11) NOT NULL,
  `kodesumber` varchar(10) NOT NULL,
  `sumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sumber_buku`
--

INSERT INTO `sumber_buku` (`idsumber`, `kodesumber`, `sumber`) VALUES
(1, 'BOS', 'Bantuan dana BOS TAHUN 2020'),
(2, 'H', 'Bantuan Hibah'),
(9, 'BOS', 'Bantuan dana BOS TAHUN 2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `pass`) VALUES
(1, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indeks untuk tabel `biaya_denda`
--
ALTER TABLE `biaya_denda`
  ADD PRIMARY KEY (`idbiaya`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indeks untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`iddenda`),
  ADD KEY `fk_pinjam` (`idpinjam`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`idkas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`idklasifikasi`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idpinjam`),
  ADD KEY `fk_anggota` (`idanggota`),
  ADD KEY `fk_buku` (`idbuku`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`idpresensi`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`idrak`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`idsetting`);

--
-- Indeks untuk tabel `sumber_buku`
--
ALTER TABLE `sumber_buku`
  ADD PRIMARY KEY (`idsumber`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `idanggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `biaya_denda`
--
ALTER TABLE `biaya_denda`
  MODIFY `idbiaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT untuk tabel `denda`
--
ALTER TABLE `denda`
  MODIFY `iddenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idjabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `idkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `idklasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `idpinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `idpresensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `idrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `idsetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sumber_buku`
--
ALTER TABLE `sumber_buku`
  MODIFY `idsumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `fk_pinjam` FOREIGN KEY (`idpinjam`) REFERENCES `peminjaman` (`idpinjam`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_anggota` FOREIGN KEY (`idanggota`) REFERENCES `anggota` (`idanggota`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buku` FOREIGN KEY (`idbuku`) REFERENCES `buku` (`idbuku`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
