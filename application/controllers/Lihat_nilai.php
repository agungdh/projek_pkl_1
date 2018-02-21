<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_nilai extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_lihat_nilai');		
	}

	function index() {
		// var_dump($this->m_kelas->lihat_deadline_belum_dikumpul());
		foreach ($this->m_lihat_nilai->lihat_deadline_belum_dikumpul() as $item) {
		 	$this->m_lihat_nilai->kumpul_ujian($item->id_ujian);
		 	// echo $item->id_ujian;
		 } 

		if ($this->input->post('nis') != null) {
			$this->load->view("lihat_nilai/index");
			for ($i=1; $i <=6 ; $i++) { 
				$data_nilai[$i] = $this->m_lihat_nilai->ambil_tabel_nilai($this->input->post('nis'),$i);
			}
			$data_siswa = $this->m_lihat_nilai->ambil_data_siswa($this->input->post('nis'));
			if ($data_siswa == null) {
				redirect(base_url("lihat_nilai"));
			}	
			$this->load->view("lihat_nilai/lihat", array("data_nilai" => array(null, $data_nilai[1], $data_nilai[2], $data_nilai[3], $data_nilai[4], $data_nilai[5], $data_nilai[6]), "data_siswa" => $data_siswa));
		} else {
			$this->load->view("lihat_nilai/index");
		}
	}

	public function export($nis) {	
		for ($i=1; $i <=6 ; $i++) { 
				$data_nilai[$i] = $this->m_lihat_nilai->ambil_tabel_nilai($nis,$i);
		}
		$data_siswa = $this->m_lihat_nilai->ambil_data_siswa($nis);
		$this->load->view("lihat_nilai/export", array("data_nilai" => array(null, $data_nilai[1], $data_nilai[2], $data_nilai[3], $data_nilai[4], $data_nilai[5], $data_nilai[6]), "data_siswa" => $data_siswa));

		$html = $this->output->get_output();
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Nilai_".$data_siswa->nis."_".$data_siswa->nama.".pdf");		
	}

}
