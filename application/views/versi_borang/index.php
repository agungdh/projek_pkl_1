<?php 
// var_dump($data['versi_borang']);
// exit();
?>
<script type="text/javascript" language="javascript" >
  var dTable;
  $(document).ready(function() {
    dTable = $('#lookup').DataTable({
      responsive: true
    });
  });
</script>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>DATA VERSI BORANG</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <a href='<?php echo base_url("versi_borang/tambah"); ?>'><button class="btn btn-success">+ Tambah Versi Borang</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>ID VERSI</th>
                    <th>NAMA BORANG</th>
                    <th>NAMA VERSI</th>
                    <th>TAHUN TERBIT BORANG</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($data['versi_borang'] as $item) {
          ?>
          <tr>
            <th><?php echo $item->id_versi; ?></th>
            <th><?php echo $item->nama_borang; ?></th>
            <th><?php echo $item->nama_versi; ?></th>
            <th><?php echo $item->tahun_terbit_borang; ?></th>
              <th>
                <a class="btn btn-success" href="<?php echo base_url('versi_borang/ubah/'.$item->id_versi) ?>">Ubah</a>
                <a class="btn btn-success" onclick="hapus('<?php echo $item->id_versi; ?>')">Hapus</a>
              </th>
          </tr>
          <?php
        }
        ?>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->

<script type="text/javascript">
function hapus(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url('versi_borang/aksi_hapus/'); ?>" + id;
  }
}
</script>
