<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "responsive": true,
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"<?php echo base_url("user/ajax") ?>", // json datasource
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
    <h4><strong><font color=blue>BUTIR STANDAR</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <a href='<?php echo base_url("user/tambah"); ?>'><button class="btn btn-success">+ Tambah User</button></a>
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
            <th>NO</th>
            <th>ID BUTIR</th>
            <th>NOMOR</th>
            <th>VERSI</th>
            <th>STANDAR</th>
            <th>ACTION</th>

        </tr>
      </thead>
      	<tr>
      		<td>1</td>
      		<td>2</td>
      		<td>3</td>
      		<td>4</td>
      		<td>5</td>
      		<td>5</td>
      	</tr>
      <tbody>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->