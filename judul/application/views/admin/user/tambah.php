<div class="page-content fade-in-up">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title"><?= $title; ?></div>
        </div>
        <?php
        echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');
        if (isset($error)) {
          echo '<div class="alert alert-warning">';
          echo $error;
          echo '</div>';
        }

        echo form_open_multipart(base_url('admin/user/tambah'));

        ?>
        <div class="ibox-body">
          <div class="row">
            <div class="col-md-6" style="padding: 10px;">


              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>" required>
              </div>


              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>" required>
              </div>

              <div class="form-group">
                <label for="password">Ulangi Password</label>
                <input type="password" name="ulangi_password" id="password" class="form-control" placeholder="Ulangi Password" value="<?= set_value('ulangi_password'); ?>" required>
              </div>

            </div>

            <div class="col-md-6" style="padding: 10px;">

              <div class="form-group">
                <label for="akses_level">Level Hak Aksi</label>
                <select class="form-control" name="akses_level" id="akses_level" required>
                  <option>--- Pilih Hak Aksi ---</option>
                  <option <?php if (set_value('akses_level') == 'Admin') {
                            echo 'selected';
                          } ?>>Admin</option>
                  <option <?php if (set_value('akses_level') == 'Kaprodi') {
                            echo 'selected';
                          } ?>>Kaprodi</option>
                </select>
              </div>

              <div class="form-group" style="padding-top: 20px;">
                <input type="submit" value="Simpan Data" name="simpan" id="submit" class="btn btn-info">
                <a href="<?= base_url('admin/user'); ?>" class="btn btn-secondary">Kembali</a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>