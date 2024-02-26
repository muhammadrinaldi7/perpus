<!-- Content Wrapper. Contains page content -->
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4><?= $jguru; ?></h4>

                            <p>Guru</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <?php if($this->session->userdata('role')=='admin'){ ?>
                        <a href="<?= base_url('admin/guru'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4><?= $jsiswa; ?></h4>
                            <p>Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <?php if($this->session->userdata('role')=='admin'){ ?>
                        <a href="<?= base_url('admin/siswa'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h4><?= $jpengunjung ?></h4>
                            <p>Pengunjung</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <?php if($this->session->userdata('role')=='admin'){ ?>
                        <a href="<?= base_url('admin/presensi'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4><?= $jkatalog; ?></h4>

                            <p>Katalog</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <?php if($this->session->userdata('role')=='admin'){ ?>
                        <a href="<?= base_url('admin/katalog'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4><?= $jpinjam; ?></h4>

                            <p>Peminjaman</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <?php if($this->session->userdata('role')=='admin'){ ?>
                        <a href="<?= base_url('admin/peminjaman'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4><?= $jkembali; ?></h4>

                            <p>Pengembalian</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-save"></i>
                        </div>
                        <?php if($this->session->userdata('role')=='admin'){ ?>
                        <a href="<?= base_url('admin/pengembalian'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4>Rp <?= number_format($totalkas,0,',','.'); ?>,-</h4>

                            <p>Kas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <?php if($this->session->userdata('role')=='admin'){ ?>
                        <a href="<?= base_url('admin/kas'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="card bg-dark">
                        <div class="card-header">
                            Tata Tertib Perpustakaan
                        </div>
                        <div class="card-body">
                        <ul>
                            <li>Jam pelayanan mengikuti kalender akademik dan kebijakan manajemen SMKN 2 Pelaihari tentang jam sekolah.</li>
                            <li>Setiap anggota yang akan meminjam buku harus memperlihatkan kartu anggota kepada petugas perpustakaan.</li>
                            <li>Maksmal buku yang dipinjam adalah 2 buku dalam sekali peminjaman.</li>
                            <li>Lama peminjaman adalah 3 hari sejak peminjaman dan dapat di perpanjang untuk masa tiga hari berikutnya.</li>
                            <li>Bagi anggota yang terlambat mengembalikan buku pinjaman maka akan dikenakan denda Rp 500,00.-/buku/hari.</li>
                            <li>Merusak atau menghilangkan buku yang dipinjamnya diharuskan mengganti dengan buku yang sama.</li>
                            <li>Setiap anggota perpustakaan berkewajiban memelihara keutuhan dan kebersihan buku yang di pinjamnya.</li>
                            <li>Apabila kelas memerlukan sejumlah buku untuk dipinjamnsecara bersama-sama maka guru kelas bertanggung jawab atas pengawasan penggunaan buku yang dipinjamnya.</li>
                            <li>Setiap pengunjung perpustakaan diwajibkan menjaga ketenangan,kebersihan,dan ketertban di perpustakaan.</li>
                            <li>Anggota yang meninggalkan sekolah karena lulus atau hal lain harus melaporkan pengunduran keanggotaanya kepada petugas perpustakaan.</li>
                        </ul>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->