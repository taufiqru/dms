<link rel="stylesheet" href="<?=base_url()?>css/default/style.css" />
<link rel="stylesheet" href="<?=base_url()?>theme/plugins/datatables/jquery.dataTables.min.css" /> 
<link rel="stylesheet" href="<?=base_url()?>theme/plugins/datatables/jquery.dataTables_themeroller.css" /> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title_1; ?>
        <small><?php echo $title_2; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>        
      </ol>
    </section>
    <!-- Main content -->   
    <section class="content" >
    <div class="row">
      <div class="col-md-3">
        <div class="box"  style="overflow-y: hidden;"  >      
          <div class="box-body">
            <div id="ajax" class="demo"></div>
          </div>
          <div class="box-footer"></div>
        </div>
      </div>
      <div class="col-md-9" id="mainbox" >
        <!-- alert fail -->
        <div id="alertfail" class="alert alert-danger alert-dismissible" style="display:none">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i> Gagal!</h4>
          <span id="pesanerror">Terjadi Kesalahan Saat Menghapus Data.</span>
        </div>
        <!-- alert success -->
        <div id="alertsuccess" class="alert alert-success alert-dismissible" style="display:none">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-info"></i> Sukses!</h4>
          <span id="namafile"></span> Berhasil Dihapus.
        </div>
        <div class="box"> 
          <div class="box-header with-border" id="alamat">
            Repository Jurusan SI
          </div>     
          <div class="box-body" id="repository">
            <a href="#" class="btn bg-olive btn-flat" id="tambahFile">
              <i class="fa fa-plus-circle"></i>
              Tambah Dokumen
            </a>
            <br><br>
            <table id="dokumen" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>File</th>
                  <th>Folder</th>
                  <th>Aksi</th>                                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>File</th>
                  <th>Folder</th>
                  <th>Aksi</th>                                     
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="box-body" id="skripsi" style="display:none">
           <a href="#" class="btn bg-olive btn-flat" id="tambahSkripsi">
              <i class="fa fa-plus-circle"></i>
              Tambah Dokumen
            </a>
            <br><br>
            <table id="dokumen_skripsi" class="display" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Tahun</th>
                      <th>Judul</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>                                  
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Id</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Tahun</th>
                      <th>Judul</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>                                     
                  </tr>
              </tfoot>
            </table>
          </div>
          <div class="box-body" id="kp" style="display:none">
           <a href="#" class="btn bg-olive btn-flat" id="tambahKp">
              <i class="fa fa-plus-circle"></i>
              Tambah Dokumen
            </a>
            <br><br>
            <table id="dokumen_kp" class="display" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Tahun</th>
                      <th>Tempat</th>
                      <th>Judul</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>                                  
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Id</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Tahun</th>
                      <th>Tempat</th>
                      <th>Judul</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>                                     
                  </tr>
              </tfoot>
            </table>
          </div>
          <div class="box-body" id="penelitian" style="display:none">
           <a href="#" class="btn bg-olive btn-flat" id="tambahPenelitian">
              <i class="fa fa-plus-circle"></i>
              Tambah Dokumen
            </a>
            <br><br>
            <table id="dokumen_penelitian" class="display" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>Tahun</th>
                      <th>Jenis</th>
                      <th>Program</th>
                      <th>Judul</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>                                  
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Id</th>
                      <th>Nama</th>
                      <th>Tahun</th>
                      <th>Jenis</th>
                      <th>Program</th>
                      <th>Judul</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>                                     
                  </tr>
              </tfoot>
            </table>
          </div>
          <div class="box-footer" id="footer">footer</div>
        </div>        
      </div>    
    <div id="modal" style="display:none"></div>
    </div>  
    </section>   
  </div>
  <!-- /.content-wrapper -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?=base_url()?>js/jstree.js"></script>
