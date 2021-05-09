<div class="page-content fade-in-up">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title"><?= $title; ?></div>
        </div>

        <?php
        //notifikasi jika ada input error

        echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');

        //open form
        if (isset($error)) {
          echo '<div class = "alert alert-warning">';
          echo $error;
          echo '</div>';
        }
        echo form_open_multipart(base_url('admin/dosen/edit/' . $dosen->id_dosen));
        ?>
        <div class="ibox-body">
          <div class="row">
            <div class="col-md-6" style="padding: 10px;">
              <div class="form-group">
                <label>NIDN</label>
                <input required type="text" class="form-control" name="nidn" placeholder="NIDN Dosen" value="<?= $dosen->nidn_dosen; ?>">
              </div>

              <div class="form-group">
                <label>Nama Dosen</label>
                <input required type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen" value="<?= $dosen->nama_dosen; ?>">
              </div>

            </div>

            <div class="col-md-6" style="padding: 10px;">

              <div class="form-group">
                <label>Bidang Dosen</label>
                <input required type="text" class="form-control" name="bidang_dosen" placeholder="Bidang Dosen" value="<?= $dosen->bidang_dosen; ?>">
              </div>

              <div class="form-group">
                <label>Kontak</label>
                <input required type="text" class="form-control" name="kontak" placeholder="Nomor Kontak" value="<?= $dosen->kontak_dosen; ?>">
              </div>

              <div class="form-group" style="padding-top: 20px;">
                <input type="submit" value="Simpan Data" name="simpan" id="submit" class="btn btn-info">
                <a href="<?= base_url('admin/dosen'); ?>" class="btn btn-secondary">Kembali</a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>