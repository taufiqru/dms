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
            Loading...
          </div>     
          <div class="box-body" id="repository">
            
            <?php if($this->session->userdata('level')==="Admin"){?>
            <a href="#" class="btn bg-blue" id="tambahFile">
              <i class="fa fa-plus-circle"></i>
              Tambah Dokumen
            </a>
            <br><br>
            <?php }?>
            
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
<script src="<?=base_url()?>js/jstree.checkbox.js"></script>
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

  $('document').ready( function (){

  $('#ajax').jstree({
    'core' : {
      'data' : {
        "url" : function(node){
          if(node.id==='#'){
            return "<?=base_url()?>index.php/dokumen/listfolder";  
          }else{
            return "<?=base_url()?>index.php/dokumen/listchild?id="+node.id;
          }
        },
        },
      'force_text' : true,
      'check_callback' : true,
    },
    'plugins': ["state","wholerow","contextmenu"]
  })
    .on('state_ready.jstree',function(){
      var sel = $('#ajax').jstree().get_selected(true)[0];
      if(sel==null){
        $('#ajax').jstree('select_node', 'ul > li:first');  
      }
      
    })
    .on('create_node.jstree',function(e,data){
      $url="<?=base_url()?>index.php/dokumen/addfolder";
      $.getJSON($url,{'id':'','id_parent':data.node.parent,'position':data.position,'nama':data.node.text})
        .done(function(d){
          //console.log('sukses');
           data.instance.set_id(data.node, d.id);
        })
        .fail(function(){
          //console.log('fail');
          data.instance.refresh();
        });     
    })
    .on('rename_node.jstree', function (e, data) {
      $url="<?=base_url()?>index.php/dokumen/renamefolder";
            $.get($url, { 'id' : data.node.id, 'nama' : data.text },function(data){
                //console.log(data);
              })
              .fail(function () {
                console.log('fail');
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
      //console.log(data);
      //console.log(data.selected[0]);
      if(data && data.selected && data.selected.length){
        $("#repository").fadeIn();      
       //console.log(data.selected[0]);
          $('#alamat').html("<b>Folder : " + data.node.text +"</b>");
          setActive_id(data.node.id);
          setActive_node(data.node.text);
          $('#footer').html("Id : " + getActive_id()); 
          table.ajax.url( '<?=base_url()?>index.php/dokumen/getFileList/'+ getActive_id() ).load();   
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
             "defaultContent": "<button id='download' class='btn bg-teal '>Download</button> <button id='hapus' class='btn bg-red'>Hapus</button>"
            }
          ] 
    } ); 

    $('#dokumen tbody').on('click','#download',function(){
      var data=table.row($(this).parents('tr')).data();
     // window.open('<?=base_url()?>uploads/'+data.f.file, '_blank');
     // var url = '<?=base_url()?>dokumen/setwatermark';
     // $.get(url,{'file':data.f.file}).done(function(data){

     // });
     var nama = "<?=$this->session->userdata('nama')?>";
     var np = "<?=$this->session->userdata('no_pegawai')?>";
     window.open('<?=base_url()?>WatermarkPDF/Watermark.php?file='+data.f.file+'&nama='+nama+'&np='+np, '_blank');
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
  });
  
</script>

