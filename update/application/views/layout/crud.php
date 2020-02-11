<link rel="stylesheet" href="<?=base_url();?>css/jquery.loadingModal.css">  
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
    

    <!-- Main content -->
   
    <section class="content">
    <div class="box">
      
      <div class="box-body" style="width:550px">
        <?php echo $output; ?> 
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
