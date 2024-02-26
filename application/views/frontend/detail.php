
 <header class="masthead">
 	<div class="container">
 		<div class="masthead-subheading">Selamat Datang!</div>
 		<div class="masthead-heading text-uppercase">MTsN 2 KAPUAS</div>
 		<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#buku">Lihat Buku</a>
 	</div>
 </header>

 <!-- profil-->
 <section class="page-section mt-2" id="buku">
 	<div class="container">
 		<!-- <div class="text-center">
 			<h2 class="section-heading text-uppercase">Perpustakaan</h2>
 			<h3 class="section-subheading text-muted">MTsN 2 KAPUAS</h3>
 		</div> -->
 		<div class="row text-justify pl-5 pr-5">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
                <table>
                    <thead>
                       <tr>
                           
                            <th><a href="../../assets/data/buku/<?= $katalog['sampul']; ?>" target="_blank"><img src="../../assets/data/buku/<?= $katalog['sampul']; ?>" width="300px" height="300px"></a></th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="col-md-4">
                
            </div>
        </div>
        <br>
        <div class="row text-justify pl-5 pr-5">
            <div class="col-md-3">
                
            </div>

            <div class="col-md-4">
                <table>
                    <thead>
                        
                        <tr>
                            <th>Kode Buku</th>
                            <th>:</th>
                            <th><?php echo $katalog['kodebuku'] ?></th>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <th>:</th>
                            <th><?php echo longdate_indo($katalog['tglmasuk']) ?></th>
                        </tr>   
                        <tr>
                            <th>ISBN</th>
                            <th>:</th>
                            <th><?php echo $katalog['isbn'] ?></th>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <th>:</th>
                            <th><?php echo $katalog['judul'] ?></th>
                        </tr>
                        <tr>
                            <th>Penulis</th>
                            <th>:</th>
                            <th><?php echo $katalog['penulis'] ?></th>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <th>:</th>
                            <th><?php echo $katalog['penerbit'] ?></th>
                        </tr>
                    </thead>
                </table>
                
            </div>
            <div class="col-md-4">
                <table>
                    <thead>
                        
                        <tr>
                            <th>Tahun</th>
                            <th>:</th>
                            <th><?php echo $katalog['thnterbit'] ?></th>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <th>:</th>
                            <th><?php echo $katalog['deskripsi'] ?></th>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <th>:</th>
                            <th><?php echo $katalog['stok'] ?></th>
                        </tr>   
                        <tr>
                            <th>Rak</th>
                            <th>:</th>
                            <th><?php echo $katalog['rak'] ?></th>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <th>:</th>
                            <th><?php echo $katalog['kategori'] ?></th>
                        </tr>
                       
                    </thead>
                </table>
            </div>
 			
 		</div>
 	</div>
 </section>

 <!-- struktur -->
<!--  -->
