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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div id="cek-query" data-flashdata="<?= $this->session->tempdata('message'); ?>"></div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Form Biaya Denda</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="#" id="tambahdatadenda" class="badge badge-primary float-left"><i class="fas fa-plus"></i>Tambah data</a>
                            <br>
                            <form id="formedit" action="<?= base_url('admin/denda/tambahdata'); ?>" method="post">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="denda">Nama</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="denda">Biaya Denda</label>
                                        <input type="text" name="biaya" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="aktif">Aktif</option>
                                            <option value="tidak aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="denda">Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Tanggal</label>
                                        <input type="date" name="tgltetap" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                                    </div>
                                    <input name="aksi" type="submit" value="Tambah Data" class="btn btn-success float-right">
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data <?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama</th>
                                        <th>Biaya Denda</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Tetap</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($denda as $data) :
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td>Rp <?= $data['biaya']; ?>,-</td>
                                            <td><?= $data['status']; ?></td>
                                            <td><?= $data['keterangan']; ?></td>
                                            <td><?= longdate_indo($data['tgltetap']); ?></td>
                                            <td>
                                                <a href="#" class="badge badge-success" onclick="editDenda('<?= $data['nama']; ?>','<?= $data['idbiaya']; ?>','<?= $data['biaya']; ?>','<?= $data['status']; ?>','<?= $data['keterangan']; ?>','<?= $data['tgltetap']; ?>')"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapusdenda<?= $data['idbiaya']; ?>"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapusdenda<?= $data['idbiaya']; ?>" data-backdrop="static" tabindex="-1" denda="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog" denda="document">
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
                                                            <a href="<?= base_url('admin/denda/hapusdata/') . $data['idbiaya']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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