<?php
$query = $this->db->query("select * from Butir_Standar where id_Butir = ?", array($id));
  
  foreach ($query->result() as $row) {   
    $id           = $row->id_Butir;
    $nomor        = $row->nomor_butir;
    $pertanyaan   = $row->butir_pertanyaan;
    $versi        = $row->id_versi;
    $standar      = $row->id_standar;
  }
?>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH BUTIR STANDAR</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form role="form" method="post" name="form" id="form" action="<?php echo base_url('Welcome/aksi_ubah_butir'); ?>">
    <div class="box-body">

      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <div class="form-group">
        <label for="nama">Nomor Butir</label>
            <input type="text" class="form-control" id="nomor" placeholder="Isi nama" name="nomor" value="<?php echo $nomor; ?>">          
      </div>

      <div class="form-group">
        <label for="nama">BUtir Pertanyaan</label>
            <input type="text" class="form-control" id="pertanyaan" placeholder="Isi nama" name="pertanyaan" value="<?php echo $pertanyaan; ?>">          
      </div>

      <div class="form-group">
        <label for="nama">ID VERSI</label>
            <input type="text" class="form-control" id="versi" placeholder="Isi nama" name="versi" value="<?php echo $versi; ?>">          
      </div>

      <div class="form-group">
        <label for="nama">ID STANDAR</label>
            <input type="text" class="form-control" id="standar" placeholder="Isi nama" name="standar" value="<?php echo $standar; ?>">          
      </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('user'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->


<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#nomor").val()) === "") {
        alert('Data nomor kosong !!!');
    return false;
    }
    if ($.trim($("#pertanyaan").val()) === "") {
        alert('Data pertanyaan kosong !!!');
    return false;
    }
    if ($.trim($("#versi").val()) === "") {
        alert('Data versi kosong !!!');
    return false;
    }
    if ($.trim($("#standar").val()) === "") {
        alert('Data standar kosong !!!');
    return false;
    }
});

</script>