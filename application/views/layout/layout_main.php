<!--Iconnya-->
<link rel="shortcut icon" href="<?php echo base_url('/Assets/Admin/dist/img/logo.ico');?>"/>
<header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('Login/Welcome')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SP</b>KB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIPE</b>KEBA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('Assets/Admin/dist/img/avatar.png')?>" class="user-image" alt="Notif">
              <span class="hidden-xs"><?=$this->session->fullname;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('Assets/Admin/dist/img/admin/man.png')?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->fullname?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('Login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('Assets/Admin/dist/img/admin/man.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->fullname;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?=$this->session->level;?></a>
        </div>
      </div>

      <!-- /.search form -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview active">
          <a href="<?=base_url('Dashboard')?>">
            <i class="fa fa-home" aria-hidden="true"></i> <span>Dashboard</span>
          </a>
        </li>
        <!-- <li class="treeview active">
          <a href="#">
            <i class="fa fa-usd" aria-hidden="true"></i> <span>Data Saldo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->uri_string() == 'Saldo') { echo 'active'; } ?>"><a href="<?=base_url('Saldo')?>"><i class="fa fa-circle-o"></i> Saldo New</a></li>
            <li class="<?php if($this->uri->uri_string() == 'Saldo/verified') { echo 'active'; } ?>"><a href="<?=base_url('Saldo/verified')?>"><i class="fa fa-circle-o"></i> <span> Saldo Terkirim</span></a></li>
          </ul>
        </li> -->
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>