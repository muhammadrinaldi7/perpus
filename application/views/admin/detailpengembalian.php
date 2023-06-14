<?php $i = 0;
foreach ($pinjam as $data) :
    if ($i > 0) {
        break;
    }
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail <?= $title; ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/pengembalian'); ?>"><?= $title; ?></a></li>
                            <li class="breadcrumb-item active">Detail <?= $title; ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div id="cek-query" data-flashdata="<?= $this->session->tempdata('message'); ?>"></div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Data <?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table">
                                        <tr>
                                            <th colspan="3" class="bg-success">Data Peminjaman</th>
                                        </tr>
                                        <tr>
                                            <td>Kode Pinjam</td>
                                            <td>:</td>
                                            <td><?= $data['kodepinjam']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Peminjaman</td>
                                            <td>:</td>
                                            <td><?= longdate_indo($data['tglpinjam']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Lama Peminjaman</td>
                                            <td>:</td>
                                            <td><?= $data['lamapinjam']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Dikembalikan</td>
                                            <td>:</td>
                                            <td><?= longdate_indo($data['tgldikembalikan']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b><u>Peminjam</u></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kode Anggota</td>
                                            <td>:</td>
                                            <td><?= $data['kodeanggota']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?= $data['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Identitas(NIP/NIS)</td>
                                            <td>:</td>
                                            <td><?= $data['identitas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $data['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No.Hp/WA </td>
                                            <td>: </td>
                                            <td><?= $data['telp']; ?></td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered" id="dtbuku">
                                        <tr>
                                            <th colspan="3" class="bg-success">
                                                <b>Buku yang dipinjam : </b>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Kode Buku</th>
                                            <th>Judul</th>
                                            <th>Qty</th>
                                        </tr>
                                        <?php foreach ($pinjam as $dt) : ?>
                                            <tr>
                                                <td><?= $dt['kodebuku']; ?></td>
                                                <td><?= $dt['judul']; ?></td>
                                                <td><?= $dt['qty']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                    <?php
                                    $tgl1 = preg_replace('/[^0-9]/', '', $dt['tgldikembalikan']);
                                    $tgl2 = date('Ymd');
                                    $diff = $tgl2 - $tgl1;
                                    if ($diff > 0) {
                                        echo "<b>Keterangan Denda : </b><br> Telat Dikembalikan " . $diff . " hari <br>";
                                        $jml = 0;
                                        $bb = $this->peminjaman->getDetail($dt['kodepinjam'])->result_array();
                                        foreach ($bb as $b) {
                                            $d = $denda['biaya'] * $diff;
                                            $jml += $d * $b['qty'];
                                        }
                                        echo '<b class="text-danger">Denda yang harus dibayar : Rp ' . $jml . ',-</b>';
                                        echo '<br>untuk ' . count($bb) . ' buku';
                                    } else {
                                        echo "<b>Keterangan Denda :</b> Tidak ada denda";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-2 d-flex justify-content-between">
                                    <a href="<?= base_url('admin/pengembalian/'); ?>" class="btn btn-secondary">Kembali</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapuspinjam"><i class=" fas fa-trash-alt"></i> Hapus</a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Modal Hapus -->
    <div class="modal fade" id="hapuspinjam" data-backdrop="static" tabindex="-1" rak="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" rak="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('admin/pengembalian/hapusdata/' . $data['kodepinjam']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php $i++;
endforeach; ?>