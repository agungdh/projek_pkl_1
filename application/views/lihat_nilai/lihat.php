<?php
if ($data_nilai[1] != null || $data_nilai[2] != null || $data_nilai[3] != null || $data_nilai[4] != null || $data_nilai[5] != null || $data_nilai[6] != null ) {
?>
  <a href="<?php echo base_url("lihat_nilai/export/".$this->input->post('nis')); ?>">Export PDF</a>
  <br>
  <br>
<?php  
}
?>

<?php
for ($j=1; $j <= 6; $j++) { 
  if ($data_nilai[$j] != null) {
    ?>

<table width="100%">
  <tr>
    <td class="tg-031e">NIS: <?php echo $data_siswa->nis; ?><br></td>
    <td class="tg-yw4l">Jurusan: Multimedia<br></td>
  </tr>
  <tr>
    <td class="tg-031e">Nama: <?php echo $data_siswa->nama; ?><br></td>
    <td class="tg-yw4l">Semester: <?php echo $j; ?><br></td>
  </tr>
</table>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-2thk{background-color:#c0c0c0;text-align:center}
.tg .tg-x5m0{background-color:#c0c0c0;text-align:right;vertical-align:top}
.tg .tg-6qw1{background-color:#c0c0c0;text-align:center;vertical-align:top}
.tg .tg-le8v{background-color:#c0c0c0;vertical-align:top}
.tg .tg-hy62{background-color:#c0c0c0}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-w82q{font-family:"Comic Sans MS", cursive, sans-serif !important;}
</style>
<table class="tg" width="100%">
  <tr>
    <th class="tg-6qw1" colspan="2">Komponen<br></th>
    <th class="tg-2thk" colspan="2">Nilai Hasil Belajar<br></th>
  </tr>
  <tr>
    <td class="tg-le8v">No</td>
    <td class="tg-le8v">Mata Pelajaran<br></td>
    <td class="tg-hy62">Angka<br></td>
    <td class="tg-hy62">Huruf</td>
  </tr>
  <?php
  $i=1;
  $jumlah_nilai = 0;
  $rata = 0;
  foreach ($data_nilai[$j] as $item) {
  $jumlah_nilai += $item->nilai;
  $rata = $jumlah_nilai / $i;
  ?>
  <tr>
    <td class="tg-yw4l"><?php echo $i; ?>.<br></td>
    <td class="tg-yw4l"><?php echo $item->mata_pelajaran; ?></td>
    <td class="tg-w82q"><?php echo $item->nilai; ?></td>
    <td class="tg-031e"><?php echo ucwords($this->pustaka->terbilang($item->nilai)); ?><br></td>
  </tr>
  <?php
  $i++;
  }
  ?>
  <tr>
    <td class="tg-x5m0" colspan="2">Jumlah Nilai<br></td>
    <td class="tg-yw4l"><?php echo $jumlah_nilai; ?><br></td>
    <td class="tg-yw4l"><?php echo ucwords($this->pustaka->terbilang($jumlah_nilai)); ?></td>
  </tr>
  <tr>
    <td class="tg-x5m0" colspan="2">Rata-Rata Nilai<br></td>
    <td class="tg-yw4l"><?php echo floor($rata); ?></td>
    <td class="tg-yw4l"><?php echo ucwords($this->pustaka->terbilang($rata)); ?><br></td>
  </tr>
</table>
<br>
<br>
    <?php
  }
  ?>

  <?php
}
?>