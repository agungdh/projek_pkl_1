<?php
class M_kasbon extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function tambah(){
		$id_user = $this->input->post('id_user');
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');

		$sql = "call sp_tambah_kasbon(?,?,?)";
		$this->db->query($sql, array($jumlah, $keterangan, $id_user));
	}

	function bayar(){
		$id_kasbon = $this->input->post('id_kasbon');
		$jumlah = $this->input->post('jumlah');

		$sql = "call sp_tambah_pembayaran(?,?)";
		$this->db->query($sql, array($jumlah, $id_kasbon));
	}

	function lihat_sisa_hutang($id){
		$sql = "select f_lihat_sisa_hutang_pelanggan(?) sisa_hutang_pelanggan";
		$hasil = $this->db->query($sql, array($id))->row();

		return $hasil->sisa_hutang_pelanggan;
	}

}
?>