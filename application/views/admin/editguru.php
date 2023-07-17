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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/guru'); ?>"><?= $title; ?></a></li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center bg-warning rounded p-2">
                                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/data/anggota/') . $guru['foto']; ?>">
                                </div>
                            </div>
                            <hr>
                            <form action="<?= base_url('admin/guru/editdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Kode Anggota</label>
                                            <input type="text" name="idanggota" value="<?= $guru['idanggota']; ?>" class="form-control" hidden required>
                                            <input type="text" name="kodeanggota" id="kodeanggota" value="<?= $guru['kodeanggota']; ?>" class="form-control" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">NIP</label>
                                            <input type="text" name="role" class="form-control" value="guru" required hidden>
                                            <input type="number" name="identitas" value="<?= $guru['identitas']; ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" name="nama" value="<?= $guru['nama']; ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">No.Hp</label>
                                            <input type="number" name="telp" value="<?= $guru['telp']; ?>" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Email</label>
                                            <input type="email" name="email" value="<?= $guru['email']; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="4" style="resize: none;" required><?= $guru['alamat']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Jabatan</label>
                                            <select name="status" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Jabatan</option>
                                                <?php foreach ($jabatan as $jab) : ?>
                                                    <option value="<?= $jab['namajabatan']; ?>" <?php if ($guru['status'] == $jab['namajabatan']) echo "selected"; ?>><?= $jab['namajabatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="Sampul">Pas Foto</label>
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
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusguru">Hapus Data</a>
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
<div class="modal fade" id="hapusguru" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <a href="<?= base_url('admin/guru/hapusdata/' . $guru['idanggota']); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>