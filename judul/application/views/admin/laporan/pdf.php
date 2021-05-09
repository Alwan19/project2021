<!DOCTYPE html>
<html>

<head>
  <title>Pengajuan TA | <?= $title ?></title>
  <link href="<?= base_url() ?>assets/image/logoamp.png" rel="icon">
</head>

<body>

  <h2 style="text-align: center;"><?= $title; ?></h2>
  </hr>

  <table border="1" cellpadding="5" cellspacing="0">

    <tr>
      <th>No. </th>
      <th>NIM - Nama Mahasiswa</th>
      <th>Judul TA</th>
      <th>Pembimbing 1</th>
      <th>Pembimbing 2</th>
      <th>Status</th>
      <th>Tanggal ACC</th>
    </tr>

    <?php $a = 1;
    foreach ($laporan as $l) { ?>
      <tr>
        <td><?= $a++ ?></td>
        <td><?= $l->nim ?> - <?= $l->nama_mahasiswa ?></td>
        <td><?= $l->judul_ta ?></td>
        <td><?= $l->pembimbing1 ?></td>
        <td><?= $l->pembimbing2 ?></td>
        <td><?= $l->status ?></td>
        <td><?= $l->tgl_acc ?></td>
      </tr>
    <?php } ?>

  </table>

</body>

</html>