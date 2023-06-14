<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $setting['initial']; ?> | Log in</title>
  <link rel="shortcut icon" href="<?= base_url('assets/image/') . $setting['logo']; ?>" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <style>
    body,
    html {
      height: 100%;
    }

    .bg {
      background-image: url("<?= base_url('assets/image/') . $setting['latar']; ?>");
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body class="hold-transition login-page bg">
  <div id="cek-flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/image/') . $setting['logo']; ?>" style="height: 100px; margin: auto;"></img>
        <br>
        <b style="background-color: yellow; margin: auto"><?= $setting['title']; ?></b>
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silakan login terlebih dahulu</p>

        <form action="<?= base_url('auth') ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="username" name="username" value="<?= set_value('username'); ?>" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?= form_error('username', '<small class="text-danger mb-3">', '</small>'); ?>
          <div class="input-group mb-3">
            <input id="passform" type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?= form_error('password', '<small class="text-danger mb-3">', '</small>'); ?>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="lihatpass">
                <label for="lihatpass">
                  Lihat Password
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <div style="position: fixed; bottom:0; width: 100%; height: 50px; background-color: gray;"></div>

  <!-- jQuery -->
  <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Tambahan -->
  <script src="<?= base_url('assets/'); ?>dist/js/seepassword.js"></script>
  <script src="<?= base_url('assets/'); ?>dist/js/notifaing.js"></script>
</body>

</html>