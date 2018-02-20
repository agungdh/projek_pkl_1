<?php
class M_user extends CI_Model{	
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

	function tambah_user(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$sql = "call sp_tambah_pengguna(?,?,?);";
		$query = $this->db->query($sql, array($nama, $username, $password));
	}

	function ubah_user(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');

		$sql = "call sp_ubah_user(?,?);";
		$query = $this->db->query($sql, array($nama, $id));
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