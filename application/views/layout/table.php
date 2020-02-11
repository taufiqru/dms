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
        <!-- <a class="btn bg-red btn-flat" href="<?=$back_button?>" onClick="" >
          <i class="fa fa-chevron-circle-left"></i> Kembali
        </a> -->
      </div>
      <div class="box-body">
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
