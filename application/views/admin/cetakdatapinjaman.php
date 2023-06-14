<?php
// /include 'phpqrcode/qrlib.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Peminjaman</title>
    <style>
        .box {
            border: 1px black solid;
            margin: 2px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <table border="0" align="center" width="100%">
        <tr align="center">
                    <td width="1px">
                        <img width="100px" src="./assets/image/lg.jpg">
                    </td>
                    <td align="center" style="margin-left:100">
                        <font align="center" size="4">PEMERINTAH PROVINSI KALIMANTAN SELATAN</font> <br>
                        <font align="center" size="4">DINAS PENDIDIKAN DAN KEBUDAYAAN</font> <br>
                        <font align="center" size="4">SMK NEGERI 2 PELAIHARI</font> <br>
                        <font align="center" size="2">Jl. Husni Thamrin Ds. Pemuda (KNPI) Pemuda,</font><br>
                        <font align="center" size="2">Kecamatan. Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70814</font><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr size="3px" color="black">
                    </td>
                </tr>
            </table>
    <center><h2>Data Peminjaman</h2></center>
    <table style="border: 1px solid;border-collapse: collapse;" width="100%">
        <thead>
            <tr>
                <th align="left">No</th>
                <th>No.Pinjam</th>
                                        <th>ID Anggota</th>
                                        <th>Nama</th>
                                        <th>Pinjam</th>
                                        <th>Balik</th>
                                        <th>Status</th>
                                        <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            ?>
            <?php foreach ($p as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
               <td><?= $data['kodepinjam']; ?></td>
                                            <td><?= $data['kodeanggota']; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['tglpinjam']; ?></td>
                                            <td><?= $data['tgldikembalikan']; ?></td>
                                            <td><?= $data['statpe']; ?></td>
                                            <td>
                                                <?php
                                                $tghitung = date('Ymd') - preg_replace('/[^0-9]/', '', $data['tgldikembalikan']);
                                                if ($tghitung > 0) {
                                                    $tgl1 = date_create($data['tgldikembalikan']);
                                                    $tgl2 = date_create();
                                                    $beda = date_diff($tgl2, $tgl1);
                                                    $diff = $beda->d;
                                                    echo "<small>" . $diff . " hari</small> <br>";
                                                    $bb = $this->peminjaman->getDetail($data['kodepinjam'])->result_array();
                                                    $jml = 0;
                                                    $bb = $this->peminjaman->getDetail($data['kodepinjam'])->result_array();
                                                    foreach ($bb as $b) {
                                                        $d = $denda['biaya'] * $diff;
                                                        $jml += $d * $b['qty'];
                                                    }
                                                    echo '<b class="text-danger">Rp ' . $jml . ',-</b>';
                                                    echo '<br><small>*untuk ' . count($bb) . ' buku</small>';
                                                } else {
                                                    echo "Tidak Ada Denda";
                                                }
                                                ?>
                                            </td>
            </tr>
   <?php endforeach; ?>
        </tbody>
        
    </table>
    
            
                    <!-- <img src="<?= base_url('assets/').'data/anggota/' . $data['foto']; ?>" width="80px"> -->
               
    
</body>

</html>