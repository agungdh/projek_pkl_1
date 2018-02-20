<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "responsive": true,
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"<?php echo base_url("catatan/ajax") ?>", // json datasource
            type: "post",  // method  , by default get
            /*
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('');
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
            */
            
          },
          "columnDefs": [ {
          "targets": [2],
          "orderable": false
          } ]
        } );
      } );
</script>

<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
        var dataTable = $('#lookup2').DataTable( {
          "responsive": true,
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"<?php echo base_url("catatan/ajaxnonaktif") ?>", // json datasource
            type: "post",  // method  , by default get
            /*
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('');
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
            }
            */
            
          },
          "columnDefs": [ {
          "targets": [2],
          "orderable": false
          } ]
        } );
      } );
</script>


<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>DATA CATATAN AKTIF</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <a href='<?php echo base_url("catatan/tambah"); ?>'><button class="btn btn-success">+ Tambah Catatan</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>TANGGAL</th>
                    <th>CATATAN</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box --><div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>DATA CATATAN NON-AKTIF</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <table id="lookup2" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
                    <th>TANGGAL</th>
                    <th>CATATAN</th>
                    <th>PROSES</th>
        </tr>
      </thead>

      <tbody>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->