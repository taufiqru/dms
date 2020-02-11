<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Manajemen Jurusan | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>theme/bootstrap/css/bootstrap.min.css">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>theme/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url();?>theme/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    .callout{
      z-index :1;
      position :fixed;
      left:50%;  
      top:30%;
      -webkit-transform: translate(-50%, 0);
    }
    
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="background:white">
  <?php 
  if(isset($status)){
    ?>
    <div style="display:none;" class="callout callout-danger">      
      <h4><i class="icon fa fa-ban"></i> Alert!</h4>
      <p>Invalid Username or Password!</p>
    </div>
    <script type="text/javascript">
      
    </script>
    <?php
  }?>
  <div class="login-logo" >
  <img src="<?=base_url()?>/img/pertamina.png" width="100%" height="100%">
    <a href="#"><b>Aplikasi </b><br>&nbsp;Jurusan Sistem Informasi</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    
    

    <form action="<?=base_url();?>index.php/login/auth" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" >Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url();?>theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url();?>theme/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url();?>theme/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $(".callout").slideDown().delay(2000).slideUp();

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

    $('#signin').click(function(evt){
      window.location="<?=base_url();?>index.php/dashboard/user";
      return false;
    });

  });
</script>
</body>
</html>
