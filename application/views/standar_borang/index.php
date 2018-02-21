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
    <h4><strong><font color=blue>DATA STANDAR BORANG</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <a href='<?php echo base_url("standar_borang/tambah"); ?>'><button class="btn btn-success">+ Tambah Standar Borang</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>ID STANDAR</th>
                    <th>NOMOR STANDAR</th>
                    <th>NAMA STANDAR</th>
                    <th>ID VERSI</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($data['standar_borang'] as $item) {
          ?>
          <tr>
            <th><?php echo $item->id_standar; ?></th>
            <th><?php echo $item->nomor_standar; ?></th>
            <th><?php echo $item->nama_standar; ?></th>
            <th><?php echo $item->id_versi; ?></th>
              <th>
                <a class="btn btn-success" href="<?php echo base_url('standar_borang/ubah/'.$item->id_standar) ?>">Ubah</a>
                <a class="btn btn-success" onclick="hapus('<?php echo $item->id_standar; ?>')">Hapus</a>
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
    window.location = "<?php echo base_url('standar_borang/aksi_hapus/'); ?>" + id;
  }
}
</script>
