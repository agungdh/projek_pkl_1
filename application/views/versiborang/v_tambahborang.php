<?php 
// echo base_url("dewak123");;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo base_url('versiborang/create_data'); ?>">
		<label>id_versi</label>
		<br>
		<input type="text" name="id_versi">
		<br>
		<label>nama_borang</label>
		<br>
		<input type="text" name="nama_borang">
		<br>
		<label>nama_versi</label>
		<br>
		<input type="text" name="nama_versi">
		<br>
		<label>tahun_terbit_borang</label>
		<br>
		<input type="text" name="tahun_terbit_borang">
		<br>
		<input type="submit" name="submit" value="tambah">
	</form>
</body>
</html>