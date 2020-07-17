<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pelaporan Kehilangan Barang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/fa/css/font-awesome.css">
  <!--Iconnya-->
  <link rel="shortcut icon" href="<?php echo base_url('/Assets/Admin/dist/img/logo.ico');?>"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/ion/css/ionicons.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/plugins/sweet/sweetalert2.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/datatables/dataTables.bootstrap.css');?>" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/D_Table/jquery.dataTables.min.css');?>" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>Assets/Admin/dist/css/skins/_all-skins.min.css">
  <!--Jquery-Confirm-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">

  <style type="text/css">
    td.highlight {
      background-color: whitesmoke !important;
    }
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 0px !important;
      margin-left: 0px !important;
    }
  </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
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

        <!-- Laporan -->
        <li class="treeview">
          <a href="<?=base_url('Laporan')?>">
            <i class="fa fa-list" aria-hidden="true"></i> <span>Laporan</span>
          </a>
        </li>
        
        <!-- Layanan -->
        <li class="treeview">
          <a href="<?=base_url('Layanan')?>">
            <i class="fa fa-list" aria-hidden="true"></i> <span>Layanan</span>
          </a>
        </li>

        <!-- Admin -->
        <li class="treeview">
          <a href="<?=base_url('Users')?>">
            <i class="fa fa-users" aria-hidden="true"></i> <span>User</span>
          </a>
        </li>

        <!-- Admin -->
        <li class="treeview">
          <a href="<?=base_url('Admin')?>">
            <i class="fa fa-users" aria-hidden="true"></i> <span>Admin</span>
          </a>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->uri_string() == 'Admin') { echo 'active'; } ?>"><a href="<?=base_url('Admin')?>"><i class="fa fa-circle-o"></i> <span> Admin</span></a></li>
          </ul>
        </li> -->
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>