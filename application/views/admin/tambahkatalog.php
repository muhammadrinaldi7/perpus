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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/katalog'); ?>"><?= $title; ?></a></li>
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
                            <form action="<?= base_url('admin/katalog/tambahdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Kode Buku</label>
                                            <input type="text" name="kodebuku" id="kodebuku" placeholder="<?= $idbuku; ?>/0/PS/0000" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">ISBN</label>
                                            <input type="text" name="isbn" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Judul</label>
                                            <input type="text" name="judul" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Penulis</label>
                                            <input type="text" name="penulis" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Penerbit</label>
                                            <input type="text" name="penerbit" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Tahun Terbit</label>
                                            <input type="number" name="thnterbit" id="thnterbit" class="form-control" placeholder="cont.2021" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Tempat Penerbit</label>
                                            <input type="text" name="tempatterbit" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Halaman</label>
                                            <input type="text" name="halaman" id="inputName" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Tebal Buku</label>
                                            <input type="text" name="tebal" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Stok</label>
                                            <input type="number" name="stok" id="inputName" class="form-control" placeholder="cont.15" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Klasifikasi</label>
                                            <select id="kodeklasifikasi" name="kodeklasifikasi" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Klasifikasi</option>
                                                <?php foreach ($klasifikasi as $kl) : ?>
                                                    <option value="<?= $kl['kodeklasifikasi']; ?>"><?= $kl['kodeklasifikasi'] . "-" . $kl['klasifikasi']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Kategori</label>
                                            <select id="kategori" name="kategori" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Kategori</option>
                                                <?php foreach ($kategori as $kat) : ?>
                                                    <option value="<?= $kat['kategori']; ?>"><?= $kat['kategori']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Sumber Buku</label>
                                            <select id="sumberbuku" name="sumberbuku" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Sumber Buku</option>
                                                <?php foreach ($sumber as $sb) : ?>
                                                    <option value="<?= $sb['kodesumber']; ?>"><?= $sb['sumber']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Rak</label>
                                            <select id="rak" name="rak" class="form-control custom-select" required>
                                                <option value="" selected disabled>Pilih Rak</option>
                                                <?php foreach ($rak as $rak) : ?>
                                                    <option value="<?= $rak['namarak']; ?>"><?= $rak['namarak']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label for="Sampul">Sampul</label>
                                        <br>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="sampul" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <small class="text-danger">Max.2MB</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <a href="<?= base_url('admin/katalog'); ?>" class="btn btn-secondary">Cancel</a>
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
<!-- Otomatis Kode Buku -->
 <!-- <script>
    var kodebuku = document.querySelector('#kodebuku');
    var valkb = kodebuku.value;
    var valfix = valkb.split("/");
    valkb = valfix[0];
    var kodesumber = document.querySelector('#sumberbuku');
    var vals = valfix[1];
    valfix[3] = new Date().getFullYear()
    var tahun = valfix[3];
    // kodeklasifikasi.addEventListener('change', function() {
        // kk = kodeklasifikasi.value;
        // kodebuku.value = valkb + '/' + vals + '/' + kk + '/' + tahun;
    // });
    kodesumber.addEventListener('change', function() {
        vals = kodesumber.value;
        kodebuku.value = valkb + '/' + vals + '/PS/' + tahun;
    });
	const myObject = document.getElementById('thnterbit');
	myObject.addEventListener('keyup', function (evt) {
		kodebuku.value = valkb + '/' + vals + '/PS/' + myObject.value;
	});
</script> -->