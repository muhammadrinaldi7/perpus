<!-- Content Wrapper. Contains page content -->
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
                    <div class="card card-danger">
                        <div class="card-body">
                            <a href="<?= base_url('admin/kas/haltambahdata'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah data</a>
                        </div>
                    </div>
                </div>
            </div>
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
                            <a href="<?= base_url('admin/kas/cetakdatakas'); ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> Pdf</a>
                                <br>
                                <br>
                            <label class="">TOTAL KAS : Rp <?= $totalkas; ?>,-</label>
                            <table id="datatableperpus" class="table table-bordered w-100 table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No.Kas</th>
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Keluar</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($kas as $data) : ?>
                                        <tr>
                                            <td><?= $i + 1; ?></td>
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
                                            <td>
                                                <a class="badge badge-primary" href="<?= base_url('admin/kas/haleditdata/') . $data['idkas']; ?>"><i class="fas fa-edit"></i></a>
                                                <a class="badge badge-danger" href="#" data-target="#modalhapus<?= $data['idkas']; ?>" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="modalhapus<?= $data['idkas']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
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
                                                                <a href="<?= base_url('admin/kas/hapusdata/' . $data['idkas']); ?>" class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
<!-- /.content-wrapper -->