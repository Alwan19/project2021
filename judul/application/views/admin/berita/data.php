<div class="page-content fade-in-up">
  <div class="ibox-title">
    <h3><?= $title; ?></h3>
  </div>
  <div class="ibox">
    <div class="ibox-head">
      <a href="<?= base_url('admin/berita/tambah') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data</a>
    </div>

    <?php
    //Notifikasi
    if ($this->session->flashdata('sukses')) {
      echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }
    ?>

    <div class="ibox-body">
      <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No. </th>
            <th>Judul Berita</th>
            <th>Isi Berita</th>
            <th>Jenis Berita</th>
            <th>Gambar</th>
            <th>Publish</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $a = 1;
          foreach ($berita as $berita) : ?>
            <tr>
              <td><?= $a++; ?></td>
              <td><?= $berita->judul_berita; ?></td>
              <td><?= $berita->isi_berita; ?></td>
              <td><?= $berita->jenis_berita; ?></td>
              <td class="text-center">
                <?php if ($berita->gambar != null) { ?>
                  <a href="<?= base_url('assets/image/berita/' . $berita->gambar) ?>" target="_blank"><img src="<?= base_url('assets/image/berita/' . $berita->gambar) ?>" class="img img-thumbnail" width="70" height="100"></a>
                <?php } else {
                  echo "Tidak Ada Gambar";
                }  ?>
              </td>
              <td><?= $berita->status_berita; ?></td>
              <td>
                <a href="<?= base_url('admin/berita/edit/' . $berita->id_berita) ?>" class="btn btn-warning btn-sm" title="Edit berita"><i class="fa fa-edit"></i> Edit</a>

                <?php include 'delete.php'; ?>

              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
  <div>
  </div>
</div>