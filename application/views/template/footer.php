<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- Modal & Other Component -->
<!-- Modal Logout -->
<div class="modal fade" id="logoutmodal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- End Component -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>
<!-- Script Tambahan -->
<script src="<?= base_url('assets/'); ?>dist/js/togglemode.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- End Script -->
<script src="<?= base_url('assets/'); ?>dist/js/settingnotif.js"></script>
<script src="<?= base_url('assets/'); ?>dist/js/notifquery.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
	
	$(document).ready(function() {
		$(".alert").fadeTo(2000, 500).slideUp(500, function() {
			$(".alert").slideUp(500);
			
		});
	});


    $(function() {
        bsCustomFileInput.init();
    });
    // DATATABLES
    $(function() {
        $("#datatableperpus").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            // "buttons": ["excel", "pdf"]
        }).buttons().container().appendTo('#datatableperpus_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    // DATA KELAS
    $('#tambahdatakelas').click(function() {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/kelas/tambahdata"); ?>');
        var htmlform = '<div class="form-group">';
    htmlform += '<div class="form-group">'
        htmlform += '<label for="kelas">Kelas</label>';
        htmlform += '<input type="text" name="kelas" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Tambah Data" class="btn btn-success float-right">';
        formedit.html(htmlform);
    });

    function editKelas(id, namakelas) {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/kelas/editdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="kelas">Kelas</label>';
        htmlform += '<input type="text" name="idkelas" class="form-control" value="' + id + '" hidden>';
        htmlform += '<input type="text" name="kelas" class="form-control" value="' + namakelas + '" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Edit Data" class="btn btn-success float-right">';
        formedit.html(htmlform);
    }
    // BATAS DATA KELAS
    // DATA Jabatan
    $('#tambahdatajabatan').click(function() {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/jabatan/tambahdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="role">Jabatan</label>';
        htmlform += '<input type="text" name="jabatan" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Tambah Data" class="btn btn-success float-right">';
        formedit.html(htmlform);
    });

    function editJabatan(id, namajabatan) {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/jabatan/editdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="role">Jabatan</label>';
        htmlform += '<input type="text" name="idjabatan" class="form-control" value="' + id + '" hidden>';
        htmlform += '<input type="text" name="jabatan" class="form-control" value="' + namajabatan + '" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Edit Data" class="btn btn-success float-right">';
        formedit.html(htmlform);
    }
    // BATAS DATA Jabatan
    // DATA Biaya Denda
    $('#tambahdatadenda').click(function() {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/denda/tambahdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="denda">Biaya Denda</label>';
        htmlform += '<input type="text" name="biaya" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="exampleSelectBorder">Status</label>';
        htmlform += '<select class="form-control" name="status">';
        htmlform += '<option value="aktif">Aktif</option>';
        htmlform += '<option value="tidak aktif">Tidak Aktif</option>';
        htmlform += '</select>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="denda">Keterangan</label>';
        htmlform += '<input type="text" name="keterangan" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="exampleSelectBorder">Tanggal</label>';
        htmlform += '<input type="date" name="tgltetap" class="form-control" value="<?= date('Y-m-d'); ?>" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Tambah Data" class="btn btn-success float-right">';
        htmlform += '</div>';
        formedit.html(htmlform);
    });

    function editDenda(nama,id, biaya, status, keterangan, tgltetap) {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/denda/editdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="nama">Nama</label>';
        htmlform += '<input type="text" name="nama" class="form-control" value="' + nama + '" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="denda">Biaya Denda</label>';
        htmlform += '<input type="text" name="idbiaya" class="form-control" value="' + id + '" hidden required>';
        htmlform += '<input type="text" name="biaya" class="form-control" value="' + biaya + '" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="exampleSelectBorder">Status</label>';
        htmlform += '<select class="form-control" name="status">';
        if (status == 'aktif') {
            htmlform += '<option value="aktif" selected>Aktif</option>';
            htmlform += '<option value="tidak aktif">Tidak Aktif</option>';
        } else {
            htmlform += '<option value="aktif">Aktif</option>';
            htmlform += '<option value="tidak aktif" selected>Tidak Aktif</option>';
        }
        htmlform += '</select>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="denda">Keterangan</label>';
        htmlform += '<input type="text" name="keterangan" value="' + keterangan + '" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="exampleSelectBorder">Tanggal</label>';
        htmlform += '<input type="date" name="tgltetap" class="form-control" value="' + tgltetap + '" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Edit Data" class="btn btn-success float-right">';
        htmlform += '</div>';
        formedit.html(htmlform);
    }
    // BATAS DATA Biaya Denda
    // DATA Klasifikasi
    $('#tambahdataklasifikasi').click(function() {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/klasifikasi/tambahdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="klasifikasi">Kode Klasifikasi</label>';
        htmlform += '<input type="text" name="kodeklasifikasi" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="klasifikasi">Klasifikasi</label>';
        htmlform += '<input type="text" name="klasifikasi" class="form-control" required>';
        htmlform += ' </div>';
        htmlform += ' <input name="aksi" type="submit" value="Tambah Data" class="btn btn-success float-right">';
        htmlform += '</div>';
        formedit.html(htmlform);
    });

    function editKlasifikasi(id, kodeklasifikasi, klasifikasi) {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/klasifikasi/editdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="klasifikasi">Kode Klasifikasi</label>';
        htmlform += '<input type="text" name="idklasifikasi" value="' + id + '" class="form-control" hidden required>';
        htmlform += '<input type="text" name="kodeklasifikasi" value="' + kodeklasifikasi + '" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="klasifikasi">Klasifikasi</label>';
        htmlform += '<input type="text" name="klasifikasi" value="' + klasifikasi + '" class="form-control" required>';
        htmlform += ' </div>';
        htmlform += ' <input name="aksi" type="submit" value="Edit Data" class="btn btn-success float-right">';
        htmlform += '</div>';
        formedit.html(htmlform);
    }
    // BATAS DATA Klasifikasi
    // DATA Kategori
    $('#tambahdatakategori').click(function() {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/kategori/tambahdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="kategori">Kategori</label>';
        htmlform += '<input type="text" name="kategori" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="kategori">Deskripsi</label>';
        htmlform += '<input type="text" name="deskripsi" class="form-control" required>';
        htmlform += ' </div>';
        htmlform += '<input name="aksi" type="submit" value="Tambah Data" class="btn btn-success float-right">';
        htmlform += ' </div>';
        formedit.html(htmlform);
    });

    function editKategori(id, kategori, deskripsi) {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/kategori/editdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="kategori">Kategori</label>';
        htmlform += '<input type="text" name="idkategori" value="' + id + '" class="form-control" hidden required>';
        htmlform += '<input type="text" name="kategori" value="' + kategori + '" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '<label for="kategori">Deskripsi</label>';
        htmlform += '<input type="text" name="deskripsi" value="' + deskripsi + '" class="form-control" required>';
        htmlform += ' </div>';
        htmlform += '<input name="aksi" type="submit" value="Edit Data" class="btn btn-success float-right">';
        htmlform += ' </div>';
        formedit.html(htmlform);
    }
    // BATAS DATA Kategori
    // DATA Sumber Buku
    $('#tambahdatasumber').click(function() {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/sumber/tambahdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '    <label for="sumber">Kode Sumber</label>';
        htmlform += '    <input type="text" name="kodesumber" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '    <label for="sumber">Sumber</label>';
        htmlform += '    <input type="text" name="sumber" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Tambah Data" class="btn btn-success float-right">';
        htmlform += '</div>';
        formedit.html(htmlform);
    });

    function editSumber(id, kodesumber, sumber) {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/sumber/editdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '    <label for="sumber">Kode Sumber</label>';
        htmlform += '    <input type="text" name="idsumber" value="' + id + '" class="form-control" hidden required>';
        htmlform += '    <input type="text" name="kodesumber" value="' + kodesumber + '" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<div class="form-group">';
        htmlform += '    <label for="sumber">Sumber</label>';
        htmlform += '    <input type="text" name="sumber" value="' + sumber + '" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Edit Data" class="btn btn-success float-right">';
        htmlform += '</div>';
        formedit.html(htmlform);
    }
    // BATAS DATA Sumber Buku
    // DATA Rak Buku
    $('#tambahdatarak').click(function() {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/rak/tambahdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '    <label for="rak">Rak</label>';
        htmlform += '    <input type="text" name="namarak" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Tambah Data" class="btn btn-success float-right">';
        htmlform += '</div>';
        formedit.html(htmlform);
    });

    function editRak(id, namarak) {
        var formedit = $("#formedit");
        formedit.attr('action', '<?= base_url("admin/rak/editdata"); ?>');
        var htmlform = '<div class="form-group">';
        htmlform += '<div class="form-group">';
        htmlform += '    <label for="rak">Rak</label>';
        htmlform += '    <input type="text" name="idrak" value="' + id + '" class="form-control" hidden required>';
        htmlform += '    <input type="text" name="namarak" value="' + namarak + '" class="form-control" required>';
        htmlform += '</div>';
        htmlform += '<input name="aksi" type="submit" value="Edit Data" class="btn btn-success float-right">';
        htmlform += '</div>';
        formedit.html(htmlform);
    }
    // BATAS DATA Rak Buku
</script>

</body>

</html>