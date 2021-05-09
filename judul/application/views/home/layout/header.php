<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
  <div class="container d-flex justify-content-between align-items-center">

    <div class="logo">
      <!-- <h1><a href="index.html">TA</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="<?= base_url('home') ?>"><img src="<?= base_url() ?>assets/image/logo.png" alt="" class="img-fluid"></a>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="active" href="<?= base_url('home') ?>">Home</a></li>
        <li><a href="<?= base_url('home/panduan') ?>">Buku Panduan TA</a></li>
        <li><a href="<?= base_url('home/hasil') ?>">Pengumuman</a></li>
        <li><a href="<?= base_url('home/contact') ?>">Contact</a></li>
        <li><a href="<?= base_url('login'); ?>"><b>LOGIN</b></a></li>
        <li><a href="<?= base_url('login/register'); ?>"><b>DAFTAR</b></a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->