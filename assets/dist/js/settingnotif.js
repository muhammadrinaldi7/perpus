var Toast1 = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
// Setting
var cekSetting = $("#cek-setting").data("flashdata");
if (cekSetting == "gagal") {
    Toast1.fire({
        icon: 'error',
        title: ' Data user gagal diubah!'
    });
} else if (cekSetting == "setting berhasil") {
    Toast1.fire({
        icon: 'success',
        title: ' Data setting berhasil diubah!'
    });
} else if (cekSetting == "setting gagal") {
    Toast1.fire({
        icon: 'error',
        title: ' Data setting gagal diubah!'
    });
}