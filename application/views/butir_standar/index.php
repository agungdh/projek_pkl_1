<?php 
// var_dump($data['butir_standar']);
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
    <h4><strong><font color=blue>DATA BUTIR STANDAR</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <a href='<?php echo base_url("butir_standar/tambah"); ?>'><button class="btn btn-success">+ Tambah Butir Standar</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>ID Butir</th>
                    <th>Nomor Butir</th>
                    <th>Butir Pertanyaan</th>
                    <th>ID Versi</th>
                    <th>ID Standar</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
        <?php
        foreach ($data['butir_standar'] as $item) {
          ?>
          <tr>
            <th><?php echo $item->id_Butir; ?></th>
            <th><?php echo $item->nomor_butir; ?></th>
            <th><?php echo $item->butir_pertanyaan; ?></th>
            <th><?php echo $item->id_versi; ?></th>
            <th><?php echo $item->id_standar; ?></th>
              <th>
                <a class="btn btn-success" href="<?php echo base_url('butir_standar/ubah/'.$item->id_Butir) ?>">Ubah</a>
                <a class="btn btn-success" onclick="hapus('<?php echo $item->id_Butir; ?>')">Hapus</a>
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
    window.location = "<?php echo base_url('butir_standar/aksi_hapus/'); ?>" + id;
  }
}
</script>
