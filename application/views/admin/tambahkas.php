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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/kas'); ?>"><?= $title; ?></a></li>
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
                            <form action="<?= base_url('admin/kas/tambahdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 m-auto">
                                        <div class="form-group">
                                            <label for="inputName">Kode Kas</label>
                                            <input type="text" name="kodekas" id="kodekas" value="KAS/IO/00000000/<?= $idkas; ?>" class="form-control" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Dana Masuk/Keluar</label>
                                            <select id="tipekas" name="tipe" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Tipe</option>
                                                <option value="masuk">Masuk</option>
                                                <option value="keluar">Keluar</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Tanggal</label>
                                            <input type="date" name="tanggal" id="tglmasuk" value="<?= date('Y-m-d'); ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Nominal</label>
                                            <input type="number" name="nominal" id="inputName" class="form-control" placeholder="cont.1000" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="4" style="resize: none;" required placeholder="cont.Denda Telat Buku"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <a href="<?= base_url('admin/kas'); ?>" class="btn btn-secondary">Cancel</a>
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