<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Versi_borang extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_versi_borang');	
	}

	function index() {
		$data['isi'] = "versi_borang/index";
		$data['data']['versi_borang'] = $this->m_versi_borang->ambil_versi_borang();

		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "versi_borang/tambah";

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		$this->m_versi_borang->tambah_versi_borang(
			$this->input->post('id_versi'),
			$this->input->post('nama_borang'),
			$this->input->post('nama_versi'),
			$this->input->post('tahun_terbit_borang')
		);

		redirect(base_url('versi_borang'));
	}

	function ubah($id_versi) {
		$data['isi'] = "versi_borang/ubah";
		$data['data']['data_versi_borang'] = $this->m_versi_borang->ambil_versi_borang_id($id_versi);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_versi_borang->ubah_versi_borang(
			$this->input->post('nama_borang'),
			$this->input->post('nama_versi'),
			$this->input->post('tahun_terbit_borang'),
			$this->input->post('id_versi')
		);

		redirect(base_url('versi_borang'));
	}

	function aksi_hapus($id_versi) {
		$this->m_versi_borang->hapus_versi_borang(
			$id_versi
		);

		redirect(base_url('versi_borang'));
	}

}
