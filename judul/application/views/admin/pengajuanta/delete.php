<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $p->id_pengajuan ?>"><i class="fa fa-trash"></i> Delete</button>

<div class="modal fade" id="delete<?= $p->id_pengajuan ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header badge-primary">
        <h4 class="modal-title">Hapus Data pengajuan <strong><?= $p->nama_mahasiswa ?></strong> ?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Apakah Anda Yakin Ingin Menghapus ? </p>
      </div>
      <div class="modal-footer justify-content-between">
        <a href="<?= base_url('admin/pengajuanta/delete/' . $p->id_pengajuan) ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> Hapus </a>
        <button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>