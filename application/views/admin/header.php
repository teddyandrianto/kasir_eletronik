<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kasir | Elektronik</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/landing/img/lOGO_KE.png') ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin')?>/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url('assets/admin')?>/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin')?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin')?>/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin')?>/css/skins-admin.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin')?>/datatable/css/jquery.dataTables.min.css">
  
  <script src="<?php echo base_url('assets/admin')?>/js/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url('assets/admin')?>/js/app.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?php echo base_url('admin')?>" class="logo">
      <span class="logo-mini"><b>K</b>E</span>
      <span class="logo-lg"><b>Kasir </b>Elektronik</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo base_url('assets/admin/profile/not-profile-admin.png') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Nama admin</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url('assets/admin/profile/not-profile-admin.png') ?>" class="img-circle" alt="User Image">
                <p>
                  Nama Admin - Admin 
                  <small>admin@gmail.com</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="http://localhost/tka1/admin/setting" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="http://localhost/tka1/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url('assets');?>/admin/profile/not-profile-admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nama </p>
          <a href="<?php echo base_url('admin/setting') ?>"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
        <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <li>
          <a href="<?php echo base_url('admin/index') ?>">
            <i class="fa fa-dashboard"></i> <span>Data Barang</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url('admin/transaksi_tabungan') ?>">
            <i class="fa fa-cog"></i> <span>Profil</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url('admin/user') ?>">
            <i class="fa fa-users"></i> <span>Pegawai</span>
          </a>
        </li>
      </ul>

    </section>
  </aside>

   <?=$this->session->flashdata('pesan')?>   