<script src="<?=base_url()?>js/jstree.contextmenu.js"></script>
<script src="<?=base_url()?>js/jstree.state.js"></script>
<script src="<?=base_url()?>js/jstree.wholerow.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?=base_url()?>theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script>
  // ajax demo
  var active_id=1;
  var id;
  var active_node="";
  var temp_node;
  //$("#skripsi").hide();

  function setActive_node(temp_node){
    this.active_node=temp_node;
  }

  function getActive_node(){
    return active_node;
  }

  function setActive_id(id){
    this.active_id=id;
  }

  function getActive_id(){
    return active_id;
  }

  $('#ajax').jstree({
    'core' : {
      'data' : {
        "url" : "<?=base_url()?>index.php/dokumen/listfolder",
        "dataType" : "json" // needed only if you do not supply JSON headers
      },
      'force_text' : true,
      'check_callback' : true,
    },
    'plugins': ["state","wholerow","contextmenu"]
  })
  .on('create_node.jstree',function(e,data){
    $url="<?=base_url()?>index.php/dokumen/addfolder";
    $.get($url,{'id':data.node.id,'id_parent':data.node.parent,'position':data.position,'text':data.node.text})
      .done(function(d){
        console.log('sukses');
         data.instance.set_id(data.node, d.id);
      })
      .fail(function(){
        console.log('fail');
        data.instance.refresh();
      });     
  })
  .on('rename_node.jstree', function (e, data) {
    $url="<?=base_url()?>index.php/dokumen/renamefolder";
          $.get($url, { 'id' : data.node.id, 'text' : data.text })
            .fail(function () {
              data.instance.refresh();
            });
        })
  .on('delete_node.jstree', function (e, data) {
          $url="<?=base_url()?>index.php/dokumen/deletefolder";

          if(data.node.parent=='#'){
            $('#pesanerror').html("Root Folder Tidak Boleh Dihapus");
            $('#alertfail').slideDown().delay(2000).slideUp();
            data.instance.refresh();
            //console.log(data.node.parent);
          }else if(data.node.children.length!=0){
            //console.log(data.node.children);
             $('#pesanerror').html("Folder Tidak Dapat Dihapus, Silahkan Hapus Sub Folder Terlebih Dahulu ");
            $('#alertfail').slideDown().delay(2000).slideUp();
            data.instance.refresh();
          }else{
            $.get($url,{'id':data.node.id})
            .fail(function(){
              data.instance.refresh();
            }); 
            table.ajax.reload(); 
          }                  
        })
  .on('changed.jstree',function(e,data){
    console.log(data.selected[0]);
    if(data && data.selected && data.selected.length){
      $("#repository").hide();
      $("#kp").hide();        
      $("#skripsi").hide();
      $("#penelitian").hide();

      if(data.selected[0]==2){
        $("#skripsi").fadeIn();
      }else if(data.selected[0]==3){
        $("#kp").fadeIn();
      }else if(data.selected[0]==4){
        $("#penelitian").fadeIn();
      }else{
        $("#repository").fadeIn();      
      }
      console.log(data.selected[0]);
        $('#alamat').html("<b>Folder : " + data.node.text +"</b>");
        setActive_id(data.node.id);
        setActive_node(data.node.text);
        $('#footer').html("Id : " + getActive_id()); 
        table.ajax.url( '<?=base_url()?>index.php/dokumen/getFileList/'+ getActive_id() ).load();   
        table_skripsi.ajax.url( '<?=base_url()?>index.php/dokumen/getSkripsiList' ).load();          
    }
  })
  .on('move_node.jstree',function(e,data){
    if(data.node.id==1){
      $('#pesanerror').html("Folder Tidak Boleh Dipindah ");
      $('#alertfail').slideDown().delay(2000).slideUp();
      data.instance.refresh();
    }else{
      $url="<?=base_url()?>index.php/dokumen/movefolder";
      $.get($url,{'id':data.node.id,'parent':data.parent,'position':data.position})
        .fail(function(){
          data.instance.refresh();
        });
    }
    console.log(data.node.id);
  })
  .on('copy_node.jstree',function(e,data){
    $url="<?=base_url()?>index.php/dokumen/copyfolder";
    $.get($url,{'id':data.original.id,'parent':data.parent,'position':data.position})
      .always(function(){
        data.instance.refresh();
      })
  });
  
  $("#tambahFile").on('click',function(){
    var uploader_dialog= $("<div></div>")
    .html('<iframe style="border: 0px; " src="<?=base_url()?>index.php/dokumen/uploaderView?id='+getActive_id()+'" width="100%" height="100%"></iframe>')
    .dialog({
      autoOpen:false,
      title: "Upload Dokumen : " +getActive_node() ,
      modal:true,
      width:800,
      height:500,
      show:{
        effect:"fade",
        duration:500
      },
      hide:{
        effect:"fade",
        duration:500
      },
      buttons: {
        Tutup: function() {
          table.ajax.url( '<?=base_url()?>index.php/dokumen/getFileList/'+ getActive_id() ).load();
          $( this ).dialog( "close" );
        }}
    }); 
    uploader_dialog.dialog('open').fadeIn();
  }); 

 var table=$('#dokumen').DataTable( {
      "processing":true,
      "serverSide":true,
      "ajax":{
        "url":"<?=base_url()?>index.php/dokumen/getFileList/"+getActive_id(),
        "type":"POST"
      },
      "columns":[
        {
          data:"f.id_file",
          visible:false,
          searchable:false
        },
        {data:"f.file"},  
        {
          data:"f.folder",
          visible:false,
          searchable:false
        },          
        {
         "data": null,
         "searchable": false,
         "defaultContent": "<button id='download' class='btn bg-teal btn-flat'>Download</button> <button id='hapus' class='btn bg-red btn-flat'>Hapus</button>"
        }
      ] 
  } ); 

  $('#dokumen tbody').on('click','#download',function(){
    var data=table.row($(this).parents('tr')).data();
    window.open('<?=base_url()?>uploads/'+data.f.file, '_blank');
    console.log(data.f.file);
  });

  $('#dokumen tbody').on('click','#hapus',function(){
    var data=table.row($(this).parents('tr')).data();
    $url="<?=base_url()?>index.php/dokumen/deletefile";
    $.get($url,{'id':data.f.id_file,'file':data.f.file})
    .done(function(d){
      console.log(d);
      if(d.status){
        console.log(d.status);
        $('#namafile').html(data.f.file);
        $('#alertsuccess').slideDown().delay(2000).slideUp();  
      }else{
        $('#alertfail').slideDown().delay(2000).slideUp();
      }
      
      table.ajax.reload();
    })
    .fail(function(d){
      table.ajax.reload();
    });
    console.log("Delete : id: "+data.f.id_file+ ", file : " + data.f.file);
  });

  var table_skripsi=$('#dokumen_skripsi').DataTable({
      "processing":true,
      "serverSide":true,
      "ajax":{
        "url":"<?=base_url()?>index.php/dokumen/getSkripsiList",
        "type":"POST"
      },
      "columns":[
        {
          data:"s.id_skripsi",
          visible:false,
          searchable:false
        },
        {data:"s.nim"},
        {data:"s.nama"},
        {data:"s.tahun"},
        {data:"s.judul"},  
        {
          data:"s.dokumen",
          visible:false,
          searchable:false
        },          
        {
         "data": null,
         "searchable": false,
         "defaultContent": "<button id='download_skripsi' class='btn bg-teal btn-flat'>Download</button> <button id='hapus_skripsi' class='btn bg-red btn-flat'>Hapus</button>"
        }
      ] 
  } );

  function reload_tabel_skripsi(){
    table_skripsi.ajax.url( '<?=base_url()?>index.php/dokumen/getSkripsiList' ).load();
  }

  $("#tambahSkripsi").on('click',function(){
    $("#modal_skripsi").modal('show');
  });

  $('#dokumen_skripsi tbody').on('click','#download_skripsi',function(){
    var data=table_skripsi.row($(this).parents('tr')).data();
    if(data.s.dokumen!=""){
      window.open('<?=base_url()?>assets/uploads/files/'+data.s.dokumen, '_blank');
      console.log(data.s.dokumen);  
    }else{
      alert('dokumen tidak ditemukan');
    }
    
  });

  $('#dokumen_skripsi tbody').on('click','#hapus_skripsi',function(){
    var data=table_skripsi.row($(this).parents('tr')).data();
    $url="<?=base_url()?>index.php/dokumen/deleteskripsi";
    $.get($url,{'id':data.s.id_skripsi,'dokumen':data.s.dokumen})
    .done(function(d){
      console.log(d);
      if(d.status){
        console.log(d.status);
        $('#namafile').html(data.s.dokumen);
        $('#alertsuccess').slideDown().delay(2000).slideUp();  
      }else{
        $('#alertfail').slideDown().delay(2000).slideUp();
      }
      
      reload_tabel_skripsi();
    })
    .fail(function(d){
      reload_tabel_skripsi();
    });
    console.log("Delete : id: "+data.s.id_skripsi+ ", dokumen : " + data.s.dokumen);
    
  });
