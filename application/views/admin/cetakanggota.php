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
            float: left;
            margin: 1px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="box">
        <table>
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
                    <img src="<?= base_url('assets/').'data/anggota/' . $anggota['foto']; ?>" width="80px">
                </td>
                <td>
                    <table>
                        <tr>
                            <td>Kode Anggota</td>
                            <td>:</td>
                            <td><?= $anggota['kodeanggota'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $anggota['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $anggota['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>No.Hp/WA</td>
                            <td>:</td>
                            <td><?= $anggota['telp'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <br>
                        <?php
                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                        echo $generator->getBarcode($anggota['kodeanggota'], $generator::TYPE_CODE_128, 1, 50);
                        ?>
                        <br>
                        <?= $anggota['kodeanggota']; ?>
                    </center>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>