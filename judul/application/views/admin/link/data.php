<div class="page-content fade-in-up">
  <div class="ibox-title">
    <h3><?= $title; ?></h3>
  </div>
  <div class="ibox">
    <div class="ibox-head">
      <a href="<?= base_url('admin/link/tambah') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data</a>
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
            <th>Nama Link</th>
            <th>Link</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $a = 1;
          foreach ($link as $link) : ?>
            <tr>
              <td><?= $a++; ?></td>
              <td><?= $link->nama_link; ?></td>
              <td><?= $link->link; ?></td>
              <td>
                <a href="<?= base_url('admin/link/edit/' . $link->id_link) ?>" class="btn btn-warning btn-sm" title="Edit Link"><i class="fa fa-edit"></i> Edit</a>

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