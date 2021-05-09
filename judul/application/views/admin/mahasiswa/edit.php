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

echo form_open_multipart(base_url('admin/mahasiswa/edit/'.$mhs->id_mahasiswa));

?>


        <div class="ibox-body">
          <div class="row">
            <div class="col-md-6" style="padding: 10px;">
              <div class="form-group">
                <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                <input required type="text" class="form-control" name="nim" placeholder="NIM" value="<?= $mhs->nim; ?>">
              </div>
              <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input required type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" value="<?= $mhs->nama_mahasiswa; ?>">
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input required type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $mhs->tempat_lahir; ?>">
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" value="<?= $mhs->tanggal_lahir; ?>">
              </div>
              <div class="form-group">
                <label>Nomor Ponsel</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" name="no_hp" class="form-control" required placeholder="Nomor Ponsel" value="<?= $mhs->nomor_ponsel; ?>">
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" name="email" class="form-control" required placeholder="Email" value="<?= $mhs->email; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-6" style="padding: 10px;">
             <div class="form-group">
              <label>jenis kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                  <option>--- Pilih Jenis Kelamin ---</option>
                  <option <?php if ($mhs->jenis_kelamin == 'Laki-laki') {echo 'selected';} ?>>Laki-laki</option>
                  <option <?php if ($mhs->jenis_kelamin == 'Perempuan') {echo 'selected';} ?>>Perempuan</option>
                </select>
              </div>

              <label>agama</label>
               <div class="form-group">
                <select class="form-control" name="agama" id="agama" required>
                  <option>--- Pilih Agama ---</option>
                  <option <?php if ($mhs->agama == 'Islam') {echo 'selected';} ?>>Islam</option>
                  <option <?php if ($mhs->agama == 'Kristen') {echo 'selected';} ?>>Kristen</option>
                  <option <?php if ($mhs->agama == 'Hindu') {echo 'selected';} ?>>Hindu</option>
                  <option <?php if ($mhs->agama == 'Budha') {echo 'selected';} ?>>Budha</option>
                  <option <?php if ($mhs->agama == 'Konghucu') {echo 'selected';} ?>>Konghucu</option>
                </select>
              </div>
              
              <div class="form-group">
                <label>Dosen PA</label>
                <select name="id_dosen" class="form-control">
                  <option value="">--Pilih Dosen PA--</option>
                  <?php foreach ($dosen as $dosen) {
                   ?>
                  <option value="<?=$dosen->id_dosen ?>" <?php if($dosen->id_dosen==$mhs->id_dosen){echo 'selected';} ?>><?=$dosen->nama_dosen ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input required type="password" class="form-control" name="password" placeholder="Masukan Password" value="<?= $mhs->password; ?>">
              </div>
              <div class="form-group">
                <label>Ulangi Password</label>
                <input required type="password" class="form-control" name="ulangi_password" placeholder="Ulangi Password" value="<?= $mhs->password; ?>">
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-secondary btn-flat" onClick="history.back();">Kembali</button>
              </div>
            </div><!-- /.box-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>