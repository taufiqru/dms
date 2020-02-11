  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title1; ?>
        <small><?php echo $title2; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <?php if(isset($query)){
            foreach($query as $row):
              $judul=$row->judul;
              $tanggal=$row->tanggal;
              $isi=$row->isi;
              $gambar=$row->gambar;
              $attachment=$row->attachment;
            endforeach;  
      }?>

    <section class="content" >
    <div class="box">
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $judul;?></h3>
                <h5>Dibuat Tanggal : <?php echo $tanggal;?></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border">
                <div class="btn-group">                  
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Kembali" onClick="window.history.go(-1); return false;">
                    <i class="fa fa-reply"></i></button>                  
                </div>              
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <?php echo $isi;?>    
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <ul class="mailbox-attachments clearfix">
               <?php if(!empty($attachment)){?>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                  <div class="mailbox-attachment-info">
                    <a href="<?=base_url();?>assets\uploads\files\<?php echo $attachment;?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo $attachment;?></a>                        
                  </div>
                </li>
               <?php }?>
               <?php if(!empty($gambar)){?>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="<?=base_url();?>assets\uploads\files\<?php echo $gambar;?>" alt="Attachment"></span>
                  <div class="mailbox-attachment-info">
                    <a href="<?=base_url();?>assets\uploads\files\<?php echo $gambar;?>" class="mailbox-attachment-name"><i class="fa fa-camera"></i> <?php echo $gambar;?></a>                        
                  </div>
                </li>
               <?php } ?> 
              </ul>
            </div>
           
          </div>
          <!-- /. box -->
    </div>
    </section>
    
   
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
