
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Data <?= $title; ?>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <!--  <a href="<?= base_url('admin/kas/cetakdatakas'); ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> Pdf</a>
                                <br>
                                <br> -->
                            <!-- <label class="">TOTAL KAS : Rp <?= $totalkas; ?>,-</label> -->
                            <table id="datatableperpus" class="table table-bordered w-100 table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No.Pinjam</th>
                                        <th>ID Anggota</th>
                                        <th>Nama</th>
                                        <th>Pinjam</th>
                                        <th>Balik</th>
                                        <th>Denda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($listdenda as $data) : ?>
                                         <tr>
                                            <td><?= $i + 1; ?></td>
                                            <td><?= $data['kodepinjam']; ?></td>
                                            <td><?= $data['kodeanggota']; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['tglpinjam']; ?></td>
                                            <td><?= $data['tgldikembalikan']; ?></td>
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
                                                    echo '<b class="text-danger">Rp ' .number_format($jml, 2, ",", ".") . ',-</b>';
                                                    echo '<br><small>*untuk ' . count($bb) . ' buku</small>';
                                                } else {
                                                    echo "Tidak Ada Denda";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
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
<!-- /.content-wrapper