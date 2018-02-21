<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          "responsive": true,
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"<?php echo base_url("user/ajax") ?>", // json datasource
            type: "post" // method  , by default get
            
            // error: function(){  // error handling
            //   $(".lookup-error").html("");
            //   $("#lookup").append('');
            //   $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            //   $("#lookup_processing").css("display","none");
            // }
            
            
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
      <a href='<?php echo base_url("user/tambah"); ?>'><button class="btn btn-success">+ Tambah Data</button></a>
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
      <?php foreach ($butir as $b): ?>
      	<tr>
      		<td><?php echo $b->id_Butir; ?></td>
      		<td><?php echo $b->nomor_butir; ?></td>
      		<td><?php echo $b->butir_pertanyaan; ?></td>
      		<td><?php echo $b->id_versi; ?></td>
      		<td><?php echo $b->id_standar; ?></td>
      		<td>
              <a href='<?php echo base_url("welcome/tambah_butir"); ?>' class="btn btn-success"><i class="fa fa-plus"></i></a>
              <a href='<?php echo base_url("welcome/ubah_butir/").$b->id_Butir; ?>' class="btn btn-info"><i class="fa fa-pencil"></i></a>
              <a href='<?php echo base_url("welcome/delete_butir/").$b->id_Butir; ?>' class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
      	</tr>
      <?php endforeach; ?>
      <tbody>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->
