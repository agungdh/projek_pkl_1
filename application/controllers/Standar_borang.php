<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standar_borang extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_standar_borang');	
	}

	function index() {
		$data['isi'] = "standar_borang/index";
		$data['data']['standar_borang'] = $this->m_standar_borang->ambil_standar_borang();

		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "standar_borang/tambah";
		$data['data']['versi_borang'] = $this->m_standar_borang->ambil_versi_borang();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		$this->m_standar_borang->tambah_standar_borang(
			$this->input->post('id_standar'),
			$this->input->post('nomor_standar'),
			$this->input->post('nama_standar'),
			$this->input->post('id_versi')
		);

		redirect(base_url('standar_borang'));
	}

	function ubah($id_versi) {
		$data['isi'] = "standar_borang/ubah";
		$data['data']['versi_borang'] = $this->m_standar_borang->ambil_versi_borang();
		$data['data']['data_standar_borang'] = $this->m_standar_borang->ambil_standar_borang_id($id_versi);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_standar_borang->ubah_standar_borang(
			$this->input->post('nomor_standar'),
			$this->input->post('nama_standar'),
			$this->input->post('id_versi'),
			$this->input->post('id_standar')
		);
		
		redirect(base_url('standar_borang'));
	}

	function aksi_hapus($id_versi) {
		$this->m_standar_borang->hapus_standar_borang(
			$id_versi
		);

		redirect(base_url('standar_borang'));
	}

}
