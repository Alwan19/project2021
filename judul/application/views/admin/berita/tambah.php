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
        echo form_open_multipart(base_url('admin/berita/tambah'));
        ?>
        <div class="ibox-body">
          <div class="row">
            <div class="col-md-6" style="padding: 10px;">

              <div class="form-group">
                <label for="judul_berita">Judul Berita</label>
                <input type="text" class="form-control" name="judul_berita" id="judul_berita" placeholder="Judul Berita" value="<?= set_value('judul_berita'); ?>" required>
              </div>

              <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" id="isi" cols="20" rows="4" class="form-control"><?= set_value('isi'); ?></textarea>
              </div>

            </div>

            <div class="col-md-6" style="padding: 10px;">

              <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Gambar" value="<?= set_value('gambar'); ?>">
              </div>

              <div class="form-group">
                <label for="status_berita">Status Berita</label>
                <select class="form-control" name="status_berita" id="status_berita">
                  <option>-- Pilih Status Berita --</option>
                  <option <?php if (set_value('status_berita') == 'Publish') echo 'selected' ?>>Publish</option>
                  <option <?php if (set_value('status_berita') == 'Tidak Publish') echo 'selected' ?>>Tidak Publish</option>
                </select>
              </div>

              <div class="form-group">
                <label for="jenis_berita">Jenis Berita</label>
                <select class="form-control" name="jenis_berita" id="jenis_berita">
                  <option>-- Pilih Jenis Berita --</option>
                  <option <?php if (set_value('jenis_berita') == 'Berita') echo 'selected' ?>>Berita</option>
                  <option <?php if (set_value('jenis_berita') == 'Slider') echo 'selected' ?>>Slider</option>
                </select>
              </div>

              <div class="form-group" style="padding-top: 20px;">
                <input type="submit" value="Simpan Data" name="simpan" id="submit" class="btn btn-info">
                <a href="<?= base_url('admin/berita'); ?>" class="btn btn-secondary">Kembali</a>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>