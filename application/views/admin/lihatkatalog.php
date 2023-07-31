<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Buku <?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/katalog'); ?>"><?= $title; ?></a></li>
                        <li class="breadcrumb-item active">Lihat Data <?= $title; ?></li>
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
                            <form action="<?= base_url('admin/katalog/editdata'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        Tanggal Buku Masuk : <?= longdate_indo($katalog['tglmasuk']); ?>
                                        <?php
                                        // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                        // echo $generator->getBarcode($katalog['kodebuku'], $generator::TYPE_CODE_128, 1, 50);
                                        ?>


                                        <div class="form-group">
                                            <label for="inputName">Kode Buku</label>
                                            <br>
                                            <input type="text" name="idbuku" value="<?= $katalog['idbuku']; ?>" class="form-control" hidden required readonly>
                                            <input type="text" name="kodebuku" id="kodebuku" value="<?= $katalog['kodebuku']; ?>" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">ISBN</label>
                                            <input type="text" name="isbn" value="<?= $katalog['isbn']; ?>" id="inputName" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Judul</label>
                                            <input type="text" name="judul" value="<?= $katalog['judul']; ?>" id="inputName" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Penulis</label>
                                            <input type="text" name="penulis" value="<?= $katalog['penulis']; ?>" id="inputName" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Penerbit</label>
                                            <input type="text" name="penerbit" value="<?= $katalog['penerbit']; ?>" id="inputName" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Tahun Terbit</label>
                                            <input type="number" name="thnterbit" value="<?= $katalog['thnterbit']; ?>" id="inputName" class="form-control" placeholder="cont.2021" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Tempat Penerbit</label>
                                            <input type="text" name="tempatterbit" value="<?= $katalog['tempatterbit']; ?>" id="inputName" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Halaman</label>
                                            <input type="text" name="halaman" value="<?= $katalog['halaman']; ?>" id="inputName" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Tebal Buku</label>
                                            <input type="text" name="tebal" value="<?= $katalog['tebal']; ?>" id="inputName" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Stok</label>
                                            <input type="number" name="stok" value="<?= $katalog['stok']; ?>" id="inputName" class="form-control" placeholder="cont.15" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Klasifikasi</label>
                                            <input type="text" name="stok" value="<?= $katalog['klasifikasi']; ?>" id="inputName" class="form-control" placeholder="cont.15" required readonly>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Kategori</label>
                                            <input type="text" name="stok" value="<?= $katalog['kategori']; ?>" id="inputName" class="form-control" placeholder="cont.15" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Sumber Buku</label>
                                            <input type="text" name="stok" value="<?= $katalog['sumberbuku']; ?>" id="inputName" class="form-control" placeholder="cont.15" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus">Rak</label>
                                            <input type="text" name="stok" value="<?= $katalog['rak']; ?>" id="inputName" class="form-control" placeholder="cont.15" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" rows="3" readonly><?= $katalog['deskripsi']; ?></textarea>
                                        </div>
                                        <label for="Sampul">Sampul</label>
                                        <img src="<?= base_url('assets/data/buku/') . $katalog['sampul']; ?>" width="100%">
                                        <br>
                                        
                                        
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
<div class="modal fade" id="hapusbuku" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <a href="<?= base_url('admin/katalog/hapusdata/' . $katalog['idbuku']); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    var kodebuku = document.querySelector('#kodebuku');
    var valkb = kodebuku.value;
    var valfix = valkb.split("/");
    valkb = valfix[0];
    var kodesumber = document.querySelector('#sumberbuku');
    var vals = valfix[1];
    var kodeklasifikasi = document.querySelector('#kodeklasifikasi');
    var kk = valfix[2];
    var tahun = valfix[3];
    kodeklasifikasi.addEventListener('change', function() {
        kk = kodeklasifikasi.value;
        kodebuku.value = valkb + '/' + vals + '/' + kk + '/' + tahun;
    });
    kodesumber.addEventListener('change', function() {
        vals = kodesumber.value;
        kodebuku.value = valkb + '/' + vals + '/' + kk + '/' + tahun;
    });
</script> -->