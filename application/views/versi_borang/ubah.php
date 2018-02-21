<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH VERSI BORANG</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('versi_borang/aksi_ubah'); ?>">
    <div class="box-body">

    <div class="form-group">
      <label for="id_versi">ID Versi</label>
          <input value="<?php echo $data_versi_borang->id_versi; ?>" readonly required type="text" class="form-control" id="id_versi" placeholder="Isi ID Versi" name="id_versi">          
    </div>

    <div class="form-group">
      <label for="nama_borang">Nama Borang</label>
          <input value="<?php echo $data_versi_borang->nama_borang; ?>" required type="text" class="form-control" id="nama_borang" placeholder="Isi Nama Borang" name="nama_borang">          
    </div>

    <div class="form-group">
      <label for="nama_versi">Nama Versi</label>
          <input value="<?php echo $data_versi_borang->nama_versi; ?>" required type="text" class="form-control" id="nama_versi" placeholder="Isi Nama Versi" name="nama_versi">          
    </div>

    <div class="form-group">
      <label for="tahun_terbit_borang">Tahun Terbit Borang</label>
          <input value="<?php echo $data_versi_borang->tahun_terbit_borang; ?>" required type="text" class="form-control" id="tahun_terbit_borang" placeholder="Isi Tahun Terbit Borang" name="tahun_terbit_borang">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('versi_borang'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
