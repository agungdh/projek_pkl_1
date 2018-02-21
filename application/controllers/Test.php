<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		// echo "cinta";
		$this->load->library('pustaka');
		echo $this->pustaka->tanggal_indo('1997-03-25 23:40:30');
		echo "<br>";
		echo $this->pustaka->dec_to_int('10.10');
	}

	function index_bak() {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>test</title>
		</head>
		<body>
			<form method="post" action="<?php echo base_url('test/submit'); ?>">
				<select multiple name="siswa[]">
					<option value="cacan">Chandra</option>
					<option value="agungdh">AgungDH</option>
					<option value="binting">Bintang Kemplo</option>
					<option value="dewaks">Romeo</option>
				</select>
				<input type="submit" name="Submit">
			</form>
		</body>
		</html>
		<?php
	}

	function submit() {
		// echo $this->input->post('siswa');
		// echo "<br><br><br><br><br><br><br><br><br><br><br>";
		var_dump($this->input->post('siswa'));
		?>
		<br>
		<br>
		<a href="<?php echo base_url('test'); ?>">Back</a>		
		<?php
	}

	function explode($string){
		echo end(explode('.', $string));
	}

}
