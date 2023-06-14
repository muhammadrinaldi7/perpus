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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/kas'); ?>"><?= $title; ?></a></li>
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
                            <form action="<?= base_url('admin/kas/editdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 m-auto">
                                        <div class="form-group">
                                            <label for="inputName">Kode Kas</label>
                                            <input type="text" name="idkas" value="<?= $kas['idkas']; ?>" class="form-control" hidden required>
                                            <input type="text" name="kodekas" id="kodekas" value="<?= $kas['kodekas']; ?>" class="form-control" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Dana Masuk/Keluar</label>
                                            <select id="tipekas" name="tipe" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Tipe</option>
                                                <option value="masuk" <?php if ($kas['tipe'] == 'masuk') echo "selected"; ?>>Masuk</option>
                                                <option value="keluar" <?php if ($kas['tipe'] == 'keluar') echo "selected"; ?>>Keluar</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Tanggal</label>
                                            <input type="date" name="tanggal" id="tglmasuk" value="<?= date('Y-m-d', strtotime($kas['tanggal'])); ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Nominal</label>
                                            <input type="number" name="nominal" value="<?= $kas['nominal']; ?>" id="inputName" class="form-control" placeholder="cont.1000" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="4" style="resize: none;" required placeholder="cont.Denda Telat Buku"><?= $kas['keterangan']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <a href="<?= base_url('admin/kas'); ?>" class="btn btn-secondary">Cancel</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapuskas">Hapus Data</a>
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
<script>
    var frmkode = document.getElementById('kodekas');
    var dtkd = frmkode.value.split('/');
    var kas = dtkd[0];
    var valId = dtkd[3];
    var frmtipe = document.getElementById('tipekas');
    var tipe = frmtipe.value;
    var valtipe;
    if (tipe == 'masuk') {
        valtipe = "IN";
    } else {
        valtipe = "OUT";
    }
    var tglmasuk = document.getElementById('tglmasuk');
    var valtgl = tglmasuk.value;
    var tgl = valtgl.split('-');
    valtgl = tgl[2] + tgl[1] + tgl[0];
    var kodekas = kas + '/' + valtipe + '/' + valtgl + '/' + valId;
    frmkode.value = kodekas;
    frmtipe.addEventListener('change', function() {
        var tipe = frmtipe.value;
        if (tipe == 'masuk') {
            valtipe = "IN";
        } else {
            valtipe = "OUT";
        }
        kodekas = kas + '/' + valtipe + '/' + valtgl + '/' + valId;
        frmkode.value = kodekas;
    });
    tglmasuk.addEventListener('change', function() {
        valtgl = tglmasuk.value;
        tgl = valtgl.split('-');
        valtgl = tgl[2] + tgl[1] + tgl[0];
        kodekas = kas + '/' + valtipe + '/' + valtgl + '/' + valId;
        frmkode.value = kodekas;
    });
</script>
<!-- Modal Hapus -->
<div class="modal fade" id="hapuskas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <a href="<?= base_url('admin/kas/hapusdata/' . $kas['idkas']); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>