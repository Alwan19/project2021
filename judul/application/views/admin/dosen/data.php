<div class="page-content fade-in-up">
  <div class="ibox-title">
    <h3><?= $title; ?></h3>
  </div>
  <div class="ibox">
    <div class="ibox-head">
      <a href="<?= base_url('admin/dosen/tambah') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah</a>
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
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Bidang Dosen</th>
            <th>Kontak</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $a = 1;
          foreach ($dosen as $dosen) : ?>
            <tr>
              <td><?= $a++; ?></td>
              <td><?= $dosen->nidn_dosen; ?></td>
              <td><?= $dosen->nama_dosen; ?></td>
              <td><?= $dosen->bidang_dosen; ?></td>
              <td><?= $dosen->kontak_dosen; ?></td>
              <td>
                <a href="<?= base_url('admin/dosen/edit/' . $dosen->id_dosen) ?>" class="btn btn-warning btn-sm" title="Edit Dosen"><i class="fa fa-edit"></i> Edit</a>

                <?php include 'delete.php'; ?>

              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>