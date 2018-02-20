<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo base_url('versiborang/edit'); ?>">
		
		<input type="hidden" name="id_versi" value="<?php echo $data_borang->id_versi;?>">
		<br>
		<label>Id Versi</label>
		<br>
		<input type="text" name="nama_borang" value="<?php echo $data_borang->nama_borang;?>">
		<br>
		<label>Nama Borang</label>
		<br>
		<input type="text" name="nama_versi" value="<?php echo $data_borang->nama_versi;?>">
		<br>
		<label>Nama Versi</label>
		<br>
		<input type="text" name="tahun_terbit_borang" value="<?php echo $data_borang->tahun_terbit_borang;?>">
		<br>
		<label>Tahun terbit Borang</label>
		<br>
		<input type="submit" name="submit" value="kirim">
	</form>
</body>
</html>