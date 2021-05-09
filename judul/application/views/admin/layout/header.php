<?php
$id_user  = $this->session->userdata('id_user');
$user_aktif  = $this->user_model->detail($id_user);
?>

<!-- START HEADER-->
<header class="header">
  <div class="page-brand">
    <a class="link" href="<?= base_url('admin/dashboard') ?>">
      <span class="brand">Pengajuan
        <span class="brand-tip">TA</span>
      </span>
      <span class="brand-mini">TA</span>
    </a>
  </div>
  <div class="flexbox flex-1">
    <!-- START TOP-LEFT TOOLBAR-->
    <ul class="nav navbar-toolbar">
      <li>
        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
      </li>
      <li>
        <form class="navbar-search" action="javascript:;">
          <div class="rel">
            <span class="search-icon"><i class="ti-search"></i></span>
            <input class="form-control" placeholder="Search here...">
          </div>
        </form>
      </li>
    </ul>
    <!-- END TOP-LEFT TOOLBAR-->
    <!-- START TOP-RIGHT TOOLBAR-->
    <ul class="nav navbar-toolbar">
      <li class="dropdown dropdown-user">
        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
          <img src="<?= base_url() ?>assets/admin/html/dist/assets/img/admin-avatar.png" />
          <span></span><?= $this->session->userdata('nama'); ?><i class="fa fa-angle-down m-l-5"></i></a>
        <ul class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a>
          <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>
          <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>
          <li class="dropdown-divider"></li>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-power-off"></i>Logout</a>
        </ul>
      </li>
    </ul>
    <!-- END TOP-RIGHT TOOLBAR-->
  </div>
</header>
<!-- END HEADER-->