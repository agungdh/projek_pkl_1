<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>TAMBAH BUTIR STANDAR</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('Welcome/aksi_tambah_butir'); ?>" >
    <div class="box-body">

    <div class="form-group">
      <label for="id">ID Butir</label>
          <input type="text" class="form-control" id="id" placeholder="ID butir" name="id">          
    </div>

    <div class="form-group">
      <label for="nomor">Nomor Butir</label>
          <input type="text" class="form-control" id="nomor" placeholder="No butir" name="nomor">          
    </div>

    <div class="form-group">
      <label for="pertanyaan">Butir Pertanyaan </label>
          <input type="text" class="form-control" id="pertanyaan" placeholder="butir pertanyaan" name="pertanyaan">          
    </div>

    <div class="form-group">
      <label for="versi">Versi </label>
          <input type="text" class="form-control" id="versi" placeholder="Isi versi" name="versi">          
    </div>


    <div class="form-group">
      <label for="standar">Standar </label>
          <input type="text" class="form-control" id="standar" placeholder="Isi standar" name="standar">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url(); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">

$('#form').submit(function() 
{
    if ($.trim($("#id").val()) === "") {
        alert('Data ID Butir kosong !!!');
    return false;
    }

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