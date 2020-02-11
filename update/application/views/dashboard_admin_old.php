  
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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$jumlah_kegiatan;?></h3>

              <p>Agenda Kegiatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="<?=base_url();?>index.php/event" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$jumlah_pegawai;?></h3>

              <p>User </p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=base_url();?>index.php/peserta" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$jumlah_pengumuman?></h3>

              <p>Pengumuman</p>
            </div>
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <a href="<?=base_url();?>index.php/pengumuman" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$jumlah_dokumen?></h3>

              <p>Dokumen</p>
            </div>
            <div class="icon">
              <i class="fa fa-download"></i>
            </div>
            <a href="<?=base_url();?>index.php/dokumen" class="small-box-footer">
              Detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
    </div>
      
    <div class="row">
      <div class="col-lg-6">
        <!-- quick email widget -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Kegiatan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="col-lg-6">
        <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Kalender Kegiatan</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
           
          </div>
          
      </div>
    </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
