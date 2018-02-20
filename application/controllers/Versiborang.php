<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Versiborang extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('m_versiborang');
  }

  function index() {
    $data_borang = $this->m_versiborang->lihat_data();

    $this->load->view('versiborang/v_versiborang', array("lihat_borang" => $data_borang));
    
  }

	function formtambah(){
		$this->load->view('versiborang/v_tambahborang',array());
	}

function create_data(){
		
		$id_versi = $this->input->post('id_versi');
		$nama_borang=$this->input->post('nama_borang');
		$nama_versi=$this->input->post('nama_versi');
		$tahun_terbit_borang=$this->input->post('tahun_terbit_borang');

		$this->m_versiborang->add_data($id_versi,$nama_borang,$nama_versi,$tahun_terbit_borang);
		redirect(base_url('versiborang'));

}

	function hapus ($id_versi)
	{

		$this->m_versiborang->hapus($id_versi);
		redirect(base_url('versiborang'));
	}
	function formupdate ($id_versi){

		$data_borang = $this->m_versiborang->formupdate($id_versi);

		$this->load->view('versiborang/v_updateborang',array("data_borang"=> $data_borang));

	}
	function edit ( $id_versi, $nama_borang, $nama_versi, $tahun_terbit_borang ){

		$id_versi=$this->input->post('id_versi');
		$nama_borang = $this->input->post('nama_borang');
		$nama_versi=$this->input->post('nama_versi');
		$tahun_terbit_borang=$this->input->post('tahun_terbit_borang');
		

		$this->m_versiborang->update($id_versi, $nama_borang, $nama_versi, $tahun_terbit_borang);
		redirect(base_url('versiborang'));
	}
}


