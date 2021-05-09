<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail<?= $mhs->id_mahasiswa ?>">
  <i class="fa fa-eye"></i> Detail</button>
<div class="modal fade" id="detail<?= $mhs->id_mahasiswa ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header badge-primary">
        <h4 class="modal-title">Detail Data Mahasiswa <strong><?= $mhs->nama_mahasiswa ?></strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body text-center">
        <table class="table table-bordered table-striped">
          <tr>
            <th>Nim</th>
            <td><?= $mhs->nim ?></td>
          </tr>

          <tr>
            <th>Nama Mahasiswa</th>
            <td><?= $mhs->nama_mahasiswa ?></td>
          </tr>

          <tr>
            <th>Tempat Lahir</th>
            <td><?= $mhs->tempat_lahir ?></td>
          </tr>

          <tr>
            <th>Tanggal Lahir</th>
            <td><?= $mhs->tanggal_lahir ?></td>
          </tr>

          <tr>
            <th>Nomor Ponsel</th>
            <td><?= $mhs->nomor_ponsel ?></td>
          </tr>

          <tr>
            <th>Email</th>
            <td><?= $mhs->email ?></td>
          </tr>

          <tr>
            <th>Jenis Kelamin</th>
            <td><?= $mhs->jenis_kelamin ?></td>
          </tr>

          <tr>
            <th>Agama</th>
            <td><?= $mhs->agama ?></td>
          </tr>

          <tr>
            <th>Dosen PA</th>
            <td><?= $mhs->nama_dosen ?></td>
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