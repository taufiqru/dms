<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agenda
        <small>Kalender Agenda Kegiatan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Agenda</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
              
              <!-- the events -->
              <div id="external-events">
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Create Event</h3>
            </div>
            <div class="box-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                <div class="input-group-btn">
                  <?php 
                   $level=$this->session->userdata('level');
                  if($level!='Admin'){ ?>
                   <button id="add-new-event" type="button" class="btn btn-primary btn-flat" disabled>Add</button>
                  <?php }else{?>
                   <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                   <?php }?>
                </div>
                <!-- /btn-group -->
              </div>
              <!-- /input-group -->
            </div>
          </div>

          

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="example-modal">
        <div class="modal modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-cogs margin-r-5"></i><span class="modal-judul"></span></h4>
              </div>
              <div class="modal-body">
                <strong><i class="fa fa-calendar margin-r-5"></i> Tanggal Pelaksanaan :</strong>
                <p class="modal-pelaksanaan">{tanggal} sampai dengan {tanggal}</p>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Tempat Pelaksanaan :</strong>
                <p class="modal-tempat">{tempat}</p>

                <strong><i class="fa fa-users margin-r-5"></i> Materi :</strong>
                <p class="modal-peserta">{materi}</p>
              </div>
              <div class="modal-footer">                 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</div>
      <!-- /.example-modal -->
