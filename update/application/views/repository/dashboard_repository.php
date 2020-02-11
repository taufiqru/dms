  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Repository Jurusan Sistem Informasi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row"  style="margin-bottom:10px">
      <div class="col-lg-6 cols-xs-10" >
      <?php 
        if($dokumen!="parent"){
      ?>
        <a href="<?=base_url();?>index.php/dokumen/repository/add/<?php echo $dokumen; ?>" class="btn bg-olive btn-flat">
          <i class="fa fa-plus-circle"></i>
          Tambah Dokumen
        </a>
      <?php } ?>
        
        <a href="<?=base_url();?>index.php/kategori_dokumen/index/add" class="btn bg-teal btn-flat">
          <i class="fa fa-plus-circle"></i>
          Tambah Folder
        </a>
        <a href="<?=base_url();?>index.php/kategori_dokumen" class="btn bg-orange btn-flat">
          <i class="fa fa-cog"></i>
          Setting Folder
        </a>
      </div>        
      </div>
    <div class="row">
    <?php if(count($level)>0){?>
    <?php foreach($level as $row): ?>    
        <div class="col-lg-3 col-xs-5">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$row['nama_kategori'];?></h3>             
              <p><?=ucwords($row['deskripsi']);?></p>
            </div> 
            <?php 
            $this->db->where('level',$row['nama_kategori']);
            $sublevel=$this->db->count_all_results('kategori_dokumen');
            if($sublevel>0){
              $url="index.php/dokumen/index/".$row['nama_kategori'];
            }else{
              $url="index.php/dokumen/repository/".$row['id_kategori_dokumen'];
            }
            ?>           
            <a href=<?=base_url().$url?> class="small-box-footer">
              Masuk <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>   
    <?php endforeach;?>
    <?php }?>
    </div>    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
