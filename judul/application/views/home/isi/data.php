<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">
  <div class="container">
    <div class="section-title">
      <h2>Tugas Akhir</h2>
      <p>Tugas Akhir adalah karya ilmiah yang disusun oleh mahasiswa setiap program studi berdasarkan hasil penelitian suatu masalah yang dilakukan secara seksama dengan bimbingan dosen pembimbing. Tugas akhir merupakan salah satu persyaratan kelulusan mahasiswa. Ketentuan-ketentuan mengenai tugas akhir diatur oleh masing-masing fakultas, dengan mengikuti standar universitas. Tugas akhir bagi mahasiswa program diploma III berbentuk paper atau proyek akhir.</p>
    </div>
  </div>
  <hr>
</section><!-- End Clients Section -->

<!-- ======= Featured Section ======= -->
<section id="featured" class="featured">
  <div class="container">

    <div class="section-title">
      <h2>Berita AMP</h2>
    </div>
    <div class="row">
      <?php foreach ($berita as $berita) { ?>
        <div class="col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <div style="text-align: center; padding-bottom: 5px;">
              <img style="text-align: center;" src="<?= base_url('assets/image/berita/' . $berita->gambar) ?>" width="250" height="150">
            </div>
            <h3><a href=""><?= $berita->judul_berita; ?></a></h3>
            <p class="text-justify"><?= word_limiter($berita->isi_berita, 50); ?></p>
            <div class="read-more">
              <p style="float: right;"><a style="background-color: #e96b56; color: white;" class="btn btn-default btn-sm" href="<?= base_url('home/readberita/' . $berita->slug_berita) ?>">Read More..</a></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <hr>
</section><!-- End Featured Section -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h2>Link AMP</h2>
    </div>
    <div class="row">
      <?php foreach ($link as $link) { ?>
        <div class="col-md-4 pt-4 pt-lg-0 content">
          <ul style="text-align:center ;">
            <li><i class="bi bi-check-circle"></i><a target="_blank" style="text-decoration: underline; font-size: 20px;" href="<?= $link->link; ?>"> <?= $link->nama_link; ?></a></li>
          </ul>
        </div>
      <?php } ?>
      <div class="read-more">
        <p style="text-align:center;"><a style="background-color: #e96b56; color: white;" class="btn btn-default btn-sm" href="<?= base_url('home/read/' . $berita->slug_berita) ?>">Link lainnya..</a></p>
      </div>
    </div>
  </div>
  <hr>
</section><!-- End About Section -->