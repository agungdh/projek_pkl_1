<?php
class M_catatan extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function aktivasi($id){
		$sql = "call sp_aktifkan_catatan(?)";
		$this->db->query($sql, array($id));
	}

	function nonaktivasi($id){
		$sql = "call sp_nonaktifkan_catatan(?)";
		$this->db->query($sql, array($id));
	}

	function tambah(){
		$catatan = $this->input->post('catatan');
		$id_user = $this->input->post('id_user');

		$sql = "call sp_tambah_catatan(?,?)";
		$this->db->query($sql, array($catatan, $id_user));
	}

}
?>