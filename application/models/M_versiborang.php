<?php
class M_versiborang extends CI_Model{  
  function __construct(){
    parent::__construct();    
  }
  function lihat_data() {
    $sql = "SELECT * FROM Versi_Borang";
    $query = $this->db->query($sql);
    $row = $query->result();

    return $row;
  }

  	function add_data($id_versi,$nama_borang,$nama_versi,$tahun_terbit_borang)
	{
		$sql ="INSERT INTO Versi_Borang SET id_versi= ?,
		nama_borang=?,
		nama_versi=?,
		tahun_terbit_borang=?";
		 $this->db->query($sql,array($id_versi,$nama_borang,$nama_versi,$tahun_terbit_borang));
	}
	function hapus ($id_versi){

	 $sql="DELETE FROM Versi_Borang WHERE id_versi= ?";
 	$this->db->query($sql,array($id_versi));
}

function formupdate ($id_versi){

	$sql = " SELECT * FROM Versi_Borang WHERE id_versi=?";
	$query = $this->db->query($sql, array ($id_versi));
	$row = $query->row();

	return $row;
}

function update ($id_versi, $nama_borang, $nama_versi, $tahun_terbit_borang){

	$sql= "UPDATE Versi_Borang SET nama_borang = ?,
	 nama_versi = ?, 
	 tahun_terbit_borang = ?
	where id_versi = ?";
	$this->db->query($sql,array($nama_borang, $nama_versi, $tahun_terbit_borang, $id_versi,));
	}
}
?>
