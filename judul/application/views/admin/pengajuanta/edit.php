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
        echo form_open_multipart(base_url('admin/pengajuanta/edit/' . $pengajuan->id_pengajuan));
        ?>

        <style>
          label {
            font-weight: bold;
          }
        </style>

        <div class="ibox-body">
          <div class="row">
            <div class="col-md-6" style="padding: 10px;">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Mahasiswa</label>
                <select name="id_mahasiswa" required class="form-control" disabled>
                  <?php if ($this->session->userdata('akses_level') == 'Mahasiswa') {
                    echo "<option value=" . $mhs->id_mahasiswa . ">" . $mhs->nim . " - " . $mhs->nama_mahasiswa . "</option>";
                  } else {
                    foreach ($mhs as $mhs) {
                      echo "<option value=" . $mhs->id_mahasiswa . ">" . $mhs->nim . " - " . $mhs->nama_mahasiswa . "</option>";
                    }
                  } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="bidang_ta">Bidang TA</label>
                <select name="bidang_ta" id="bidang_ta" class="form-control" required>
                  <option value="">-- Pilih Bidang TA --</option>
                  <option <?php if ($pengajuan->bidang_ta == 'Android') {
                            echo 'selected';
                          } ?>>Android</option>
                  <option <?php if ($pengajuan->bidang_ta == 'Jaringan') {
                            echo 'selected';
                          } ?>>Jaringan</option>
                  <option <?php if ($pengajuan->bidang_ta == 'WEB') {
                            echo 'selected';
                          } ?>>WEB</option>
                </select>
              </div>

              <div class="form-group">
                <label for="judul_ta">Judul TA</label>
                <input required type="text" value="<?= $pengajuan->judul_ta; ?>" class="form-control" name="judul_ta" placeholder="Judul Tugas Akhir">
              </div>

              <div class="form-group">
                <label for="alasan">Alasan</label>
                <textarea name="alasan" class="form-control" id="alasan" cols="30" rows="4"><?= $pengajuan->alasan; ?></textarea>
              </div>
              <?php if ($this->session->userdata('akses_level') == 'Mahasiswa') { ?>
            </div>
          <?php } ?>

          <?php if ($this->session->userdata('akses_level') == 'Mahasiswa') { ?>
            <div class="col-md-6" style="padding: 10px;">
            <?php } ?>
            <div class="form-group">
              <label for="kwitansi_ta">Kwitansi Pembayaran Bimbingan TA</label></br>
              <span>File harus berekstensi <b>JPG / JPEG</b>dan Besar File maksimal <b>2mb</b><br>File sebelumnya : <a href="<?= base_url('assets/kwitansi/' . $pengajuan->kwitansi_ta); ?>" target="_blank"><?= $pengajuan->kwitansi_ta; ?></a></span>
              <input type="file" class="form-control" name="kwitansi_ta" value="" id="kwitansi_ta">
            </div>

            <div class="form-group">
              <label for="krs">Kartu Rencana Studi Semester 6 (KRS)</label></br>
              <span>File harus berekstensi <b>JPG / JPEG</b> dan Besar File maksimal <b>2mb</b><br>File sebelumnya : <a href="<?= base_url('assets/krs/' . $pengajuan->krs); ?>" target="_blank"><?= $pengajuan->krs; ?></a></span>
              <input type="file" class="form-control" value="" id="krs" name="krs">
            </div>

            <?php if ($this->session->userdata('akses_level') == 'Mahasiswa') {
            } else {
              echo "</div>";
            }
            ?>
            <?php if ($this->session->userdata('akses_level') == 'Mahasiswa') {
            } else { ?>
              <div class="col-md-6" style="padding: 10px;">
              <?php } ?>

              <?php if ($this->session->userdata('akses_level') == 'Mahasiswa') {
              } else { ?>
                <div class="form-group">
                  <label for="pembimbing1">Pembimbing 1</label>
                  <select name="pembimbing1" required class="form-control">
                    <option>--Pilih Pembimbing--</option>
                    <?php foreach ($dosen as $dosen) { ?>
                      <option value="<?= $dosen->nama_dosen; ?>" <?php if ($dosen->nama_dosen == $pengajuan->pembimbing1) {
                                                                    echo 'selected';
                                                                  } ?>><?= $dosen->nama_dosen; ?> - <?= $dosen->bidang_dosen; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="pembimbing2">Pembimbing 2</label>
                  <select name="pembimbing2" required class="form-control">
                    <option>--Pilih Pembimbing--</option>
                    <?php foreach ($dosenn as $d) { ?>
                      <option value="<?= $d->nama_dosen; ?>" <?php if ($d->nama_dosen == $pengajuan->pembimbing2) {
                                                                echo 'selected';
                                                              } ?>><?= $d->nama_dosen; ?> - <?= $d->bidang_dosen; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" id="status" required>
                    <option>--- Pilih Status ---</option>
                    <option <?php if ($pengajuan->status == 'Diterima') echo 'selected'; ?>>Diterima</option>
                    <option <?php if ($pengajuan->status == 'Revisi') echo 'selected'; ?>>Revisi</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="4"><?= $pengajuan->keterangan; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="tgl_acc">Tanggal</label>
                  <input name="tgl_acc" class="form-control" id="tgl_acc" value="<?= date('Y-m-d'); ?>">
                </div>
              <?php } ?>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-warning btn-flat" onClick="history.back();">Batalkan</button>
              </div>
              <?php if ($this->session->userdata('akses_level') ==  'Mahasiswa') {
              } else { ?>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>