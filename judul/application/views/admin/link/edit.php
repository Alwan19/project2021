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
        echo form_open_multipart(base_url('admin/link/edit/' . $link->id_link));
        ?>
        <div class="ibox-body">
          <div class="row">
            <div class="col-md-6" style="padding: 10px;">
              <div class="form-group">
                <label for="nama_link">Nama Link</label>
                <input type="text" class="form-control" name="nama_link" id="nama_link" placeholder="Nama Link" value="<?= $link->nama_link; ?>" required>
              </div>

              <div class="form-group">
                <label for="link">URL</label>
                <textarea class="form-control" placeholder="URL" name="link" id="link" cols="30" rows="4"><?= $link->link; ?></textarea>
              </div>

              <div class="form-group" style="padding-top: 20px;">
                <input type="submit" value="Simpan Data" name="simpan" id="submit" class="btn btn-info">
                <a href="<?= base_url('admin/link'); ?>" class="btn btn-secondary">Kembali</a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>