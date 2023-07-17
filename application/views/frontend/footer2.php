<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-left" style="color:white">Copyright © Abdul Karim <?= date('Y') ?>
            </div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-youtube"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="col-lg-4 text-lg-right">
                <a class="mr-3" href="#!">Contact</a>
                <a href="#!">Other</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JS-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Contact form JS-->
<script src="<?= base_url() ?>assets/mail/jqBootstrapValidation.js"></script>
<script src="<?= base_url() ?>assets/mail/contact_me.js"></script>
<!-- Core theme JS-->
<script src="<?= base_url() ?>assets/js/scripts2.js"></script>
<script src="<?= base_url(); ?>assets/jquery-ui-1.12.1/jquery-ui.js"></script>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nik').autocomplete({
            source: "<?php echo site_url('Penduduk/get_autocomplete'); ?>",

            select: function(event, ui) {
                console.log(ui.item)
                $('[name="nik"]').val(ui.item.label);
                $('[name="nama"]').val(ui.item.nama);
                $('[name="no_hp"]').val(ui.item.no_hp);
            },
            response: function(event, ui) {
                if (ui.content.length === 0) {
                    console.log('No results loaded!');
                } else {
                    console.log('success!');
                }
            },
        });

    });
</script>
<script>
            // script di dalam ini akan dijalankan pertama kali saat dokumen dimuat
            document.addEventListener('DOMContentLoaded', function () {
                resizeCanvas();
            })
    
            //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
            function resizeCanvas() {
                var ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }
    
    
            var canvas = document.getElementById('signature-pad');
    
            //warna dasar signaturepad
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
            });
    
            //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
            document.getElementById('clear').addEventListener('click', function () {
                signaturePad.clear();
            });
    
            //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
            document.getElementById('undo').addEventListener('click', function () {
                var data = signaturePad.toData();
                if (data) {
                    data.pop(); // remove the last dot or line
                    signaturePad.fromData(data);
                }
            });
    
            //saat tombol change color diklik maka akan merubah warna pena
            document.getElementById('change-color').addEventListener('click', function () {
    
                //jika warna pena biru maka buat menjadi hitam dan sebaliknya
                if(signaturePad.penColor == "rgba(0, 0, 255, 1)"){
    
                    signaturePad.penColor = "rgba(0, 0, 0, 1)";
                }else{
                    signaturePad.penColor = "rgba(0, 0, 255, 1)";
                }
            })
    
            //fungsi untuk menyimpan tanda tangan dengan metode ajax
            $(document).on('click', '#btn-submit', function () {
                var signature = signaturePad.toDataURL();
    
                $.ajax({
                    url: "proses.php",
                    data: {
                        foto: signature,
                    },
                    method: "POST",
                    success: function () {
                        location.reload();
                        alert('Tanda Tangan Berhasil Disimpan');
                    }
    
                })
            })
        </script>
<script>
    $('#jenis').change(function() {
        var e = document.getElementById("jenis");
        var jenisSurat = e.value;
        // console.log(jenisSurat)

        const baa = ['Lengkapi Persyaratan BAA']
        const bia = ['Lengkapi Persyaratan BAA']
        const baia = ['Lengkapi Persyaratan BAA']
        // const skkm = ['KK (Asli & FC)', 'KTP', 'Surat Keterangan Kematian (Jika ada/Optional)', 'Surat Pengantar/Keterangan RT & RW']
        // const skp = ['KK (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW', 'Data alamat daerah tujuan']
        // const skd = ['KK (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW', 'Data alamat daerah asal']
        // const skbm = ['KK (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
        // const skph = ['KK (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pernyataan dari yang bersangkutan(Optional)', 'Surat Pengantar/Keterangan RT & RW']
        // const skm = ['KK (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
        // const sku = ['KK (Asli & FC)', 'KTP (Asli & FC)', 'Izin Usaha', 'Surat Pengantar/Keterangan RT & RW']
        // const skt = ['KTP (Asli & FC)', 'Surat Dasar Kepemilikan']
        // const skgg = ['KTP (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
        // const situ = ['KTP (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
        // const simb = ['KTP (Asli & FC)', 'FC Surat Tanah Lokasi Bangunan', 'Surat Pengantar/Keterangan RT & RW']

        const showList = (surat) => {
            surat.forEach(item => {
                $('#syarat').append(
                    `
                            <ul>
                                <li>${item}</li>
                            </ul>
                            `
                )
            });
        }

        if (jenisSurat == 'baa') {
            $('#syarat').html('')
            showList(spkk)
        } else if (jenisSurat == 'bai') {
            $('#syarat').html('')
            showList(spna)
        } else if (jenisSurat == 'baia') {
            $('#syarat').html('')
            showList(skkl)
        }
        // } else if (jenisSurat == 'SKKM') {
        //     $('#syarat').html('')
        //     showList(skkm)
        // } else if (jenisSurat == 'SKP') {
        //     $('#syarat').html('')
        //     showList(skp)
        // } else if (jenisSurat == 'SKD') {
        //     $('#syarat').html('')
        //     showList(skd)
        // } else if (jenisSurat == 'SKBM') {
        //     $('#syarat').html('')
        //     showList(skbm)
        // } else if (jenisSurat == 'SKPH') {
        //     $('#syarat').html('')
        //     showList(skph)
        // } else if (jenisSurat == 'SKM') {
        //     $('#syarat').html('')
        //     showList(skm)
        // } else if (jenisSurat == 'SKU') {
        //     $('#syarat').html('')
        //     showList(sku)
        // } else if (jenisSurat == 'SKT') {
        //     $('#syarat').html('')
        //     showList(skt)
        // } else if (jenisSurat == 'SKGG') {
        //     $('#syarat').html('')
        //     showList(skgg)
        // } else if (jenisSurat == 'SITU') {
        //     $('#syarat').html('')
        //     showList(situ)
        // } else if (jenisSurat == 'SIMB') {
        //     $('#syarat').html('')
        //     showList(simb)
        // }
         else {
            console.log('Nothing')
        }
    })
</script>
<script type="text/javascript">
    var uploadField = document.getElementById("file");
    uploadField.onchange = function() {
        if (this.files[0].size > 5000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
            alert("Maaf. File Terlalu Besar ! Maksimal Upload 5 MB");
            this.value = "";
        };
    };
    function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
        function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
</script>

<!-- <script>

function startCalc(){

interval = setInterval("calc()",1);}

function calc(){

one = document.autoSumForm.trackid.value;

document.autoSumForm.total.value = (one * 1) * (two * 1) - (three * 1);}

function stopCalc(){

clearInterval(interval);}

</script> -->
</body>

</html>