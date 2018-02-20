<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH CATATAN</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('catatan/aksi_tambah'); ?>" >
    <div class="box-body">

      <input type="hidden" name="id_user" value="<?php echo $this->session->id; ?>">

    <div class="form-group">
      <label for="catatan">Catatan</label>
          <!-- <input type="text" class="form-control" id="catatan" placeholder="Isi Catatan" name="catatan">           -->
          <textarea class="form-control" id="catatan" placeholder="Isi Catatan" name="catatan" rows="10"></textarea>
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('catatan'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#catatan").val()) === "") {
        alert('Data masih kosong !!!');
    return false;
    }
});

</script>