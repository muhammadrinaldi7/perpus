<form action="<?= base_url('admin/katalog/cetakbanyak'); ?>" id="form-banyak" method="post">
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
				<?php 
					if($this->session->flashdata('success')){
						echo '<div class="alert alert-success"  style="display:none;">';
						echo $this->session->flashdata('success'); 
						echo '</div>';
						unset($_SESSION['success']);
					} else if($this->session->flashdata('error')){
						echo '<div class = "alert alert-danger"  style="display:none;">';
						echo $this->session->flashdata('error');
						unset($_SESSION['error']);
						echo '</div>';
						//$this->session->unset_flashdata('error');
					} 
				?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-danger">
                            <div class="card-body">
                                <a href="<?= base_url('admin/bukuhilang/haltambahdata'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah data</a>
                                <!-- <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Cetak Barcode Katalog</button> -->
								<!-- <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-download"></i> Import</button> -->
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
                                <table id="datatableperpus" class="table table-bordered table-responsive datatable w-100 table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" onclick="checkAll(this)"> No.</th>
                                            <th>Judul</th>
                                            <th>Cover Buku</th>
                                            <th>Kode Anggota</th>
                                            <th>Peminjam Terakhir</th>
                                            <th>Deskripsi</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($bukuh as $data) : 
                                            $idbuku=$data['idbuku'];                           
                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="idbuku[]" value="<?= $data['idbuku'] ?>"> <?= $i + 1; ?></td>
                                                <td><?= $data['judul']; ?></td>
                                                <td><img src="../assets/data/buku/<?= $data['sampul']; ?>" width="80px" height="80px"></td>
                                                <td><?= $data['kodeanggota'] ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['keterangan']; ?></td>
                                                <!-- <td>
                                                    <a class="badge badge-primary" href="<?= base_url('admin/katalog/haleditdata/') . $data['idbuku']; ?>"><i class="fas fa-edit"></i></a>
                                                    <a class="badge badge-warning" target="_blank" href="<?= base_url('admin/katalog/cetakkartu/') . $data['idbuku']; ?>"><i class="fas fa-print"></i></a>
                                                    <a class="badge badge-success" href="<?= base_url('admin/katalog/hallihatdata/') . $data['idbuku']; ?>"><i class="fas fa-eye"></i></a>
                                                </td> -->
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
        var cbs = document.getElementsByName('idbuku[]');
        for (var i = 0; i < cbs.length; i++) {
            if (cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
	
</script>