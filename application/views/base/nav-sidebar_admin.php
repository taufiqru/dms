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
          <a href="<?=base_url()?>index.php/dokumen"><i class="fa fa-home"></i> <span>Home</span></a>       
        </li>
        <!-- <li class="treeview">
          <a href="<?=base_url()?>index.php/dokumen"><i class="fa fa-file"></i> <span>Repository</span>            
          </a>                 
        </li> -->
        <?php if($this->session->userdata('level')=="Admin"){?>
          <li class="treeview">
            <a href="#">

              <i class="fa fa-gears"></i><span>Pengaturan</span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="<?=base_url()?>setting">
                  <i class="fa fa-circle-o"></i>  
                  <span>Level Akses</span>
                </a>
              </li>
              <li>
                <a href="<?=base_url()?>setting/folder">
                  <i class="fa fa-circle-o"></i>
                  <span>Folder & Hak Akses</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="<?=base_url()?>akun"><i class="fa  fa-users"></i> <span>Akun</span>           
            </a>          
          </li>        
        <?php }?>
        
        <li class="treeview">
              <a href="<?=base_url();?>index.php/login/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a>          
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>