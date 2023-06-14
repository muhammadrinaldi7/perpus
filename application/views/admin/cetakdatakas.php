<?php
// /include 'phpqrcode/qrlib.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kas</title>
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
    <center><h2>Data Kas</h2></center>
    <label class="">TOTAL KAS : Rp <?= $totalkas; ?>,-</label>
    <table style="border: 1px solid;border-collapse: collapse;" width="100%">
        <thead>
            <tr>
                <th align="left">No</th>
                <th>No.Kas</th>
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Keluar</th>
                                        <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            ?>
            <?php foreach ($kas as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
               <td><?= $data['kodekas']; ?></td>
                                            <td><?= longdate_indo(date('Y-m-d', strtotime($data['tanggal']))); ?></td>
                                            <td>
                                                <?php
                                                if ($data['tipe'] == 'masuk') {
                                                    echo 'Rp ' . $data['nominal'] . ',-';
                                                } else {
                                                    echo '-';
                                                } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($data['tipe'] == 'keluar') {
                                                    echo 'Rp ' . $data['nominal'] . ',-';
                                                } else {
                                                    echo '-';
                                                } ?>
                                            </td>
                                            <td><?= $data['keterangan']; ?></td>
            </tr>
   <?php endforeach; ?>
        </tbody>
        
    </table>
    
            
                    <!-- <img src="<?= base_url('assets/').'data/anggota/' . $data['foto']; ?>" width="80px"> -->
               
    
</body>

</html>