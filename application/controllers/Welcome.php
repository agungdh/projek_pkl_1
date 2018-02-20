<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_butir_standar');		
	}

	function index() {
		//echo "kosong";
		$this->load->view("template/template", array("isi"=>"butir_standar/index"));
	}

	function tambah_butir(){
		$this->load->view("template/template", array("isi"=>"butir_standar/form_butir_standar"));
	}

	function aksi_tambah_butir(){
		if ($this->input->post('id') == null ||$this->input->post('nomor') == null || $this->input->post('pertanyaan') == null || $this->input->post('versi') == null || $this->input->post('standar') == null) {
			redirect(base_url('Welcome/index?kosong=1'));
		}else{
			// echo " data lengkap";
			$this->M_butir_standar->tambah_butir();
			redirect(base_url('Welcome'));
		}
	}

	function ubah_butir($id=null){
		$this->load->view('template/template',array("isi" => "butir_standar/form_ubah_butir_standar", "data" => array("id" => $id)));
	}


	function aksi_ubah_butir(){
		$this->M_butir_standar->ubah_butir();
		redirect(base_url('Welcome'));	
	}

	// function hapus_butir($id=null){
	// 	$this->load->view('template/template',array("isi" => "butir_standar/form_hapus_butir" => array("id" => $id)));
	// }

	// function aksi_hapus(){
	// 	$this->M_butir_standar->hapus_butir();
	// 	redirect(base_url('Welcome'));	
	// }



}
