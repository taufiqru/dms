  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aplikasi Jurusan Sistem Informasi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Repository</h3>
              <p>Repository Dokumen Jurusan</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="<?=base_url();?>index.php/dokumen/dokumentree" class="small-box-footer">
              Masuk <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Agenda</h3>
              <p>Agenda Kegiatan Jurusan</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="<?=base_url();?>index.php/event" class="small-box-footer">
              Masuk <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Akademik</h3>
              <p>Sistem Bimbingan Akademik Online</p>
            </div>
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <a href="#"  class="small-box-footer maintenance">
              Masuk <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Absensi</h3>
              <p>Absensi Mahasiswa & Dosen</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#"  class="small-box-footer maintenance">
              Masuk <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="row">  
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <h3>Pengumuman</h3>
              <p>Kirim Pengumuman</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="<?=base_url();?>index.php/pengumuman" class="small-box-footer">
              Masuk <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
    </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="example-modal" >
      <div class="modal modal-danger">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Underconstruction</h4>
            </div>
            <div class="modal-body">
              <p>Fitur ini belum tersedia</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div> 
  <script type="text/javascript">
    $('.maintenance').on('click',function(){
      $('.modal').modal('show');
    })
   
  </script>
