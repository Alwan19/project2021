<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>AMIK Mahaputra Riau</h4>
          <img src="<?= base_url('assets/image/logoamp.png') ?>" alt="Logo AMP" width="180">
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Keahlian</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-contact">
          <h4>Contact Us</h4>
          <p>
            Jl. H.R. Subrantas No. 77 <br>
            Panam, Pekanbaru<br>
            Riau <br><br>
            <strong>Phone:</strong> - <br>
            <strong>Email:</strong> - <br>
          </p>

        </div>

        <div class="col-lg-3 col-md-6 footer-info">
          <h3>Profil AMP</h3>
          <p>AMIK Mahaputra Riau merupakan Perguruan Tinggi yang dikelola oleh Yayasan Dharma Bakti Mahaputera Indonesia berdiri sejak tahun 2002 dengan Surat Keputusan MENDIKNAS Nomor 156/D/O/2002. AMIK Mahaputra Riau mempunyai satu program studi yaitu Manajemen Informatika (MI) dengan jenjang Diploma-III (D3).</p>
          <div class="social-links mt-3">
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>Eterna</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="<?= base_url() ?>assets/admin/html/dist/assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>


<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/eterna/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/eterna/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/eterna/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/eterna/assets/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url() ?>assets/eterna/assets/vendor/purecounter/purecounter.js"></script>
<script src="<?= base_url() ?>assets/eterna/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/eterna/assets/vendor/waypoints/noframework.waypoints.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/eterna/assets/js/main.js"></script>

<script type="text/javascript">
  $(function() {
    $('#example-table').DataTable({
      pageLength: 10,
      //"ajax": './assets/demo/data/table_data.json',
      /*"columns": [
          { "data": "name" },
          { "data": "office" },
          { "data": "extn" },
          { "data": "start_date" },
          { "data": "salary" }
      ]*/
    });
  })
</script>

</body>

</html>