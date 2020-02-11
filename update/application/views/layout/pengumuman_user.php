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
   
    <section class="content" >
    <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Judul</th>
                  <th>Isi</th>                  
                </tr>
                </thead>
                <tbody>
              <?php if(isset($query)){
                  foreach($query as $row): ?>
                <tr>
                  <td><?php echo $row->tanggal;?></td>
                  <td><a href="<?=base_url();?>index.php/pengumuman/detail/<?php echo $row->id_pengumuman ?>"><?php echo $row->judul;?></a></td>
                  <td><?php echo substr($row->isi,0,100);?> ...</td>                  
                </tr>                
                <?php endforeach; }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
