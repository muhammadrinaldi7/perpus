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
            margin: 1px;
            padding: 5px;
            height: 100px;
        }
    </style>
</head>

<body>
    <?php foreach ($katalog as $data) : ?>
        <table class="box" style="width: 200px;">
            <tr>
                <td>
                    <center>
                        <?php
                        // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                        //                 echo $generator->getBarcode($data['kodebuku'], $generator::TYPE_CODE_128, 1, 50);

                        ?>
                        <img src="assets/image/<?php echo $data['qr'] ?>">
                        <br>
                        Kode buku : <?= $data['kodebuku']; ?>
                        <br>
                        Judul : <?= $data['judul']; ?>
                        <br>
                        Tanggal terima : <?= longdate_indo($data['tglmasuk']); ?>
                        <br>
                        Eks/Stok : <?= $data['halaman'] . "/" . $data['stok']; ?>
                        <br>
                    </center>
                </td>
            </tr>
        </table>
        <br><br>
    <?php endforeach; ?>
</body>

</html>