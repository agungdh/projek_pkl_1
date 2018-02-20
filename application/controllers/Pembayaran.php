<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_pembayaran');		
		$this->load->library('tanggal_indo');
		$this->load->library('rupiah');
	}

	function index() {
		$this->load->view("template/template", array("isi"=>"pembayaran/index"));
	}

	function ajax(){
		$requestData = $_REQUEST;
		$columns = array( 
		    	0 => 'tanggal_kasbon',
				1 => 'jumlah_kasbon',
				2 => 'keterangan_kasbon',
				3 => 'tanggal_pembayaran',
				4 => 'jumlah_pembayaran',
		);

			$query = $this->db->query("SELECT count(*) total_data FROM v_detil_pembayaran where id_user = ?", array($this->session->id));

			foreach ($query->result() as $rowC) { 
				$totalData = $rowC->total_data;
				$totalFiltered = $totalData; 
			}	

		$data = array();

		if( !empty($requestData['search']['value']) ) {
			$search_value = "%" . $requestData['search']['value'] . "%";

			$query = $this->db->query("SELECT count(*) total_data FROM v_detil_pembayaran WHERE id_user = ?
			and keterangan_kasbon LIKE ? ",array($this->session->id,$search_value));

			foreach ($query->result() as $rowC) { 
				$totalFiltered = $rowC->total_data;
			}	

			$query = $this->db->query("SELECT * FROM v_detil_pembayaran WHERE id_user = ?
			and keterangan_kasbon LIKE ? 
			 ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'],array($this->session->id,$search_value));
						
		} else {	

			$query = $this->db->query("SELECT * FROM v_detil_pembayaran where id_user = ?
				ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], array($this->session->id));
						
		}

		foreach ($query->result() as $row) { 
			$nestedData=array(); 
			$tanggal_kasbon = $this->tanggal_indo->datetime($row->tanggal_kasbon);
			$nestedData[] = $tanggal_kasbon;
			$jumlah_kasbon = $this->rupiah->convert_ke_rupiah($row->jumlah_kasbon);
			$nestedData[] = $jumlah_kasbon;
			$nestedData[] = $row->keterangan_kasbon;
			$tanggal_pembayaran = $this->tanggal_indo->datetime($row->tanggal_pembayaran);
			$nestedData[] = $tanggal_pembayaran;
			$jumlah_pembayaran = $this->rupiah->convert_ke_rupiah($row->jumlah_pembayaran);
			$nestedData[] = $jumlah_pembayaran;
			
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
