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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/guru'); ?>"><?= $title; ?></a></li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('admin/guru/tambahdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Kode Anggota</label>
                                            <input type="text" name="kodeanggota" id="kodeanggota" value="G00<?= $idanggota; ?>" class="form-control" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">NIP</label>
                                            <input type="text" name="role" class="form-control" value="guru" required hidden>
                                            <input type="number" name="identitas" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" name="nama" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">No.Hp</label>
                                            <input type="number" name="telp" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="4" style="resize: none;" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Jabatan</label>
                                            <select name="status" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Jabatan</option>
                                                <?php foreach ($jabatan as $jab) : ?>
                                                    <option value="<?= $jab['namajabatan']; ?>"><?= $jab['namajabatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="Sampul">Pas Foto</label>
                                        <br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <small class="text-danger">Max.2MB</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <a href="<?= base_url('admin/guru'); ?>" class="btn btn-secondary">Cancel</a>
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