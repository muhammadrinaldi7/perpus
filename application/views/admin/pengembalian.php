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
           <!--  <div class="row">
                <div class="col-lg-12">
                    <div class="card card-danger">
                        <div class="card-body">
                            <a href="<?= base_url('admin/pengembalian/haltambahdata'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah data</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data <?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="<?= base_url('admin/pengembalian/cetakdatapengembalian'); ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> Pdf</a>
                                <br>
                                <br>
                            <table id="datatableperpus" class="table table-bordered w-100 table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No.Pinjam</th>
                                        <th>ID Anggota</th>
                                        <th>Nama</th>
                                        <th>Pinjam</th>
                                        <th>Balik</th>
                                        <th>Status</th>
                                        <th>Kembali</th>
                                        <th>Denda</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0;
                                    foreach ($peminjaman as $data) : ?>
                                        <tr>
                                            <td><?= $i + 1; ?></td>
                                            <td><?= $data['kodepinjam']; ?></td>
                                            <td><?= $data['kodeanggota']; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['tglpinjam']; ?></td>
                                            <td><?= $data['tgldikembalikan']; ?></td>
                                            <td><?= $data['statpe']; ?></td>
                                            <td><?= $data['tglpengembalian']; ?></td>
                                            <td><?php if ($data['denda'] == null) {
                                                    echo 'Tidak ada denda';
                                                } else {
                                                    echo $data['denda'];
                                                }
                                                ?></td>
                                            <td>
                                                <a class="badge badge-primary" href="<?= base_url('admin/pengembalian/detaildata/') . $data['kodepinjam']; ?>"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapuspinjam<?= $data['kodepinjam']; ?>"><i class="fas fa-trash-alt"></i></a>
                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="hapuspinjam<?= $data['kodepinjam']; ?>" data-backdrop="static" tabindex="-1" rak="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog" rak="document">
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
                                                                <a href="<?= base_url('admin/pengembalian/hapusdata/' . $data['kodepinjam']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
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