</script>

<!-- modal dialog skripsi !-->
<div class="example-modal">
  <div class="modal fade modal-primary" id="modal_skripsi">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-cogs margin-r-5"></i><span class="modal-judul"></span>Entri Skripsi</h4>
        </div>
        <div class="modal-body" style="height:400px">
            <iframe style="border: 0px;display:block; " src="<?=base_url()?>index.php/skripsi/index/add" width="100%" height="100%"></iframe>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline btn-danger" id="close_skripsi">Tutup</button>
          </div>
      </div>
      </div>
    </div>
  </div>
<script>
  $("#close_skripsi").on('click',function(){
    reload_tabel_skripsi();
    $("#modal_skripsi").modal('toggle');
  });

  var table_kp=$('#dokumen_kp').DataTable({
      "processing":true,
      "serverSide":true,
      "ajax":{
        "url":"<?=base_url()?>index.php/dokumen/getKPList",
        "type":"POST"
      },
      "columns":[
        {
          data:"k.id_kp",
          visible:false,
          searchable:false
        },
        {data:"k.nim"},
        {data:"k.nama"},
        {data:"k.tahun"},
        {data:"k.tempat"},
        {data:"k.judul"},  
        {
          data:"k.dokumen",
          visible:false,
          searchable:false
        },          
        {
         "data": null,
         "searchable": false,
         "defaultContent": "<button id='download_kp' class='btn bg-teal btn-flat'>Download</button> <button id='hapus_kp' class='btn bg-red btn-flat'>Hapus</button>"
        }
      ] 
  } );

  function reload_tabel_kp(){
    table_kp.ajax.url( '<?=base_url()?>index.php/dokumen/getKPList' ).load();
  }

  $("#tambahKp").on('click',function(){
    $("#modal_kp").modal('show');
  });

  $('#dokumen_kp tbody').on('click','#download_kp',function(){
    var data=table_kp.row($(this).parents('tr')).data();
    if(data.k.dokumen!=""){
      window.open('<?=base_url()?>assets/uploads/files/'+data.k.dokumen, '_blank');
      console.log(data.k.dokumen);  
    }else{
      alert('dokumen tidak ditemukan');
    }
    
  });

  $('#dokumen_kp tbody').on('click','#hapus_kp',function(){
    var data=table_kp.row($(this).parents('tr')).data();
    $url="<?=base_url()?>index.php/dokumen/deletekp";
    $.get($url,{'id':data.k.id_kp,'dokumen':data.k.dokumen})
    .done(function(d){
      console.log(d);
      if(d.status){
        console.log(d.status);
        $('#namafile').html(data.k.dokumen);
        $('#alertsuccess').slideDown().delay(2000).slideUp();  
      }else{
        $('#alertfail').slideDown().delay(2000).slideUp();
      }
      
      reload_tabel_kp();
    })
    .fail(function(d){
      reload_tabel_kp();
    });
    console.log("Delete : id: "+data.k.id_kp+ ", dokumen : " + data.k.dokumen);
    
  });

