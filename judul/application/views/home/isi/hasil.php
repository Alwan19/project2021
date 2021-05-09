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

<!-- ======= Table Section ======= -->
<section id="about" class="about">
  <div class="container">

    <!-- <form action="<?= base_url('home/keyword') ?>" method="post" accept-charset="utf-8">
      <label>Masukkan NIM</label>
      <div class="col-md-6" style="padding-bottom: 20px;">
        <input type="text" name="keyword" size="10px" placeholder="Cari" style="width: 50%; font-size: 1rem;">
        <input type="submit" name="submit" value="Cari" class="btn btn-primary">
      </div>
    </form> -->


    <div class="row">
      <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
          <thead>
            <tr class="text-center">
              <th>No. </th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Judul</th>
              <th>Pembimbing 1</th>
              <th>Pembimbing 2</th>
            </tr>
          </thead>
          <tbody>
            <?php $a = 1;
            foreach ($pengajuan as $pengajuan) {
            ?>
              <tr>
                <td><?= $a++; ?></td>
                <td><?= $pengajuan->nim ?></td>
                <td><?= $pengajuan->nama_mahasiswa ?></td>
                <td><?= $pengajuan->judul_ta ?></td>
                <td><?= $pengajuan->pembimbing1 ?></td>
                <td><?= $pengajuan->pembimbing2 ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section><!-- End About Section -->