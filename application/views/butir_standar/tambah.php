<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH BUTIR STANDAR</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('butir_standar/aksi_tambah'); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="id_butir">ID Butir</label>
          <input required type="text" class="form-control" id="id_butir" placeholder="Isi ID Butir" name="id_butir">          
    </div>

    <div class="form-group">
      <label for="nomor_butir">Nomor Butir</label>
          <input required type="text" class="form-control" id="nomor_butir" placeholder="Isi Nomor Butir" name="nomor_butir">          
    </div>

    <div class="form-group">
      <label for="butir_pertanyaan">Butir Pertanyaan</label>
          <input required type="text" class="form-control" id="butir_pertanyaan" placeholder="Isi Butir Pertanyaan" name="butir_pertanyaan">          
    </div>

    <div class="form-group">
      <label>ID Versi</label>
      <select class="form-control select2" name="id_versi">
        <?php
        foreach ($data['versi_borang'] as $item) {
          ?>
          <option value="<?php echo $item->id_versi; ?>"><?php echo $item->id_versi . " | " . $item->nama_borang . " | " . $item->nama_versi . " | " . $item->tahun_terbit_borang; ?></option>
          <?php
        }
        ?>
      </select>
    </div>
    
    <div class="form-group">
      <label>ID Versi</label>
      <select class="form-control select2" name="id_standar">
        <?php
        foreach ($data['standar_borang'] as $item) {
          ?>
          <option value="<?php echo $item->id_standar; ?>"><?php echo $item->id_standar . " | " . $item->nomor_standar . " | " . $item->nama_standar . " | " . $item->id_versi; ?></option>
          <?php
        }
        ?>
      </select>
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('butir_standar'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>