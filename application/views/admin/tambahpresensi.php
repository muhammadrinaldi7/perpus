<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data <?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/presensi'); ?>"><?= $title; ?></a></li>
                        <li class="breadcrumb-item active">Tambah Data <?= $title; ?></li>
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
                            <form action="<?= base_url('admin/presensi/tambahdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" name="nama" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Instansi/Jabatan/Kelas</label>
                                            <input type="text" name="status" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Keperluan</label>
                                            <textarea name="keperluan" class="form-control" rows="4" style="resize: none;" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <a href="<?= base_url('admin/presensi'); ?>" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Tambah Data" class="btn btn-success">
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