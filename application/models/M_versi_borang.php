<?php
class M_versi_borang extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_versi_borang(){
		$sql = "SELECT *
		FROM Versi_Borang";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}
	
	function ambil_versi_borang_id($id_versi_borang){
		$sql = "SELECT *
		FROM Versi_Borang
		where id_versi = ?";
		$query = $this->db->query($sql, array($id_versi_borang));
		$row = $query->row();

		return $row;
	}
	
	function tambah_versi_borang($id_versi, $nama_borang, $nama_versi, $tahun_terbit_borang){
		$sql = "INSERT INTO Versi_Borang
				SET id_versi = ?,
				nama_borang = ?,
				nama_versi = ?,
				tahun_terbit_borang = ?";
		$query = $this->db->query($sql, array($id_versi, $nama_borang, $nama_versi, $tahun_terbit_borang));
	}
	
	function ubah_versi_borang($nama_borang, $nama_versi, $tahun_terbit_borang, $id_versi){
		$sql = "UPDATE Versi_Borang
				SET nama_borang = ?,
				nama_versi = ?,
				tahun_terbit_borang = ?
				WHERE id_versi = ?";
		$query = $this->db->query($sql, array($nama_borang, $nama_versi, $tahun_terbit_borang, $id_versi));
	}
	
	function hapus_versi_borang($id_versi){
		$sql = "DELETE FROM Versi_Borang
				WHERE id_versi = ?";
		$query = $this->db->query($sql, array($id_versi));
	}

}
?>