<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_catatan');
		$this->load->library('tanggal_indo');		
	}

	function index() {
		$this->load->view("template/template", array("isi"=>"catatan/index"));
	}

	function tambah() {
		$this->load->view("template/template", array("isi"=>"catatan/tambah"));
	}

	function aksi_tambah() {
		$this->m_catatan->tambah();

		redirect(base_url('catatan'));
	}

	function aktivasi($id){
		$this->m_catatan->aktivasi($id);

		redirect(base_url('catatan'));
	}

	function nonaktivasi($id){
		$this->m_catatan->nonaktivasi($id);

		redirect(base_url('catatan'));
	}

	function ajax(){
		$requestData = $_REQUEST;
		$columns = array( 
		    	0 => 'tanggal',
				1 => 'keterangan'
		);

			$query = $this->db->query("SELECT count(*) total_data FROM v_catatan_aktif where id_user = ?", array($this->session->id));

			foreach ($query->result() as $rowC) { 
				$totalData = $rowC->total_data;
				$totalFiltered = $totalData; 
			}	

		$data = array();

		if( !empty($requestData['search']['value']) ) {
			$search_value = "%" . $requestData['search']['value'] . "%";

			$query = $this->db->query("SELECT count(*) total_data FROM v_catatan_aktif WHERE id_user = ?
			and keterangan LIKE ? ",array($this->session->id,$search_value));

			foreach ($query->result() as $rowC) { 
				$totalFiltered = $rowC->total_data;
			}	

			$query = $this->db->query("SELECT * FROM v_catatan_aktif WHERE id_user = ?
			and keterangan LIKE ? 
			 ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'],array($this->session->id,$search_value));
						
		} else {	

			$query = $this->db->query("SELECT * FROM v_catatan_aktif where id_user = ?
				ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], array($this->session->id));
						
		}

		foreach ($query->result() as $row) { 
			$nestedData=array(); 
			$id_catatan = $row->id;
			$tanggal = $this->tanggal_indo->datetime($row->tanggal);
			$nestedData[] = $tanggal;
			$nestedData[] = $row->keterangan;
			$nestedData[] = "<p align='center'><a href='".base_url('catatan/nonaktivasi/').$id_catatan."'><button class='btn btn-info'>Nonaktif</button></a></p>";
			
			$data[] = $nestedData;
		    
		}

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),    
					"recordsTotal"    => intval( $totalData ), 
					"recordsFiltered" => intval( $totalFiltered ), 
					"data"            => $data   
					);

		echo json_encode($json_data);  
	}

	function ajaxnonaktif(){
		$requestData = $_REQUEST;
		$columns = array( 
		    	0 => 'tanggal',
				1 => 'keterangan'
		);

			$query = $this->db->query("SELECT count(*) total_data FROM v_catatan_nonaktif where id_user = ?", array($this->session->id));

			foreach ($query->result() as $rowC) { 
				$totalData = $rowC->total_data;
				$totalFiltered = $totalData; 
			}	

		$data = array();

		if( !empty($requestData['search']['value']) ) {
			$search_value = "%" . $requestData['search']['value'] . "%";

			$query = $this->db->query("SELECT count(*) total_data FROM v_catatan_nonaktif WHERE id_user = ?
			and keterangan LIKE ? ",array($this->session->id,$search_value));

			foreach ($query->result() as $rowC) { 
				$totalFiltered = $rowC->total_data;
			}	

			$query = $this->db->query("SELECT * FROM v_catatan_nonaktif WHERE id_user = ?
			and keterangan LIKE ? 
			 ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'],array($this->session->id,$search_value));
						
		} else {	

			$query = $this->db->query("SELECT * FROM v_catatan_nonaktif where id_user = ?
				ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], array($this->session->id));
						
		}

		foreach ($query->result() as $row) { 
			$nestedData=array(); 
			$id_catatan = $row->id;
			$tanggal = $this->tanggal_indo->datetime($row->tanggal);
			$nestedData[] = $tanggal;
			$nestedData[] = $row->keterangan;
			$nestedData[] = "<p align='center'><a href='".base_url('catatan/aktivasi/').$id_catatan."'><button class='btn btn-info'>Aktif</button></a></p>";
			
			$data[] = $nestedData;
		    
		}

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),    
					"recordsTotal"    => intval( $totalData ), 
					"recordsFiltered" => intval( $totalFiltered ), 
					"data"            => $data   
					);

		echo json_encode($json_data);  
	}

}