</script> 

<!-- modal dialog kp !-->
<div class="example-modal">
  <div class="modal fade modal-primary" id="modal_kp">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-cogs margin-r-5"></i><span class="modal-judul"></span>Entri Kerja Praktek</h4>
        </div>
        <div class="modal-body" style="height:450px">
            <iframe style="border: 0px;display:block; " src="<?=base_url()?>index.php/kp/index/add" width="100%" height="100%"></iframe>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline btn-danger" id="close_kp">Tutup</button>
          </div>
      </div>
      </div>
    </div>
  </div> 
<script type="text/javascript">
  $("#close_kp").on('click',function(){
    reload_tabel_kp();
    $("#modal_kp").modal('toggle');
  });

  var table_penelitian= $('#dokumen_penelitian').DataTable({
      "processing":true,
      "serverSide":true,
      "ajax":{
        "url":"<?=base_url()?>index.php/dokumen/getPenelitianList",
        "type":"POST"
      },
      "columns":[
        {
          data:"p.id_penelitian",
          visible:false,
          searchable:false
        },
        {data:"p.nama"},
        {data:"p.tahun"},
        {data:"p.jenis"},
        {data:"p.program"},
        {data:"p.judul"},  
        {
          data:"p.dokumen",
          visible:false,
          searchable:false
        },          
        {
         "data": null,
         "searchable": false,
         "defaultContent": "<button id='download_penelitian' class='btn bg-teal btn-flat'>Download</button> <button id='hapus_penelitian' class='btn bg-red btn-flat'>Hapus</button>"
        }
      ] 
  } );

  function reload_tabel_penelitian(){
    table_penelitian.ajax.url( '<?=base_url()?>index.php/dokumen/getPenelitianList' ).load();
  }

  $("#tambahPenelitian").on('click',function(){
    $("#modal_penelitian").modal('show');
  });

  $('#dokumen_penelitian tbody').on('click','#download_penelitian',function(){
    var data=table_penelitian.row($(this).parents('tr')).data();
    if(data.p.dokumen!=""){
      window.open('<?=base_url()?>assets/uploads/files/'+data.p.dokumen, '_blank');
      console.log(data.p.dokumen);  
    }else{
      alert('dokumen tidak ditemukan');
    }
    
  });

  $('#dokumen_penelitian tbody').on('click','#hapus_penelitian',function(){
    var data=table_penelitian.row($(this).parents('tr')).data();
    $url="<?=base_url()?>index.php/dokumen/deletepenelitian";
    $.get($url,{'id':data.p.id_penelitian,'dokumen':data.p.dokumen})
    .done(function(d){
      console.log(d);
      if(d.status){
        console.log(d.status);
        $('#namafile').html(data.p.dokumen);
        $('#alertsuccess').slideDown().delay(2000).slideUp();  
      }else{
        $('#alertfail').slideDown().delay(2000).slideUp();
      }
      
      reload_tabel_penelitian();
    })
    .fail(function(d){
      reload_tabel_penelitian();
    });
    console.log("Delete : id: "+data.p.id_penelitian+ ", dokumen : " + data.p.dokumen);
    
    
  });

</script> 

  <!-- modal dialog penelitian !-->
<div class="example-modal">
  <div class="modal fade modal-primary" id="modal_penelitian">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-cogs margin-r-5"></i><span class="modal-judul"></span>Entri Penelitian, Pengabdian dan Publikasi Dosen</h4>
        </div>
        <div class="modal-body" style="height:450px">
            <iframe style="border: 0px;display:block; " src="<?=base_url()?>index.php/penelitian/index/add" width="100%" height="100%"></iframe>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline btn-danger" id="close_penelitian">Tutup</button>
          </div>
      </div>
      </div>
    </div>
  </div> 
<script type="text/javascript">
  $("#close_penelitian").on('click',function(){
    reload_tabel_penelitian();
    $("#modal_penelitian").modal('toggle');
  });

</script> 