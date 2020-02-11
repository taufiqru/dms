<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Repository SI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url();?>theme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>theme/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>theme/dist/css/AdminLTE.min.css"> 
  <link rel="stylesheet" href="<?=base_url();?>theme/dist/css/skins/skin-green.css"> 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- jQuery 2.2.3 -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?=base_url();?>theme/bootstrap/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src=".<?=base_url();?>theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?=base_url();?>theme/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url();?>theme/dist/js/app.js"></script>
  <!-- AdminLTE for demo purposes -->

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <a href="<?=base_url()?>" class="navbar-brand"><b><img src="<?=base_url()?>img/logo-unsri-Copy.png" width="30px" cellpadding="40px">  Repository Jurusan Sistem Informasi</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
           
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="<?=base_url();?>index.php/login" class="dropdown-toggle" target="_blank">              
                <span class="hidden-xs">Login</span>
              </a>
             
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <!-- <section class="content-header" style="align:center;">
        <h1>
          Repository Jurusan Sistem Informasi
          <small>FASILKOM UNSRI</small>
        </h1>
      </section> -->

      <!-- Main content -->
      <section class="content">       
        <div class="box">
          <?php $this->load->view($view,$param);?>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Fasilkom</b> UNSRI
      </div>
      <strong>Copyright &copy; 2017 <a href="#">Tim Pengembang Web Jurusan SI</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->


</body>
</html>
