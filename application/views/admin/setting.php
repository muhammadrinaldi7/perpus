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
    <div id="cek-setting" data-flashdata="<?= $this->session->tempdata('message'); ?>"></div>
    <div class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">USER</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/setting'); ?>" method="post">
                                <div class="form-group">
                                    <label for="username1">Username Baru</label>
                                    <input type="text" name="username1" class="form-control" required>
                                </div>
                                <?= form_error('username1', '<small class="text-danger">', '</small>'); ?>
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input type="password" name="password1" class="form-control" required>
                                </div>
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                <div class="form-group">
                                    <label for="password2">Ulangi Password Baru</label>
                                    <input type="password" name="password2" class="form-control" required>
                                </div>
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                <hr>
                                Konfirmasi
                                <div class="form-group">
                                    <label for="usernamecek">Username Lama</label>
                                    <input type="text" name="usernamecek" class="form-control" required>
                                </div>
                                <?= form_error('usernamecek', '<small class="text-danger mb-3">', '</small>'); ?>
                                <div class="form-group">
                                    <label for="username1">Password Lama</label>
                                    <input type="password" name="passwordcek" class="form-control" required>
                                </div>
                                <?= form_error('passwordcek', '<small class="text-danger">', '</small>'); ?>
                                <input name="aksi" type="submit" value="Ubah Data" class="btn btn-success float-right">
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tampilan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/setting/ubahtampilan'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/image/') . $setting['logo']; ?>" height="100px" width="auto">
                                        </div>
                                        <div class="col-sm-9">
                                            <label for="exampleInputFile">Logo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                            <small class="text-danger">Max.2MB</small>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/image/') . $setting['latar']; ?>" width="100px">
                                            </div>
                                            <div class="col-sm-9">
                                                <label for="username1">Background</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="latar" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                                <small class="text-danger">Max.2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Nama Perpustakaan</label>
                                        <input type="text" name="title" value="<?= $setting['title']; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Inisial Perpustakaan</label>
                                        <input type="text" name="initial" value="<?= $setting['initial']; ?>" class="form-control" required>
                                    </div>
                                    <input type="submit" name="aksi" value="Simpan" class="btn btn-success float-right" required>
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