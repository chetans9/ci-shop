<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/skins/skin-blue.min.css') ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
      <?php $this->load->view('admin/partials/flash'); ?>

      <?php echo form_open(base_url('index.php/login')) ?>
      <div class="form-group has-feedback<?php echo (form_error('email')) ? ' has-error' : ''; ?>">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>">
          <?php echo form_error('email', '<span class="help-block">', '</span>') ?>

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback<?php echo (form_error('password')) ? ' has-error' : ''; ?>">
        <input type="password" name="password" class="form-control" placeholder="Password">
          <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      <?php echo  form_close() ?>

    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

</script>
<script src="<?php echo base_url('assets/admin/js/adminlte.min.js') ?>"></script>
</body>
</html>
