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
    <div class="box box-warning" style="overflow:auto">
      <div class="box-header with-border">
        <h3 class="box-title">Pengaturan Level Akses</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <div class="box-body">
        <!-- isi -->
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <label>Nama Level Akses</label>
              <input type="text" class="form-control" name="level" id="level"/>
              <label>Keterangan</label>
              <textarea class="form-control" rows="3" name="keterangan" id="keterangan"></textarea>
              <br>
              <div align="right">
                <button class="btn bg-blue" id="submit_level_akses">Simpan</button>
              </div>
            </div>
            <div class="col-md-9">
              <table class="table table-striped" >
                <tbody id="tbody_level_akses">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer"></div>
    </div>
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->
  <script src="<?=base_url();?>/js/jquery.loadingModal.js"></script>
  <script>
    // $('document').ready(function(){
      //showModal();
      //setTimeout(hideModal,1000);

    function showModal() {
      $('body').loadingModal({text: 'Loading...'});
    }

    function hideModal(){
      $('body').loadingModal('hide');
      $('body').loadingModal('destroy') ;
    }

    function hpsLevelAkses(id){
      var url = "<?=base_url();?>setting/rmvListLevelAkses";
      $.post(url,{id_level_akses:id}).done(function(data){
        tabel_level_akses();
        var obj = JSON.parse(data);
        $.notify({
            message: obj.message 
          },{
            type: obj.type
          }); 
      }).fail(function(xhr,status,error){
          $.notify({
            message: error 
          },{
            type: 'danger'
          });
        });
      
    }  
      
    tabel_level_akses();


      
    function tabel_level_akses(){
      $("#tbody_level_akses").empty();
      $.getJSON('<?=base_url();?>setting/getListLevelAkses',function(data){
        var items;
        var count = 0;
        items = "<th style='width:10px'>#</th><th>Level Akses</th><th>Keterangan</th><th>Aksi</th>";
        $("<tr>",{html:items}).appendTo(" #tbody_level_akses ");
        if(data.length>0){
          $.each(data,function(key,val){
            count++;
            var btnHapus = "<button class='btn bg-red btn-xs'><i class='fa fa-fw fa-remove' onClick='hpsLevelAkses("+val.id_level+")'></i></button>";
            var btnEdit = "";
            items = "<td>"+count+"</td><td>"+val.level+"</td><td>"+val.keterangan+"</td><td>"+btnHapus+"</td>";
            $("<tr>",{html:items}).appendTo(" #tbody_level_akses ");

          });
        }else{
          items = "<td colspan='3' align='center'>Data Masih Kosong</td>";
          $("<tr>",{html:items}).appendTo(" #tbody_level_akses ");
        }
      });
    }

    function resetFormLevelAkses(){
      $("#level").val("");
      $("#keterangan").val("")
    } 

    $("#submit_level_akses").on('click',function(){
      var url = "<?=base_url()?>setting/addListLevelAkses";
      $.post(url,{
            level : $("#level").val(),
            keterangan : $("#keterangan").val()
        }).done(function(data){
          console.log(data);
          var obj = JSON.parse(data);
          $.notify({
            message: obj.message 
          },{
            type: obj.type
          }); 
          tabel_level_akses();
          resetFormLevelAkses();
        }).fail(function(xhr,status,error){
          $.notify({
            message: error 
          },{
            type: 'danger'
          });
        });

    });

    // });


    

</script>
