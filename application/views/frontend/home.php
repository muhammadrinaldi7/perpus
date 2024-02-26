 <!-- Masthead-->
 <hr>
 <hr>
 <hr>
 <hr>
 <header class="masthead">
 	<div class="container">
 		<!-- <div class="masthead-subheading">Selamat Datang!</div>
 		<div class="masthead-heading text-uppercase">MTsN 2 KAPUAS</div> -->
 		<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#buku">Lihat Buku</a>
 	</div>
 </header>

 <!-- profil-->
 <section class="page-section mt-2" id="buku">
 	<div class="container">
 		<div class="text-center">
 			<h2 class="section-heading text-uppercase">Perpustakaan</h2>
 			<h3 class="section-subheading text-muted">MTsN 2 KAPUAS</h3>
 		</div>
 		<div class="row text-justify pl-5 pr-5">
 			<!-- <p><?= $profil[0]['profile'] ?></p> -->
 			<table id="datatableperpus" class="table table-bordered datatable w-100 table-striped no-footer">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>QR Code</th>
                                            <th>Kode Buku</th>
                                            <th>Tgl Masuk</th>
                                            <th>ISBN</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun</th>
                                            <th>Cover Buku</th>
                                            <th>Deskripsi</th>
                                            <th>Stok</th>
                                            <th>Rak</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0;
                                        foreach ($katalog as $data) : ?>
                                            <tr>
                                                <td> <?= $i + 1; ?></td>
                                                <td><a href="assets/image/<?= $data['qr']; ?>" target="_blank"><img src="assets/image/<?= $data['qr']; ?>" width="80px" height="80px"></a></td>
                                                <td><?= $data['kodebuku']; ?></td>
                                                <td><?= longdate_indo($data['tglmasuk']); ?></td>
                                                <td><?= $data['isbn']; ?></td>
                                                <td><?= $data['judul']; ?></td>
                                                <td><?= $data['penulis']; ?></td>
                                                <td><?= $data['penerbit']; ?></td>
                                                <td><?= $data['thnterbit']; ?></td>
                                                <td><a href="assets/data/buku/<?= $data['sampul']; ?>" target="_blank"><img src="assets/data/buku/<?= $data['sampul']; ?>" width="80px" height="80px"></a></td>
                                                <td><?= $data['deskripsi']; ?></td>
                                                <td><?= $data['stok']; ?></td>
                                                <td><?= $data['rak']; ?></td>
                                                <td><a class="btn btn-success" href="<?= base_url('home/detail/') . $data['idbuku']; ?>"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
 		</div>
 	</div>
 </section>

 <!-- struktur -->
<!--  -->
