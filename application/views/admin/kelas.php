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
                            <h3 class="card-title">Form Kelas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="#" id="tambahdatakelas" class="badge badge-primary float-left"><i class="fas fa-plus"></i>Tambah data</a>
                            <br>
                            <form id="formedit" action="<?= base_url('admin/kelas/tambahdata'); ?>" method="post">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" required>
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
                            <h3 class="card-title">Data Kelas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kelas as $data) :
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $data['namakelas'] ?></td>
                                            <td>
                                                <a href="#" class="badge badge-success" onclick="editKelas('<?= $data['idkelas']; ?>', '<?= $data['namakelas']; ?>')"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapuskelas<?= $data['idkelas']; ?>"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapuskelas<?= $data['idkelas']; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                            <a href="<?= base_url('admin/kelas/hapusdata/' . $data['idkelas']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
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