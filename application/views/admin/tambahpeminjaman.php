<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah <?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/peminjaman'); ?>"><?= $title; ?></a></li>
                        <li class="breadcrumb-item active">Tambah <?= $title; ?></li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="kdag">Kode Anggota</label>
                                    <div class="input-group">
                                        <input type="text" name="kdag" id="kdag" placeholder="Tulis Kode Anggota" class="form-control">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-success" id="cekanggota"><i class="fas fa-check"></i></button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAnggota" id="btnmodalag"><i class="fas fa-ellipsis-h"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="kdag">Kode Buku</label>
                                    <div class="input-group">
                                        <input type="text" name="kdbk" id="kdbk" placeholder="Tulis Kode Buku" class="form-control">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-success" id="cekbuku" ><i class="fas fa-check"></i></button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBuku" id="btnmodalbk"><i class="fas fa-ellipsis-h"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data <?= $title; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <?php
                        // var_dump($idpinjam);exit;
                        if ($idpinjam==NULL) {
                            $idpinjam=0;
                        }else{
                            $idpinjam=$idpinjam['idpinjam'];
                        }
                        ?>
                        <div class="card-body">
                            <form action="<?= base_url('admin/peminjaman/tambahdata'); ?>" id="form-tambah" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="w-100 bg-success">Data Peminjaman</label>
                                        <label for="kodepinjam">Kode Pinjam</label>
                                        <input type="text" name="kodepinjam" class="form-control" readonly value="PJ00<?= $idpinjam + 1; ?>">
                                        <label for="">Peminjam : </label><br>
                                        <a href="#" class="badge badge-danger pull-right" id="ulangAg"><i class="fas fa-sync-alt"></i> Ganti Peminjam</a>
                                        <div id="dtpeminjam">

                                        </div>
                                        <input type="text" name="idanggota" id="idanggota" hidden>
                                        <input type="text" name="kodeanggota" id="kodeanggota" hidden>
                                        <input type="text" name="status" value="dipinjam" class="form-control" hidden>
                                        <label for="tglpinjam">Tanggal : <?= longdate_indo(date('Y-m-d')); ?></label>
                                        <input type="date" id="tglpinjam" name="tglpinjam" value="<?= date('Y-m-d'); ?>" hidden><br>
                                        <label for="lamapinjam">Lama Peminjaman (hitungan hari)</label>
                                        <input type="number" name="lamapinjam" id="lamapinjam" placeholder="cont.7hari(7)" min="1" class="form-control" required>
                                        <label for="tgldikembalikan">Tanggal Dikembalikan</label>
                                        <input type="date" name="tgldikembalikan" id="tgldikembalikan" readonly class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="w-100 bg-success">Pinjam Buku</label>
                                        <table class="table table-bordered" id="dtbuku">
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-2 d-flex justify-content-between">
                                        <a href="<?= base_url('admin/peminjaman/'); ?>" class="btn btn-secondary">Batal</a>
                                        <button type="submit" class="btn btn-success" id="tambahpinjam" form="form-tambah"><i class="fas fa-save"></i> Tambah Data</button>
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
<!-- Modal Anggota -->
<div class="modal fade" id="modalAnggota" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pilih Data Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="datatableperpus" class="table table-bordered w-100 table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Anggota</th>
                            <th>Nama</th>
                            <th>Kelas/Jabatan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($anggota as $data) : ?>
                            <tr>
                                <td><?= $i + 1; ?></td>
                                <td><?= $data['kodeanggota']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['status']; ?></td>
                                <td><a href="#" class="badge badge-primary" onclick="pilihAnggota('<?= $data['kodeanggota']; ?>')" data-dismiss="modal"><i class="fas fa-mouse-pointer"></i>Pilih</a></td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Buku -->
