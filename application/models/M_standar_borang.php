<?php
class M_standar_borang extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_standar_borang(){
		$sql = "SELECT *
		FROM Standar_Borang";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}

	function ambil_versi_borang(){
		$sql = "SELECT *
		FROM Versi_Borang";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}
	
	function ambil_standar_borang_id($id_standar){
		$sql = "SELECT *
		FROM Standar_Borang
		where id_standar = ?";
		$query = $this->db->query($sql, array($id_standar));
		$row = $query->row();

		return $row;
	}
	
	function tambah_standar_borang($id_standar, $nomor_standar, $nama_standar, $id_versi){
		$sql = "INSERT INTO Standar_Borang
				SET id_standar = ?,
				nomor_standar = ?,
				nama_standar = ?,
				id_versi = ?";
		$query = $this->db->query($sql, array($id_standar, $nomor_standar, $nama_standar, $id_versi));
	}
	
	function ubah_standar_borang($nomor_standar, $nama_standar, $id_versi, $id_standar){
		$sql = "UPDATE Standar_Borang
				SET nomor_standar = ?,
				nama_standar = ?,
				id_versi = ?
				WHERE id_standar = ?";
		$query = $this->db->query($sql, array($nomor_standar, $nama_standar, $id_versi, $id_standar));
		echo $this->db->last_query();
	}
	
	function hapus_standar_borang($id_standar){
		$sql = "DELETE FROM Standar_Borang
				WHERE id_standar = ?";
		$query = $this->db->query($sql, array($id_standar));
	}

}
?>