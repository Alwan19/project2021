<div class="page-content fade-in-up">
  <div class="ibox-title">
    <h3><?= $title; ?></h3>
  </div>
  <div class="ibox">
    <?php if ($this->session->userdata('akses_level') == 'Admin') { ?>
      <div class="ibox-head">
        <a href="<?= base_url('admin/mahasiswa/tambah') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data</a>
      </div>
    <?php } ?>

    <?php
    //Notifikasi
    if ($this->session->flashdata('sukses')) {
      echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }
    ?>
    <div class="ibox-body">
      <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No. </th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($this->session->userdata('akses_level') == 'Mahasiswa') {
            $a = 1;
            echo "<tr>
            <td>" . $a++ . "</td>
            <td>" . $mhs->nim . "</td>
            <td>" . $mhs->nama_mahasiswa . "</td>
            <td>" . $mhs->jenis_kelamin . "</td>
            <td>
              <a style='margin-right: 4px;' href=" . base_url('admin/mahasiswa/edit/' . $mhs->id_mahasiswa) . " title='Edit Mahasiswa' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i></a>";

            include 'detail.php';
            if ($this->session->userdata('akses_level') == 'Admin') {
              include 'delete.php';
            }
            echo "</td>
          </tr>";
          } else {
            $a = 1;
            foreach ($mhs as $mhs) {
              echo "<tr>
            <td>" . $a++ . "</td>
            <td>" . $mhs->nim . "</td>
            <td>" . $mhs->nama_mahasiswa . "</td>
            <td>" . $mhs->jenis_kelamin . "</td>
            <td>
              <a style='margin-right: 4px;' href=" . base_url('admin/mahasiswa/edit/' . $mhs->id_mahasiswa) . " title='Edit Mahasiswa' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i> Edit</a>";
              include 'detail.php';
              if ($this->session->userdata('akses_level') == 'Admin') {
                include 'delete.php';
              }

              echo "</td>
          </tr>";
            }
          }
          ?>



        </tbody>
      </table>
    </div>
  </div>
  <div>
  </div>
</div>