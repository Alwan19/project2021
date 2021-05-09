<div class="page-content fade-in-up">
  <div class="ibox-title">
    <h3><?= $title; ?></h3>
  </div>
  <div class="ibox">
    <?php
    //Notifikasi
    if ($this->session->flashdata('sukses')) {
      echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }

    echo validation_errors('<div class="alert alert-danger"><i class="fa fa-times"></i>', '</div>');

    if (isset($error)) {
      echo '<div class="alert alert-danger">';
      echo $error;
      echo '</div>';
    }
    ?>
    <form action="<?= base_url('admin/laporan') ?>" method="POST">
      <div class="row" style="padding-left: 20px; padding-top: 20px;">
        <div class="col-md-12">
          <div class="form-group row">
            <div class="col-md-2">
              <label>Tanggal Awal</label>
              <input type="date" class="form-control" value="<?= set_value('tgl_awal'); ?>" name="tgl_awal" placeholder="Tanggal Awal">
            </div>
            <div class="col-md-2">
              <label>Tanggal Akhir</label>
              <input type="date" class="form-control" value="<?= set_value('tgl_akhir'); ?>" name="tgl_akhir" placeholder="Tanggal Akhir">
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="padding-left: 20px; padding-top: 20px;">
        <div class="col-md-6">
          <div class="form-group row">
            <div class="col-md-2">
              <button class="btn btn-primary" name="filter" id="filter"><i class="fa fa-search"></i> Filter</button>
            </div>
            <div class="col-md-2">
              <button class="btn btn-danger" name="cetak" id="cetak" target="_blank"><i class="fa fa-files-o"></i> Cetak PDF</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="ibox-body">
      <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No. </th>
            <th>NIM - Nama</th>
            <th>Judul TA</th>
            <th>Pembimbing 1</th>
            <th>Pembimbing 2</th>
            <th>Status</th>
            <th>Tanggal ACC</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $a = 1;
          foreach ($laporan as $l) {

            echo "<tr>
              <td>" . $a++ . "</td>
              <td>" . $l->nim . " - " . $l->nama_mahasiswa . "</td>
              <td>" . $l->judul_ta . "</td>
              <td>" . $l->pembimbing1 . "</td>
              <td>" . $l->pembimbing2 . "</td>
              <td>" . $l->status . "</td>
              <td>" . $l->tgl_acc . "</td>
            </tr>";
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>