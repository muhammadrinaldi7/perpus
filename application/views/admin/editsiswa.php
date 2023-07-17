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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/siswa'); ?>"><?= $title; ?></a></li>
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
                                <div class="col-md-12 text-center bg-danger rounded p-2">
                                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/data/anggota/') . $siswa['foto']; ?>">
                                </div>
                            </div>
                            <hr>
                            <form action="<?= base_url('admin/siswa/editdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Kode Anggota</label>
                                            <input type="text" name="idanggota" value="<?= $siswa['idanggota']; ?>" class="form-control" hidden required>
                                            <input type="text" name="kodeanggota" id="kodeanggota" value="<?= $siswa['kodeanggota']; ?>" class="form-control" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">NIP</label>
                                            <input type="text" name="role" class="form-control" value="siswa" required hidden>
                                            <input type="number" name="identitas" value="<?= $siswa['identitas']; ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" name="nama" value="<?= $siswa['nama']; ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">No.Hp</label>
                                            <input type="number" name="telp" value="<?= $siswa['telp']; ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Email</label>
                                            <input type="email" name="email" value="<?= $siswa['email']; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="4" style="resize: none;" required><?= $siswa['alamat']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Kelas</label>
                                            <select name="status" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Kelas</option>
                                                <?php foreach ($kelas as $kel) : ?>
                                                    <option value="<?= $kel['namakelas']; ?>" <?php if ($siswa['status'] == $kel['namakelas']) echo "selected"; ?>><?= $kel['namakelas']; ?></option>
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
                                        <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-secondary">Cancel</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapussiswa">Hapus Data</a>
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
<div class="modal fade" id="hapussiswa" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <a href="<?= base_url('admin/siswa/hapusdata/' . $siswa['idanggota']); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>