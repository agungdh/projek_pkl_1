<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH STANDAR BORANG</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('standar_borang/aksi_ubah'); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="id_standar">ID Standar</label>
          <input value="<?php echo $data['data_standar_borang']->id_standar; ?>" readonly required type="text" class="form-control" id="id_standar" placeholder="Isi ID Standar" name="id_standar">          
    </div>

    <div class="form-group">
      <label for="nomor_standar">Nomor Standar</label>
          <input value="<?php echo $data['data_standar_borang']->nomor_standar; ?>" required type="text" class="form-control" id="nomor_standar" placeholder="Isi Nomor Standar" name="nomor_standar">          
    </div>

    <div class="form-group">
      <label for="nama_standar">Nama Standar</label>
          <input value="<?php echo $data['data_standar_borang']->nama_standar; ?>" required type="text" class="form-control" id="nama_standar" placeholder="Isi Nama Standar" name="nama_standar">          
    </div>

    <div class="form-group">
      <label>ID Versi</label>
      <select class="form-control select2" name="id_versi">
        <?php
        foreach ($data['versi_borang'] as $item) {
          if ($item->id_versi == $data['data_standar_borang']->id_versi) {
          ?>
          <option selected value="<?php echo $item->id_versi; ?>"><?php echo $item->id_versi . " | " . $item->nama_borang . " | " . $item->nama_versi . " | " . $item->tahun_terbit_borang; ?></option>
          <?php
          } else {
          ?>
          <option value="<?php echo $item->id_versi; ?>"><?php echo $item->id_versi . " | " . $item->nama_borang . " | " . $item->nama_versi . " | " . $item->tahun_terbit_borang; ?></option>
          <?php
          }
        }
        ?>
      </select>
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('standar_borang'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>