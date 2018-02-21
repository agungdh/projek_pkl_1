<?php
class M_butir_standar extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_butir_standar(){
		$sql = "SELECT *
		FROM Butir_Standar";
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
	
	function ambil_standar_borang(){
		$sql = "SELECT *
		FROM Standar_Borang";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}
	
	function ambil_butir_standar_id($id_butir){
		$sql = "SELECT *
		FROM Butir_Standar
		where id_butir = ?";
		$query = $this->db->query($sql, array($id_butir));
		$row = $query->row();

		return $row;
	}
	
	function tambah_butir_standar($id_butir, $nomor_butir, $butir_pertanyaan, $id_versi, $id_standar){
		$sql = "INSERT INTO Butir_Standar
				SET id_butir = ?,
				nomor_butir = ?,
				butir_pertanyaan = ?,
				id_versi = ?,
				id_standar = ?";
		$query = $this->db->query($sql, array($id_butir, $nomor_butir, $butir_pertanyaan, $id_versi, $id_standar));
	}
	
	function ubah_butir_standar($nomor_butir, $butir_pertanyaan, $id_versi, $id_standar, $id_butir){
		$sql = "UPDATE Butir_Standar
				SET nomor_butir = ?,
				butir_pertanyaan = ?,
				id_versi = ?,
				id_standar = ?
				WHERE id_butir = ?";
		$query = $this->db->query($sql, array($nomor_butir, $butir_pertanyaan, $id_versi, $id_standar, $id_butir));
		echo $this->db->last_query();
	}
	
	function hapus_butir_standar($id_butir){
		$sql = "DELETE FROM Butir_Standar
				WHERE id_butir = ?";
		$query = $this->db->query($sql, array($id_butir));
	}

}
?>