  <?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Akun
        <small>Akun Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
   
    <section class="content" >
    <div class="box" >
      <div class="box-header"></div>
      <div class="box-body">
        <?php echo $output; ?> 
      </div>
      <div class="box-footer"></div>
    </div>
    </section>
    
   
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
