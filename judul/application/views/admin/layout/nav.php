<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
  <div id="sidebar-collapse">
    <div class="admin-block d-flex">
      <div>
        <img src="<?= base_url() ?>assets/admin/html/dist/assets/img/admin-avatar.png" width="45px" />
      </div>
      <div class="admin-info">
        <div class="font-strong"><?= $this->session->userdata('username'); ?></div><small><?= $this->session->userdata('akses_level'); ?></small>
      </div>
    </div>
    <ul class="side-menu metismenu">
      <li>
        <a class="active" href="<?= base_url('admin/dashboard') ?>"><i class=" sidebar-item-icon fa fa-th-large"></i>
          <span class="nav-label">Dashboard</span>
        </a>
      </li>
      <li class="heading">Master</li>
      <li>
        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
          <span class="nav-label">Master Data</span><i class="fa fa-angle-left arrow"></i></a>
        <ul class="nav-2-level collapse">
          <?php
          $user = "<li>
              <a href=" . base_url('admin/user') . "><i class='sidebar-item-icon fa fa-user'></i><span class='nav-label'>Data Users</span></a>
            </li>";

          $dosen = "<li>
            <a href=" . base_url('admin/dosen') . "><i class='sidebar-item-icon fa fa-mortar-board'></i><span class='nav-label'>Data Dosen</span></a>
            </li>";

          $mhs = "<li>
              <a href=" . base_url('admin/mahasiswa') . "><i class='sidebar-item-icon fa fa-male'></i><span class='nav-label'>Data Mahasiswa</span></a>
            </li>";

          if ($this->session->userdata('akses_level') == 'Admin') {
            echo $user, $dosen, $mhs;
          } elseif ($this->session->userdata('akses_level') == 'Kaprodi') {
            echo $dosen, $mhs;
          } elseif ($this->session->userdata('akses_level') == 'Mahasiswa') {
            echo $mhs;
          }
          ?>
        </ul>
      </li>
      <li>
        <a href="<?= base_url('admin/pengajuanta') ?>"><i class="sidebar-item-icon fa fa-book"></i><span class="nav-label">Pengajuan TA</span></a>
      </li>
      <?php if ($this->session->userdata('akses_level') == 'Admin') { ?>
        <li>
          <a href="javascript:;"><i class="sidebar-item-icon fa fa-tag"></i>
            <span class="nav-label">Tabel Referensi</span><i class="fa fa-angle-left arrow"></i></a>
          <ul class="nav-2-level collapse">
            <li>
              <a href="<?= base_url('admin/berita') ?>"><i class="sidebar-item-icon fa fa-check"></i><span class="nav-label">Data Berita</span></a>
            </li>
            <li>
              <a href="<?= base_url('admin/link') ?>"><i class="sidebar-item-icon fa fa-check"></i><span class="nav-label">Data Link</span></a>
            </li>
          </ul>
        </li>
      <?php } ?>
      <?php
      $laporan = "<a href=" . base_url('admin/laporan') . "><i class='sidebar-item-icon fa fa-file'></i><span class='nav-label'>Laporan</span></a>";
      ?>
      <li>
        <?php if ($this->session->userdata('akses_level') == 'Admin') {
          echo $laporan;
        } else if ($this->session->userdata('akses_level') == 'Kaprodi') {
          echo $laporan;
        } ?>
      </li>
      <li>
    </ul>
  </div>
</nav>
<!-- END SIDEBAR-->
<div class="content-wrapper">
  <!-- START PAGE CONTENT-->