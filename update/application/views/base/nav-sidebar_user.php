<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>img/img_avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('nama');?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        
       
        <li class="treeview">
          <a href="<?=base_url()?>index.php/dashboard/<?=$this->session->userdata('level')?>"><i class="fa fa-dashboard"></i> <span>Dashboard User</span></a>   
        </li>
        <li class="treeview">
          <a href="<?=base_url()?>index.php/peserta/index/edit/<?=$this->session->userdata('id_pegawai')?>"><i class="fa fa-user"></i> <span>Edit Profil</span></a>   
        </li>
        
        <li class="treeview">
          <a href="<?=base_url()?>index.php/event"><i class="fa fa-calendar"></i> <span>Agenda Kegiatan</span></a>   
        </li>
        <li class="treeview">
          <a href="<?=base_url();?>index.php/pengumuman/user"><i class="fa  fa-info-circle"></i> <span>Pengumuman</span>           
          </a>
       </li>
        <li class="treeview">
          <a href="<?=base_url()?>index.php/dokumen"><i class="fa fa-download"></i> <span>Dokumen</span></a>   
        </li>
         <li class="treeview">
          <a href="#"><i class="fa fa-cogs"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?=base_url();?>index.php/kategori_dokumen"><i class="fa fa-circle-o"></i> Kategori Dokumen       
              </a>              
            </li>
            <!--<li><a href="<?=base_url();?>index.php/akun/index/add"><i class="fa fa-circle-o"></i>Tambah Akun</a></li>  -->
          </ul>
        </li>
        
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-cogs"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?=base_url();?>index.php/kategori_dokumen"><i class="fa fa-circle-o"></i> Kategori Dokumen              
              </a>
             
            </li>
            <!--<li><a href="<?=base_url();?>index.php/akun/index/add"><i class="fa fa-circle-o"></i>Tambah Akun</a></li>  -->
          </ul>
        </li>
       
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>