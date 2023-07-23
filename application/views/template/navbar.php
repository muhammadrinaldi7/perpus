<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <button class="btn btn-danger" data-toggle="modal" data-target="#logoutmodal">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" role="button" onclick="ubahmode()">
                <i class="fas fa-moon" id="iconmode">
                </i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
        <img src="<?= base_url('assets/image/') . $setting['logo']; ?>" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $setting['initial']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/kelas'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/jabatan'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/denda'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Biaya Denda</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Anggota
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/guru'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/siswa'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Data Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/presensi'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengunjung</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/peminjaman'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Peminjaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pengembalian'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengembalian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/kas'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('admin/denda/list_denda'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Denda</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('admin/peminjaman/riwayat_peminjaman'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Riwayat Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Buku
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/klasifikasi'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Klasifikasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/kategori'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/sumber'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sumber Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/rak'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/katalog'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Katalog</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/setting'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>