<div class="modal fade" id="modalBuku" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pilih Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="datatableperpus" class="table table-bordered w-100 table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Stok Tersedia</th>
                            <th>Jumlah Buku</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($buku as $data) :
                            $idbuku=$data['idbuku'];
                            $tot=$this->db->query("SELECT sum(qty) as qty from peminjaman where idbuku='$idbuku'")->row_array();
                            $akhir=$tot['qty']+$data['stok'];
                            ?>
                            <tr>
                                <td><?= $i + 1; ?></td>
                                <td><?= $data['kodebuku']; ?></td>
                                <td><?= $data['judul']; ?></td>
                                <td><badge class="badge badge-success"><?= $data['stok']; ?></badge></td>
                                <td><?= $akhir; ?></td>
                                <td><a href="#" class="badge badge-primary" onclick="pilihBuku('<?= $data['idbuku']; ?>')" data-dismiss="modal"><i class="fas fa-mouse-pointer"></i>Pilih</a></td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<script>
    var kdbk = document.getElementById('kdbk');
    var btnbk = document.getElementById('cekbuku');
    var modalbk = document.getElementById('btnmodalbk');
    var dtpeminjam = document.getElementById('dtpeminjam');
    console.log(kdbk.value);
    var n = 0,
        kodd = [];
    btnbk.addEventListener('click', function() {
        
        // alert('tes');
        if (kdbk.value != '') {
            pilihBuku(kdbk.value);
        } else {
            alert('Kode buku kosong!');
            kdbk.focus();
        }
    });
    kdbk.addEventListener('keypress', function(e) {
        if (e.keyCode === 13) {
            if (this.value != '') {
                this.value;
                pilihBuku(this.value);
            } else {
                alert('Kode buku kosong!');
                this.focus();
            }
        }
    });

    console.log(kdbk.value);

    function pilihBuku(kodebuku) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                console.log(this.responseText);
                if (data != null) {
                    if (kodd.includes(data['kodebuku'])) {
                        var s = document.getElementById('stokk' + data['idbuku']);
                        var x = parseInt(s.value);
                        s.value = x + 1;
                    } else {
                        addBuku(data['idbuku'], data['kodebuku'], data['judul'], data['stok'], 1);
                        kodd[n] = data['kodebuku'];
                    }
                    kdbk.focus();
                    kdbk.value = '';
                } else {
                    alert('Data buku tidak ditemukan!');
                    kdbk.focus();
                    kdbk.value = '';
                }
            }
        };
        // console.log(kdbk)
        xmlhttp.open("POST", "<?= base_url('admin/peminjaman/cariBuku/') ?>" + kodebuku, true);
        xmlhttp.send();
    }

    //Focus Anggota
    var kdag = document.getElementById('kdag');
    // console.log(kdag);
    var btnag = document.getElementById('cekanggota');
    var modalag = document.getElementById('btnmodalag');
    console.log(modalag);
    var ulangAg = document.getElementById('ulangAg');
    var idanggota = document.getElementById('idanggota');
    var kodeanggota = document.getElementById('kodeanggota');
    kdag.focus();
    kdag.addEventListener('keypress', function(e) {
        if (e.keyCode === 13) {

            if (this.value != '') {
                pilihAnggota(this.value);

            } else {
                alert('Kode anggota kosong!');
            }
        }
    });
    btnag.addEventListener('click', function() {
        // console.log(kdag.value);
        if (kdag.value != '') {
            pilihAnggota(kdag.value);
        } else {
            alert('Kode anggota kosong!');
        }
    });


            // console.log(pilihAnggota(kodag));

    function pilihAnggota(kodag) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                console.log(this.responseText);
                if (data != null) {
                    var isi = "Kode Anggota : " + data['kodeanggota'];
                    isi += "<br>Nama : " + data['nama'];
                    isi += "<br>NamaIdentitas(NIP/NIS) : " + data['identitas'];
                    isi += "<br>Alamat : " + data['alamat'];
                    isi += "<br>No.Hp : " + data['telp'];
                    dtpeminjam.innerHTML = isi;
                    idanggota.value = data['idanggota'];
                    kodeanggota.value = data['kodeanggota'];
                    kdag.setAttribute('readonly', '');
                    btnag.setAttribute('disabled', '');
                    modalag.setAttribute('disabled', '');
                    kdbk.removeAttribute('readonly');
                    btnbk.removeAttribute('disabled');
                    modalbk.removeAttribute('disabled');
                    kdag.value = '';
                    kdbk.focus();
                } else {
                    alert('Data anggota tidak ditemukan!');
                    kdag.value = '';
                    kdag.focus();
                }
            }
        };
        console.log(kdag)
        xmlhttp.open("POST", "<?= base_url('admin/peminjaman/cariAnggota/') ?>" + kodag, true);
        xmlhttp.send();
    }

    ulangAg.addEventListener('click', function() {
        dtpeminjam.innerHTML = '';
        kdag.value = '';
        idanggota.value = '';
        kodeanggota.value = '';
        kdag.removeAttribute('readonly');
        btnag.removeAttribute('disabled');
        modalag.removeAttribute('disabled');
        kdbk.setAttribute('readonly', '');
        btnbk.setAttribute('disabled', '');
        modalbk.setAttribute('disabled', '');
        kdag.focus();
    });
    //Batas Anggota

    // Focus Buku
    


    function addBuku(idbuku, kodebuku, judul, max, st) {
        var dtbuku = document.getElementById('dtbuku');
        // Membuat Element
        var row = document.createElement('tr');
        var id = document.createElement('input');
        id.setAttribute('type', 'text');
        id.setAttribute('name', 'idbuku[]');
        id.setAttribute('hidden', '');
        id.setAttribute('value', idbuku);
        var kd = document.createElement('input');
        kd.setAttribute('type', 'text');
        kd.setAttribute('name', 'kodebuku[]');
        kd.setAttribute('hidden', '');
        kd.setAttribute('value', kodebuku);
        var tdkd = document.createElement('td');
        var tdj = document.createElement('td');
        var tds = document.createElement('td');
        tds.setAttribute('width', '100px');
        var stok = document.createElement('input');
        stok.setAttribute('type', 'number');
        stok.setAttribute('name', 'qty[]');
        stok.setAttribute('class', 'form-control');
        stok.setAttribute('min', '0');
        stok.setAttribute('max', max);
        stok.setAttribute('value', st);
        stok.setAttribute('id', 'stokk' + idbuku);
        var tdh = document.createElement('td');
        var hapus = document.createElement('span');
        // Append Element
        dtbuku.appendChild(row);
        row.appendChild(id);
        row.appendChild(kd);
        row.appendChild(tdkd);
        row.appendChild(tdj);
        row.appendChild(tds);
        row.appendChild(tdh);
        tds.appendChild(stok);
        tdh.appendChild(hapus);
        tdkd.innerHTML = kodebuku;
        tdj.innerHTML = judul;
        hapus.innerHTML = '<a href="#" id="hapusbuku" class="badge badge-danger"><i class="fas fa-times"></i></a></td></tr>';

        // Aksi Delete
        hapus.onclick = function() {
            row.parentNode.removeChild(row);
            var index = kodd.indexOf(kodebuku);
            kodd.splice(index, 1);
        }
        n++;
    }

    // Batas Buku

    //Form Pelengkap
    var lamapinjam = document.getElementById('lamapinjam');
    var tglpinjam = document.getElementById('tglpinjam');
    var tgldikembalikan = document.getElementById('tgldikembalikan');
    lamapinjam.value = 7;
    var currentDate = new Date(tglpinjam.value);
    var i = parseInt(lamapinjam.value);
    if (lamapinjam.value == '') {
        i = 0;
    }
    const d = currentDate.setDate(currentDate.getDate() + i);
    var date = currentDate.getDate(d);
    var month = currentDate.getMonth(d) + 1; //Be careful! January is 0 not 1
    var year = currentDate.getFullYear(d);
    month = (month < 10 ? "0" : "") + month;
    date = (date < 10 ? "0" : "") + date;
    var dateString = year + "-" + month + "-" + date;
    tgldikembalikan.value = dateString;
    lamapinjam.addEventListener('input', function() {
        var currentDate = new Date(tglpinjam.value);
        var i = parseInt(lamapinjam.value);
        if (lamapinjam.value == '') {
            i = 0;
        }
        const d = currentDate.setDate(currentDate.getDate() + i);
        var date = currentDate.getDate(d);
        var month = currentDate.getMonth(d) + 1; //Be careful! January is 0 not 1
        var year = currentDate.getFullYear(d);
        month = (month < 10 ? "0" : "") + month;
        date = (date < 10 ? "0" : "") + date;
        var dateString = year + "-" + month + "-" + date;
        tgldikembalikan.value = dateString;
    });
    //SUBMIT DATA
    document.onkeydown = function(e) {
        if (e.ctrlKey && e.keyCode === 13) {
            var btntambah = document.getElementById('tambahpinjam');
            btntambah.click();
        }
    }
</script>