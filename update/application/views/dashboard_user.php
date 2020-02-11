  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Dashboard Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?=base_url();?>/img/img_avatar.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?=$nama?></h3>

              <p class="text-muted text-center">NIP. <?=$NIP?></p>

              
              <!--<a href="#" class="btn btn-primary btn-block"><b>Edit akun</b></a>-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-calendar margin-r-5"></i> Tempat Tanggal Lahir</strong>

              <p class="text-muted">
                <?php echo $tempat_lahir;?>, <?php echo $tanggal_lahir;?>
              </p>

              <hr>

              <strong><i class="fa fa-envelope-o margin-r-5"></i> Email</strong>

              <p class="text-muted">
                <?php echo $email;?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted"><?php echo $alamat;?></p>

              <hr>

              <a href="<?=base_url()?>index.php/peserta/index/edit/<?=$this->session->userdata('id_pegawai')?>" class="btn btn-primary btn-block"><b>Edit Biodata</b></a>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <?php if(isset($query_pengumuman)){
                  foreach($query_pengumuman->result() as $row):?>
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title"><?php echo $row->judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl>
                <?php echo substr($row->isi,0,150); ?>
                <?php 
                  echo "<br>";
                  echo "<a href='".base_url()."index.php/pengumuman/detail/".$row->id_pengumuman."'>selengkapnya&raquo;</a>";
                ?>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
        <?php endforeach; }?>
          <!-- /.box -->
          
          <!-- /.box -->
        </div>
        <div class="col-md-3">
        <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jadwal Kegiatan Per Bulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php if(isset($query_kegiatan)){
                      foreach($query_kegiatan as $row):
              ?>
              <strong><i class="fa fa-calendar margin-r-5"></i> <?php echo $row->tanggal; ?></strong>
              <p class="text-muted">
                <?php echo $row->nama;?>
              </p>
              <hr>
              <?php endforeach; }?>
              <a href="" class="btn btn-block btn-primary">Detail</a>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <!-- ./col -->
        
      </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
