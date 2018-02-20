<?php
class M_butir_standar extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_data_user(){
		$sql = "SELECT id, nama, username
		FROM user
		WHERE level = ?";
		$query = $this->db->query($sql, array(2));
		$row = $query->result();

		return $row;
	}

	function tambah_butir(){
		$id = $this->input->post('id');
		$nomor = $this->input->post('nomor');
		$pertanyaan = $this->input->post('pertanyaan');
		$versi = $this->input->post('versi');
		$standar = $this->input->post('standar');

		$sql = "INSERT INTO `Butir_Standar`(`id_Butir`, `nomor_butir`, `butir_pertanyaan`, `id_versi`, `id_standar`) VALUES (?,?,?,?,?)";
		$query = $this->db->query($sql, array($id, $nomor, $pertanyaan, $versi, $standar));
	}

	function ubah_butir(){
		$id = $this->input->post('id');
		$nomor = $this->input->post('nomor');
		$pertanyaan = $this->input->post('pertanyaan');
		$versi = $this->input->post('versi');
		$standar = $this->input->post('standar');

		$sql = "UPDATE `Butir_Standar` SET `nomor_butir`=?,`butir_pertanyaan`=?,`id_versi`=?,`id_standar`=? WHERE id_Butir= ?";
		$query = $this->db->query($sql, array($nomor, $pertanyaan, $versi, $standar, $id));
	}

	function hapus_user(){
		$id = $this->input->post('id');

		$sql = "call sp_hapus_user(?);";
		$query = $this->db->query($sql, array($id));
	}

	function ganti_password(){
		$id = $this->input->post('id');
		$password = $this->input->post('password');

		$sql = "call sp_ganti_password(?,?);";
		$query = $this->db->query($sql, array($password, $id));
	}

}
?>