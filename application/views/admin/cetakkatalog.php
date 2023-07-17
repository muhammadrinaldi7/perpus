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
        }
    </style>
</head>

<body>
    <table class="box" style="width: 200px;">
        <tr>
            <td>
                <br>
                <center>
                    <?php
                    // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    //                     echo $generator->getBarcode($katalog['kodebuku'], $generator::TYPE_CODE_128, 1, 50);
                    ?>
                    <br>
                    <img src="assets/image/<?php echo $katalog['qr'] ?>">
                    ,br>
                    Kode buku : <?= $katalog['kodebuku']; ?>
                    <br>
                    Judul : <?= $katalog['judul']; ?>
                    <br>
                    Tanggal terima : <?= longdate_indo($katalog['tglmasuk']); ?>
                    <br>
                    Eks/Stok: <?= $katalog['halaman'] . "/" . $katalog['stok']; ?>
                    <br>
                </center>
            </td>
        </tr>
    </table>
</body>

</html>