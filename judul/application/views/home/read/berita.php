<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="">Home</a></li>
      <li>Berita</li>
    </ol>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <?php foreach ($berita as $berita) { ?>
        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <div class="entry-img">
              <p style="text-align: center;"><img src="<?= base_url('assets/image/berita/' . $berita->gambar) ?>" alt="" class="img-fluid"></p>
            </div>

            <h2 class="entry-title">
              <?= $berita->judul_berita; ?>
            </h2>

            <div class="entry-content">
              <p><?= $berita->isi_berita ?></p>

            </div>

          </article><!-- End blog entry -->

        </div><!-- End blog entries list -->
      <?php } ?>

      <div class="col-lg-4">

        <div class="sidebar">

          <h3 class="sidebar-title">Berita Lain</h3>
          <?php foreach ($berita_lain as $berita_lain) { ?>
            <div class="sidebar-item recent-posts">
              <div class="post-item clearfix">
                <li><a href="<?= base_url('home/readslider/' . $berita_lain->slug_berita); ?>"><?= $berita_lain->judul_berita; ?></a></li>
              </div>

            </div><!-- End sidebar recent posts-->
          <?php } ?>

        </div><!-- End sidebar -->

      </div><!-- End blog sidebar -->

    </div>

  </div>
</section><!-- End Blog Single Section -->