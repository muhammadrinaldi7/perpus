<?php
// /include 'phpqrcode/qrlib.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Katalog</title>
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
                        <img width="100px" src="./assets/image/logo2.jpg">
                    </td>
                    <td align="center" style="margin-left:100">
                        <font align="center" size="4">PEMERINTAH PROVINSI KALIMANTAN TENGAH</font> <br>
                        <font align="center" size="4">KEMENTERIAN AGAMA KABUPATEN KAPUAS</font> <br>
                        <font align="center" size="4">MTs NEGERI 2 KAPUAS</font> <br>
                        <font align="center" size="2">Jl. Trans Kalimantan Km. 9,</font><br>
                        <font align="center" size="2">Kecamatan. Anjir Serapat Barat, Kabupaten Kapuas, Kalimantan Tengah</font><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr size="3px" color="black">
                    </td>
                </tr>
            </table>
    <center><h2>Data Katalog</h2></center>
     <table border="1" style="border: 1px solid;border-collapse: collapse;" width="100%">
        <thead>
            <tr>
                <th align="left">No</th>
               <th>Kode Buku</th>
                                            <th>Tgl Masuk</th>
                                            <th>ISBN</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun</th>
                                            <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            ?>
            <?php foreach ($katalog as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['kodebuku']; ?></td>
                                                <td><?= longdate_indo($data['tglmasuk']); ?></td>
                                                <td><?= $data['isbn']; ?></td>
                                                <td><?= $data['judul']; ?></td>
                                                <td><?= $data['penulis']; ?></td>
                                                <td><?= $data['penerbit']; ?></td>
                                                <td><?= $data['thnterbit']; ?></td>
                                                <td><?= $data['stok']; ?></td>
            </tr>
   <?php endforeach; ?>
        </tbody>
        
    </table>
    
            
                    <!-- <img src="<?= base_url('assets/').'data/anggota/' . $data['foto']; ?>" width="80px"> -->
               
    
</body>

</html>