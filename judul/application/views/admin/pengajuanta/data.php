<div class="page-content fade-in-up">
  <div class="ibox-title">
    <h3><?= $title; ?></h3>
  </div>
  <div class="ibox">
    <div class="ibox-head">
      <a href="<?= base_url('admin/pengajuanta/tambah') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data</a>
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
            <th>NIM - Nama</th>
            <th>Judul TA</th>
            <th>Status</th>
            <th>Pembimbing 1</th>
            <th>Pembimbing 2</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $a = 1;
          foreach ($pengajuan as $p) {

            echo "<tr>
              <td>" . $a++ . "</td>
              <td>" . $p->nim . " - " . $p->nama_mahasiswa . "</td>
              <td>" . $p->judul_ta . "</td>
              <td>" . $p->status . "</td>";
            if ($p->pembimbing1 == '--Pilih Pembimbing--') {
              echo "<td>-</td>";
            } else {
              echo "<td>" . $p->pembimbing1 . "</td>";
            }
            if ($p->pembimbing2 == '--Pilih Pembimbing--') {
              echo "<td>-</td>";
            } else {
              echo "<td>" . $p->pembimbing2 . "</td>";
            }
            echo "
              <td>
                <a href=" . base_url('admin/pengajuanta/edit/' . $p->id_pengajuan) . " style='margin-right: 4px;' class='btn btn-warning btn-sm' title='Edit Dosen'><i class='fa fa-edit'></i> Edit</a>";
            include 'delete.php';
            include 'detail.php';

            echo "</td>
            </tr>";
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>