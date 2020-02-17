<link rel="stylesheet" href="<?=base_url();?>css/jquery.loadingModal.css">  
<link rel="stylesheet" href="<?=base_url();?>theme/plugins/select2/select2.min.css">
<link rel="stylesheet" href="<?=base_url();?>theme/plugins/iCheck/all.css">
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
   
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-warning" >
            <div class="box-header">
              <h3 class="box-title">Tambah Folder Root</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <div class="box-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" id="btnFolder">
                <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;<span>Tambah Folder</span>
              </button>
              <br><br>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width:10px">#</th>
                    <th>Folder Root</th>
                    <th style="width:80px">Aksi</th>
                  </tr>
                </thead>
                <tbody id="rootfolder"></tbody>
              </table>
            </div>
            <div class="box-footer"></div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="box box-warning" >
            <div class="box-header">
              <h3 class="box-title">Pengaturan Akses Folder</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label>Level Akses</label>
                <select class="form-control select2" style="width:100%" id="level-akses">
                  <option></option>
                </select>
                <br><br>

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width:10px">#</th>
                      <th>Nama Folder</th>
                      <th>Hak Akses</th>
                    </tr>
                  </thead>
                  <tbody id="table-akses"></tbody>
                </table>
              </div>
            </div>
            <div class="box-footer"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    
    <!-- modal -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Folder Root</h4>
          </div>
          <div class="modal-body">
            <label>Nama Folder</label>
            <input type="text" class="form-control" name="nama" id="nama_folder">
            <input type="hidden" class="form-control" name="id" id="id_folder">
            <input type="hidden" class="form-control" name="aksi" id="aksi">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="simpanFolder">Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


  </div>
  <!-- /.content-wrapper -->
  <script src="<?=base_url();?>js/jquery.loadingModal.js"></script>
  <script src="<?=base_url();?>theme/plugins/select2/select2.min.js"></script>
  <script src="<?=base_url();?>theme/plugins/iCheck/icheck.min.js"></script>
  <script>
    function showModal() {
      $('body').loadingModal({text: 'Loading...'});
    }

    function hideModal(){
      $('body').loadingModal('hide');
      $('body').loadingModal('destroy') ;
    }

    function tabel_folder(){
        $("#rootfolder").empty();
        var url = "<?=base_url()?>setting/getfolder";
        $.getJSON(url,function(data){
          var items;
          var count = 0;
          if(data.length>0){
            $.each(data,function(key,val){
              count ++;
              var btnHapus = "<button class='btn bg-red btn-xs'><i class='fa fa-fw fa-remove' onClick='hpsFolder("+val.id_folder+")'></i></button>";
              var btnEdit = "<button class='btn bg-orange btn-xs'><i class='fa fa-fw fa-pencil' onClick='editFolder("+JSON.stringify(val)+")' id='btnEdit' data-toggle='modal' data-target='#modal-default'></i></button>";
              items = "<td>"+count+"</td><td>"+val.nama+"</td><td>"+btnHapus+"&nbsp;"+btnEdit+"</td>";
              $("<tr>",{html:items}).appendTo(" #rootfolder ");
            });
          }
          else{
            items = "<td colspan='3' align='center'>Data Masih Kosong</td>";
            $("<tr>",{html:items}).appendTo(" #rootfolder");
          }
        });
    }

    function editFolder(val){
      resetFormFolder();
      $("#nama_folder").val(val.nama);
      $("#aksi").val("Edit");
      $("#id_folder").val(val.id_folder);
    }

    function hpsFolder(val){
      var url = "<?=base_url()?>setting/delFolder";

      $.post(url,{id:val})
        .done(function(data){
          var obj = JSON.parse(data);
          $.notify({message: obj.message},{type: obj.type});
          tabel_folder();
          tabel_hak_akses()
        })
        .fail(function(xhr,status,error){
          $.notify({
            message: error 
          },{
            type: 'danger'
          });
        });
    }

    function resetFormFolder(){

      $('#nama_folder').val("");
    }

    function pilih(val){
      var levelAkses = $("#level-akses").val();
      if($("#"+val).is(":checked")){
        //console.log("level : "+level+",id :"+val+ "(centang)");
        var url = "<?=base_url()?>setting/invokeaccess";
        $.post(url,{level:levelAkses,folder:val}).done(function(done){
          console.log("sukses");
        });
      }else{
        var url = "<?=base_url();?>setting/revokeaccess";
        $.post(url,{level:levelAkses,folder:val}).done(function(done){
          console.log('hapus');
        });
        //console.log("level : "+level+",id :"+val+ "(tidak tercentang)");
      }
    }

    function hak_akses(val){
      var url = "<?=base_url()?>setting/getAccess/";
      $.getJSON(url,{idLevel:val},function(data){
        $.each(data,function(key,val){
          $("#"+val.id_folder_root).prop('checked',true);
        });
      });
    }

    function tabel_hak_akses(){
      $("#table-akses").empty();
        var url = "<?=base_url()?>setting/getfolder";
        var count = 0;
        $.getJSON(url,function(data){
          $.each(data,function(key,val){
            count ++;
            var items;
            items = "<td>"+count+"</td><td>"+val.nama+"</td><td><input type='checkbox' class='minimal' id='"+val.id_folder+"' onClick='pilih("+val.id_folder+")'></td>";
            $("<tr>",{html:items}).appendTo("#table-akses");
            hak_akses($("#level-akses").val());
          });
        })
    }
      

    $("document").ready(function(){
      tabel_folder();
      tabel_hak_akses()
      init_select();

      $(".select2").select2({

        placeholder : "Pilih Level Akses"
      });
      
      $('input[type="checkbox"].minimal').iCheck({

        checkboxClass: 'icheckbox_minimal-green',
      });

      $('#level-akses').on("change",function(e){
        tabel_hak_akses();
      });
      
      $('#simpanFolder').on('click',function(){
        var namaFolder = $("#nama_folder").val();
        var aksiFolder = $("#aksi").val();
        var idFolder = $("#id_folder").val();
        var url = "<?=base_url();?>setting/addfolder";
        $.post(url,{nama:namaFolder,aksi:aksiFolder,id:idFolder})
        .done(function(data){
          var obj = JSON.parse(data);
          $.notify({message: obj.message},{type: obj.type});
          resetFormFolder();
          $("#modal-default").modal('hide');
          tabel_folder();
          tabel_hak_akses()
        })
        .fail(function(xhr,status,error){
          $.notify({
            message: error 
          },{
            type: 'danger'
          });
        });
      });

      $('#btnFolder').on('click',function(){
        resetFormFolder();
        $("#aksi").val("Tambah");
      });

      

      function init_select(){
        var url = "<?=base_url()?>setting/getListLevelAkses";
        $.getJSON(url,function(data){
          $.each(data,function(key,val){
            var item;
            item = "<option value='"+val.id_level+"'>"+val.level+"</option>";
            $("#level-akses").append(item);
          });
        });
      }
    });

</script>
