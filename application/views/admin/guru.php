<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?= base_url('admin/guru/importexcel') ?>" method="post"  enctype="multipart/form-data" >
				<div class="modal-header">
					Import Data Guru
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<a href="<?= base_url('admin/guru/templateexcel') ?>" class="btn btn-sm btn-default">Download Template Excel</a>
					<hr />
					
					<div class="row">
						<label class="col-sm-3" for="excel-file">Pilih File Excel </label>
						<input type="file" id="excel-file" name="excel-file" accept=".xls, .xlsx" />
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" name ="btn-import-excel" id="btn-import-excel" class="btn btn-sm btn-success">Import</button> 
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>

	</div>
</div>
<!-- Content Wrapper. Contains page content -->
<form action="<?= base_url('admin/guru/cetakbanyak'); ?>" id="form-banyak" method="post">
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-danger">
                            <div class="card-body">
                                <a href="<?= base_url('admin/guru/haltambahdata'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah data</a>
                                <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Cetak Kartu Anggota</button>
								<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-download"></i> Import</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data <?= $title; ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="<?= base_url('admin/guru/cetakdataguru'); ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-print"></i> Pdf</a>
                                <br>
                                <br>
                                <table id="datatableperpus" class="table table-bordered  w-100 table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" onclick="checkAll(this)"> No.</th>
                                            <th>Kode Anggota</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>No.Hp</th>
                                            <th>Alamat</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($guru as $data) :
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="idanggota[]" value="<?= $data['idanggota'] ?>"> <?= $i + 1; ?></td>
                                                <td><?= $data['kodeanggota']; ?></td>
                                                <td><?= $data['identitas']; ?></td>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['telp']; ?></td>
                                                <td><?= $data['alamat']; ?></td>
                                                <td><?= $data['status']; ?></td>
                                                <td>
                                                    <a class="badge badge-primary" href="<?= base_url('admin/guru/haleditdata/') . $data['idanggota']; ?>"><i class="fas fa-edit"></i></a>
                                                    <a class="badge badge-warning" target="_blank" href="<?= base_url('admin/guru/cetakkartu/') . $data['idanggota']; ?>"><i class="fas fa-print"></i></a>
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
</form>
<!-- /.content-wrapper -->
<script>
    function checkAll(bx) {
        var cbs = document.getElementsByName('idanggota[]');
        for (var i = 0; i < cbs.length; i++) {
            if (cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
</script>