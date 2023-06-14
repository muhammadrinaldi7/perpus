var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
// Login
var cek = $("#cek-flashdata").data("flashdata");
if(cek == "gagal"){
    Toast.fire({
        icon: 'error',
        title: ' Username dan password salah!'
    });
}else if(cek == "berhasil"){
    Toast.fire({
        icon: 'success',
        title: ' Logout Berhasil!'
    });
}