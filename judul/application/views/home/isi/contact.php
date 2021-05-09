<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="<?= base_url('home') ?>">Home</a></li>
      <li><?= $title; ?></li>
    </ol>
    <h2><?= $title; ?></h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="row">
      <div class="col-lg-6">
        <div class="info-box mb-4">
          <i class="bx bx-map"></i>
          <h3>Alamat</h3>
          <p>Jl. H.R. Subrantas No. 77, Panam, Pekanbaru - Riau.</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="info-box  mb-4">
          <i class="bx bx-envelope"></i>
          <h3>Email</h3>
          <p>-</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="info-box  mb-4">
          <i class="bx bx-phone-call"></i>
          <h3>Call</h3>
          <p>-</p>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-6 ">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6875893731935!2d101.38041671409412!3d0.4638221639120793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a85c1dae88fd%3A0x99902f8f3c812e06!2sAMIK%20Mahaputra%20Riau!5e0!3m2!1sid!2sid!4v1619940566377!5m2!1sid!2sid" style="border:0; width: 100%; height: 380px;" allowfullscreen="" loading="lazy"></iframe>
        <!-- <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/place/AMIK+Mahaputra+Riau/@0.4638222,101.3804167,17z/data=!3m1!4b1!4m5!3m4!1s0x31d5a85c1dae88fd:0x99902f8f3c812e06!8m2!3d0.4638168!4d101.3826054?hl=id" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> -->
      </div>

      <div class="col-lg-6">
        <form action="<?= base_url() ?>assets/eterna/forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Pesan anda telah terkirim. Terima kasih!!</div>
          </div>
          <div class="text-center"><button type="submit">Kirim Pesan</button></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->