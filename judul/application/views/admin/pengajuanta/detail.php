<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail<?= $p->id_pengajuan ?>">
  <i class="fa fa-eye"></i> Detail</button>
<div class="modal fade" id="detail<?= $p->id_pengajuan ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header badge-primary">
        <h4 class="modal-title">Detail Data pengajuan <strong><?= $p->nama_mahasiswa ?></strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body text-center">
        <table class="table table-bordered table-striped">
          <tr>
            <th>NIM - Nama Mahasiswa</th>
            <td><?= $p->nim; ?> - <?= $p->nama_mahasiswa; ?></td>
          </tr>

          <tr>
            <th>Bidang TA</th>
            <td><?= $p->bidang_ta; ?></td>
          </tr>

          <tr>
            <th>Judul TA</th>
            <td><?= $p->judul_ta; ?></td>
          </tr>

          <tr>
            <th>Alasan</th>
            <td><?= $p->alasan; ?></td>
          </tr>

          <tr>
            <th>Status</th>
            <td><?= $p->status; ?></td>
          </tr>

          <tr>
            <th>Pembimbing 1</th>
            <td><?= $p->pembimbing1; ?></td>
          </tr>

          <tr>
            <th>Pembimbing 2</th>
            <td><?= $p->pembimbing2; ?></td>
          </tr>

          <tr>
            <th>Kwitansi TA</th>
            <td><a href="<?= base_url('admin/pengajuanta/kwitansi/' . $p->id_pengajuan) ?>" class="btn btn-success btn-sm" title="Unduh File" target="_blank"><i class="fa fa-download"></i> Unduh Kwitansi</a></td>
          </tr>

          <tr>
            <th>KRS Semester 6</th>
            <td><a href="<?= base_url('admin/pengajuanta/krs/' . $p->id_pengajuan) ?>" class="btn btn-success btn-sm" title="Unduh File" target="_blank"><i class="fa fa-download"></i> Unduh KRS</a></td>
          </tr>

        </table>

        <div class="model-footer justify-content-between">
          <button type="button" name="close" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        </div>

      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>