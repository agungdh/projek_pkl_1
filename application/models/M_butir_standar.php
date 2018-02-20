<?php
class M_butir_standar extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_data_butir(){
		$row = "SELECT * FROM Butir_Standar";
		$sql = $this->db->query($row);
		$query = $sql->result();
		return $query;
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

	function delete_butir($id){
		$data = "DELETE FROM `Butir_Standar` WHERE id_Butir = ?";
		$query = $this->db->query($data, array($id));
	}

}
?>