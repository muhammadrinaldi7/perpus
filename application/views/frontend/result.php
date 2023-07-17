<section class="page-section">
	<div class="container">
		<div class="text-center">
			<h2 class="section-heading text-uppercase">Tracking Surat Online</h2>
			<h3 class="section-subheading text-muted">Surat <b>Ditemukan</b>, Detail Dibawah:</h3>
		</div>
		<?php
		if ($row['status'] == '1') {
			$badge = '<badge class="badge badge-secondary">';
		} elseif ($row['status'] == '2') {
			$badge = '<badge class="badge badge-danger">';
		} elseif ($row['status'] == '3') {
			$badge = '<badge class="badge badge-warning">';
		} elseif ($row['status'] == '4') {
			$badge = '<badge class="badge badge-info">';
		} elseif ($row['status'] == '5') {
			$badge = '<badge class="badge badge-success">';
		}
		?>
		<div class="text-justify pl-5 pr-5">
			<div class="row justify-content-center">
				<div class="col-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="col-lg-7">
							<h3>Keterangan:</h3>
							<table class="table">
								<tr>
									<td>No PA</td>
									<td>:</td>
									<td><?= $row['no_pa'] ?></td>
								</tr>
								<tr>
									<td>Nama Pengaju</td>
									<td>:</td>
									<td><?= $row['nama'] ?></td>
								</tr>
								<tr>
									<td>NIK</td>
									<td>:</td>
									<td><?= $row['NIK'] ?></td>
								</tr>
								<tr>
									<td>No Hp</td>
									<td>:</td>
									<td><?= $row['no_hp'] ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?= $row['alamat'] ?></td>
								</tr>
								<tr>
									<td>Jenis Surat</td>
									<td>:</td>
									<td><?= $options[$row['jenis_surat']] ?></td>
								</tr>
								<tr>
									<td>lihat Surat</td>
									<td>:</td>
									<?php
									if ($options[$row['jenis_surat']] == 'BAA') {
										$id_baa = $row['id'];
										$cari = $this->db->query("SELECT * FROM detail_baa where id_baa='$id_baa'")->row_array();
										if ($cari['id_detail_baa']!='') {
											?>
											<td><a href="<?= base_url() ?>surat/cetak_baa/<?php echo $row['id']; ?>" target="_blank"><button class="btn btn-outline-primary"><i class="fa fa-print"></i></button></a></td>
											<?php
										}else{
											?>
											<td><badge class="badge badge-danger">Belum Di Validasi Admin</badge></td>
											<?php
										}
									}
									elseif ($options[$row['jenis_surat']] == 'BAI') {
										$id_bai = $row['id'];
										$cari = $this->db->query("SELECT * FROM detail_bai where id_bai='$id_bai'")->row_array();
										if ($cari['id_detail_bai']!='') {
											?>
											<td><a href="<?= base_url() ?>surat/cetak_bai/<?php echo $row['id']; ?>" target="_blank"><button class="btn btn-outline-primary"><i class="fa fa-print"></i></button></a></td>
											<?php
										}else{
											?>
											<td><badge class="badge badge-danger">Belum Di Validasi Admin</badge></td>
											<?php
										}
									}
									elseif ($options[$row['jenis_surat']] == 'BAIA') {
										$id_baia = $row['id'];
										$cari = $this->db->query("SELECT * FROM detail_baia where id_baia='$id_baia'")->row_array();
										if ($cari['id_detail_baia']!='') {
											?>
											<td><a href="<?= base_url() ?>surat/cetak_baia/<?php echo $row['id']; ?>" target="_blank"><button class="btn btn-outline-primary"><i class="fa fa-print"></i></button></a></td>
											<?php
										}else{
											?>
											<td><badge class="badge badge-danger">Belum Di Validasi Admin</badge></td>
											<?php
										}
									}
									?>

								</tr>
								<tr>
									<td>Status Pengajuan</td>
									<td>:</td>
									<td><?= $badge . $status[$row['status']] ?></badge> <a href="<?= base_url('tracking/ttd/' . $row['id']) ?>" target="_blank">
											<?php
											if ($row['status'] == '3') {
											?>
												<button class="btn btn-outline-success"><i class="fa fa-signature"></i></button></a></td>
								<?php
											}
								?>

								</tr>
								<tr>
									<td>File Lampiran</td>
									<td>:</td>
									<td>
										<button class="btn btn-outline-info" data-toggle="modal" data-target="#lihatFile<?= $row['id']; ?>"><i class="fa fa-eye"></i></button>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<!-- <div>
						<div class="checkout-wrap">
							<ul class="checkout-bar">
								<?php if ($row['status'] == '1') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="">Dokumen<br>Diterima</li>
									<li class="">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="">Sudah Diketik dan<br>Diparaf</li>
									<li class="">Sudah Ditandatangani<br>Lurah</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '2') : ?>

									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="">Dokumen<br>Ditolak</li>
									<h1>MAAF PENGAJUAN ANDA DITOLAK KARENA SYARAT TIDAK TERPENUHI</h1>


								<?php elseif ($row['status'] == 3) : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="">Sudah Diketik dan<br>Diparaf</li>
									<li class="">Sudah Ditandatangani<br>Lurah</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '4') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="active">Sudah Diketik dan<br>Diparaf</li>
									<li class="">Sudah Ditandatangani<br>Lurah</li>
									<li class="">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php elseif ($row['status'] == '5') : ?>
									<li class="active first">Pengajuan Surat<br>Pending</li>
									<li class="active">Dokumen<br>Diterima</li>
									<li class="active">Verifikasi Berkas / Persyaratan<br>Dilanjutkan</li>
									<li class="active">Sudah Diketik dan<br>Diparaf</li>
									<li class="active">Sudah Ditandatangani<br>Lurah</li>
									<li class="active">Selesai / Dapat Diambil<br>&nbsp;</li>
								<?php endif; ?>
							</ul>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>

<!-- <section class="page-section">
</section> -->

<!-- Modal -->
<div class="modal fade" id="lihatFile<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="fileLampiran" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="fileLampiran">No PA: <?= $row['no_pa'] ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('uploads/berkas') ?>/<?= $row['file'] ?>"></embed>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>