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
          <a href="<?=base_url()?>index.php/dashboard/admin"><i class="fa fa-home"></i> <span>Home</span></a>       
        </li>
        <li class="treeview">
          <a href="<?=base_url()?>index.php/dokumen/dokumentree"><i class="fa fa-file"></i> <span>Repository</span>            
          </a>                 
        </li>
        <li class="treeview">
          <a href="<?=base_url()?>index.php/event"><i class="fa  fa-calendar"></i> <span>Agenda</span>            
          </a>          
        </li>
        <li class="treeview">
          <a href="#"><i class="fa  fa-info-circle"></i> <span>Bimbingan Akademik</span>         
          </a>          
        </li>
        <li class="treeview">
          <a href="#"><i class="fa  fa-users"></i> <span>Absensi</span>           
          </a>          
        </li>
        <li class="treeview">
          <a href="<?=base_url()?>index.php/pengumuman"><i class="fa  fa-envelope"></i> <span>Pengumuman</span>           
          </a>          
        </li>
        <li class="treeview">
          <a href="<?=base_url()?>index.php/pegawai"><i class="fa  fa-users"></i> <span>Akun</span>           
          </a>          
        </li>        
        <li class="treeview">
              <a href="<?=base_url();?>index.php/login/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a>          
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>