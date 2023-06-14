<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data <?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/presensi'); ?>"><?= $title; ?></a></li>
                        <li class="breadcrumb-item active">Edit Data <?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/presensi/editdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Tanggal/Waktu :</label> <?= longdate_indo(date('Y-m-d', strtotime($presensi['timestamp']))); ?> / Jam <?= date('H:i', strtotime($presensi['timestamp'])); ?>
                                        <div class="form-group">
                                            <input type="text" value="<?= $presensi['idpresensi']; ?>" name="idpresensi" id="inputName" class="form-control" hidden required>
                                            <label for="inputName">Nama</label>
                                            <input type="text" value="<?= $presensi['nama']; ?>" name="nama" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Instansi/Jabatan/Kelas</label>
                                            <input type="text" name="status" value="<?= $presensi['status']; ?>" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Keperluan</label>
                                            <textarea name="keperluan" class="form-control" rows="4" style="resize: none;" required><?= $presensi['keperluan']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <a href="<?= base_url('admin/presensi'); ?>" class="btn btn-secondary">Cancel</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapuspresensi">Hapus Data</a>
                                        <input type="submit" value="Edit Data" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
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
<div class="modal fade" id="hapuspresensi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <a href="<?= base_url('admin/presensi/hapusdata/' . $presensi['idpresensi']); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>