<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
    <br>
  <a href="<?php echo base_url('versiborang/formtambah'); ?>">Tambah Data</a>
  <table>
    <thead>
      <tr>
        <td>Id Versi</td>
        <td>Nama Borang</td>
        <td>Nama Versi</td>
        <td>Tahun Terbit Borang</td>
      </tr>
    </thead>

    <tbody>
      <?php 
        foreach ($lihat_borang as $items) {
          ?>
          <tr>
            <td><?php echo $items->id_versi; ?></td>
            <td><?php echo $items->nama_borang; ?></td>
            <td><?php echo $items->nama_versi; ?></td>
            <td><?php echo $items->tahun_terbit_borang; ?></td>
            <td><a href="<?php echo base_url('versiborang/hapus/'.$items->id_versi); ?>"> Hapus </a></td>
            <td><a href="<?php echo base_url('versiborang/formupdate/'.$items->id_versi); ?>"> update </a></td>
          </tr>


          <?php
      }
      ?>
    </tbody>
  </table>
</body>
</html>
