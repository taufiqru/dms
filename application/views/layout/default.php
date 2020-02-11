<link rel="stylesheet" href="<?=base_url();?>css/jquery.loadingModal.css">  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title_1; ?>
        <small><?php echo $title_2; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
   
    <section class="content" >
    <div class="box" >
      <div class="box-header">
        <h3 class="box-title">Pengaturan Level Akses</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <div class="box-body">
         
      </div>
      <div class="box-footer"></div>
    </div>
    </section>
    
   
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->
  <script src="<?=base_url();?>/js/jquery.loadingModal.js"></script>
  <script>
    function showModal() {
      $('body').loadingModal({text: 'Loading...'});
    }

    function hideModal(){
      $('body').loadingModal('hide');
      $('body').loadingModal('destroy') ;
    }

</script>
