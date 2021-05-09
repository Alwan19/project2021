<div class="page-content fade-in-up">
  <div class="ibox-title">
    <h3><?= $title; ?></h3>
  </div>
  <div class="ibox">
    <div class="ibox-head">
      <a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data</a>
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
            <th>Nama</th>
            <th>Username</th>
            <th>Akses Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $a = 1;
          foreach ($user as $user) {
          ?>
            <tr>
              <td><?= $a++; ?></td>
              <td><?= $user->nama; ?></td>
              <td><?= $user->username; ?></td>
              <td><?= $user->akses_level; ?></td>
              <td>
                <a href="<?= base_url('admin/user/edit/' . $user->id_user); ?>" title="Edit User" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>

                <?php include 'delete.php'; ?>

              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div>
  </div>
</div>