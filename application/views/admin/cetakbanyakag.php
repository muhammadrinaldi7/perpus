<?php
// /include 'phpqrcode/qrlib.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Anggota</title>
    <style>
        .box {
            border: 1px black solid;
            margin: 2px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php foreach ($anggota as $data) : ?>
        <table class="box">
            <tr>
                <!-- <td>
                            <center>
                                <img src="<?= 'assets/image/' . $setting['logo']; ?>" width="50px">
                            </center>
                        </td> -->
                <td colspan="2">
                    <center>
                        <b>KARTU ANGGOTA</b>
                        <br><b><?= $setting['title']; ?></b>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="./assets/data/anggota/' . $data['foto']; ?>" width="80px">
                </td>
                <td>
                    <table>
                        <tr>
                            <td>Kode Anggota</td>
                            <td>:</td>
                            <td><?= $data['kodeanggota'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $data['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>No.Hp/WA</td>
                            <td>:</td>
                            <td><?= $data['telp'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- <td></td> -->
                <td colspan="2">
                    <center>
                        <br>
                        <?php
                        // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                        // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data['kodeanggota'], $generator::TYPE_CODE_128, 2, 50)) . '">';
                        // QRcode::png('a');
                     
                                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                        echo $generator->getBarcode($data['kodeanggota'], $generator::TYPE_CODE_128, 1, 50);
                                        
                        ?>
                        <br>
                        <?= $data['kodeanggota']; ?>
                    </center>
                </td>
            </tr>
        </table><br><br>
    <?php endforeach; ?>
    
</body>

</html>