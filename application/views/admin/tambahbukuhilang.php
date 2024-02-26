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
    <script>
        function isiData() {
            var siswaSelect = document.getElementById("siswa");
            var inputNamaSiswa = document.getElementById("nama_siswa");
            var inputUmurSiswa = document.getElementById("umur_siswa");

            // Mendapatkan data siswa yang dipilih
            var selectedSiswa = siswaSelect.options[siswaSelect.selectedIndex].text;

            // Misalkan data siswa dalam format "Nama Siswa, Umur Siswa"
            var dataSiswa = selectedSiswa.split(', ');

            // Mengisi nilai input dengan data siswa yang dipilih
            inputNamaSiswa.value = dataSiswa[0];
            inputUmurSiswa.value = dataSiswa[1];
        }
    </script>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <select id="anggota" name="kota" onchange="isiData()" class="form-control">
                                        <?php foreach ($anggota as $a):?>    
                                        <option value="<?= $a['idanggota'] ?>"><?= $a['identitas'] ?> | <?= $a['nama'] ?></option>
                                        <?php endforeach; ?>
                            </select>
                                <hr>
                            <form action="<?= base_url('admin/katalog/tambahdata'); ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputName">No Berita Hilang</label>
                                    <div class="input-group">
                                        <input type="text" name="kodebuku" id="kodebuku" placeholder="<?= $id; ?>/0/BH/0000" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="kdag">Kode Anggota</label>
                                    <div class="input-group">
                                    <select id="anggota" name="kota" class="form-control">
                                        <?php foreach ($anggota as $a):?>    
                                        <option value="<?= $a['idanggota'] ?>"><?= $a['identitas'] ?> | <?= $a['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="kdag">Kode Buku</label>
                                    <div class="input-group">
                                    <select id="buku" name="kota" class="form-control">
                                        <?php foreach ($buku as $b):?>    
                                        <option value="<?= $b['idbuku'] ?>"><?= $b['isbn'] ?> | <?= $b['judul'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                            </div> <hr>

                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">No Berita Hilang</label>
                                            <textarea type="text" name="keterangan" placeholder="keterangan" class="form-control" required></textarea>
                                        </div>
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