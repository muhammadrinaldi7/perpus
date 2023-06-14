var Toast1 = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
// Query CHECK
var cekKelas = $("#cek-query").data("flashdata");
if (cekKelas == "tambah berhasil"){
    Toast1.fire({
        icon: 'success',
        title: ' Data berhasil ditambah!'
    });
}else if(cekKelas == "tambah gagal"){
    Toast1.fire({
        icon: 'error',
        title: ' Data gagal ditambah!'
    });
}else if (cekKelas == "edit berhasil"){
    Toast1.fire({
        icon: 'success',
        title: ' Data berhasil diedit!'
    });
}else if(cekKelas == "edit gagal"){
    Toast1.fire({
        icon: 'error',
        title: ' Data gagal diedit!'
    });
}else if (cekKelas == "hapus berhasil"){
    Toast1.fire({
        icon: 'success',
        title: ' Data berhasil dihapus!'
    });
}else if(cekKelas == "hapus gagal"){
    Toast1.fire({
        icon: 'error',
        title: ' Data gagal dihapus!'
    });
}