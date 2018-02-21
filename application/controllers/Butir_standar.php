<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Butir_standar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_butir_standar');	
	}

	function index() {
		$data['isi'] = "butir_standar/index";
		$data['data']['butir_standar'] = $this->m_butir_standar->ambil_butir_standar();

		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "butir_standar/tambah";
		$data['data']['versi_borang'] = $this->m_butir_standar->ambil_versi_borang();
		$data['data']['standar_borang'] = $this->m_butir_standar->ambil_standar_borang();

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		$this->m_butir_standar->tambah_butir_standar(
			$this->input->post('id_butir'),
			$this->input->post('nomor_butir'),
			$this->input->post('butir_pertanyaan'),
			$this->input->post('id_versi'),
			$this->input->post('id_standar')
		);

		redirect(base_url('butir_standar'));
	}

	function ubah($id_butir) {
		$data['isi'] = "butir_standar/ubah";
		$data['data']['versi_borang'] = $this->m_butir_standar->ambil_versi_borang();
		$data['data']['standar_borang'] = $this->m_butir_standar->ambil_standar_borang();
		$data['data']['data_butir_standar'] = $this->m_butir_standar->ambil_butir_standar_id($id_butir);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_butir_standar->ubah_butir_standar(
			$this->input->post('nomor_butir'),
			$this->input->post('butir_pertanyaan'),
			$this->input->post('id_versi'),
			$this->input->post('id_standar'),
			$this->input->post('id_butir')
		);
		
		redirect(base_url('butir_standar'));
	}

	function aksi_hapus($id_versi) {
		$this->m_butir_standar->hapus_butir_standar(
			$id_versi
		);

		redirect(base_url('butir_standar'));
	}

}
