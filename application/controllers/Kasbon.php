<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasbon extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_kasbon');		
		$this->load->library('tanggal_indo');
		$this->load->library('rupiah');
	}

	function index() {
		$this->load->view("template/template", array("isi"=>"kasbon/index"));
	}

	function lihat($id) {
		$sisa_hutang = $this->m_kasbon->lihat_sisa_hutang($id);

		$this->load->view("template/template", array("isi"=>"kasbon/lihat", "data"=>array("id"=>$id, "sisa_hutang"=>$sisa_hutang)));
	}

	function bayar($id) {
		$sisa_hutang = $this->m_kasbon->lihat_sisa_hutang($id);

		$this->load->view("template/template", array("isi"=>"kasbon/bayar", "data"=>array("id"=>$id, "sisa_hutang"=>$sisa_hutang)));
	}

	function tambah() {
		$this->load->view("template/template", array("isi"=>"kasbon/tambah"));
	}

	function aksi_tambah() {
		$this->m_kasbon->tambah();

		redirect(base_url('kasbon'));
	}

	function aksi_bayar() {
		$this->m_kasbon->bayar();

		redirect(base_url('kasbon'));
	}

	function ajax(){
		$requestData = $_REQUEST;
		$columns = array( 
		    	0 => 'tanggal',
				1 => 'jumlah',
				2 => 'keterangan',
		);

			$query = $this->db->query("SELECT count(*) total_data FROM v_lihat_hutang where id_user = ?", array($this->session->id));

			foreach ($query->result() as $rowC) { 
				$totalData = $rowC->total_data;
				$totalFiltered = $totalData; 
			}	

		$data = array();

		if( !empty($requestData['search']['value']) ) {
			$search_value = "%" . $requestData['search']['value'] . "%";

			$query = $this->db->query("SELECT count(*) total_data FROM v_lihat_hutang WHERE id_user = ?
			and keterangan LIKE ? ",array($this->session->id,$search_value));

			foreach ($query->result() as $rowC) { 
				$totalFiltered = $rowC->total_data;
			}	

			$query = $this->db->query("SELECT * FROM v_lihat_hutang WHERE id_user = ?
			and keterangan LIKE ? 
			 ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'],array($this->session->id,$search_value));
						
		} else {	

			$query = $this->db->query("SELECT * FROM v_lihat_hutang where id_user = ?
				ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], array($this->session->id));
						
		}

		foreach ($query->result() as $row) { 
			$nestedData=array(); 
			$tanggal = $this->tanggal_indo->datetime($row->tanggal);
			$nestedData[] = $tanggal;
			$jumlah = $this->rupiah->convert_ke_rupiah($row->jumlah);
			$nestedData[] = $jumlah;
			$nestedData[] = $row->keterangan;
			
			$sisa_hutang = $this->rupiah->convert_ke_rupiah($this->m_kasbon->lihat_sisa_hutang($row->id));
			$nestedData[] = $sisa_hutang;
			
			$nestedData[] = "<p align='center'><a href='".base_url('kasbon/bayar/').$row->id."'><button class='btn btn-info'>Bayar</button></a><a href='".base_url('kasbon/lihat/').$row->id."'><button class='btn btn-info'>Lihat</button></a></p>";
			
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

	function ajax2(){
		$requestData = $_REQUEST;
		$columns = array( 
		    	0 => 'tanggal',
				1 => 'jumlah',
				2 => 'keterangan',
		);

			$query = $this->db->query("SELECT count(*) total_data FROM v_lihat_lunas where id_user = ?", array($this->session->id));

			foreach ($query->result() as $rowC) { 
				$totalData = $rowC->total_data;
				$totalFiltered = $totalData; 
			}	

		$data = array();

		if( !empty($requestData['search']['value']) ) {
			$search_value = "%" . $requestData['search']['value'] . "%";

			$query = $this->db->query("SELECT count(*) total_data FROM v_lihat_lunas WHERE id_user = ?
			and keterangan LIKE ? ",array($this->session->id,$search_value));

			foreach ($query->result() as $rowC) { 
				$totalFiltered = $rowC->total_data;
			}	

			$query = $this->db->query("SELECT * FROM v_lihat_lunas WHERE id_user = ?
			and keterangan LIKE ? 
			 ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'],array($this->session->id,$search_value));
						
		} else {	

			$query = $this->db->query("SELECT * FROM v_lihat_lunas where id_user = ?
				ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], array($this->session->id));
						
		}

		foreach ($query->result() as $row) { 
			$nestedData=array(); 
			$tanggal = $this->tanggal_indo->datetime($row->tanggal);
			$nestedData[] = $tanggal;
			$jumlah = $this->rupiah->convert_ke_rupiah($row->jumlah);
			$nestedData[] = $jumlah;
			$nestedData[] = $row->keterangan;
			$nestedData[] = "<p align='center'><a href='".base_url('kasbon/lihat/').$row->id."'><button class='btn btn-info'>Lihat</button></a></p>";
			
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

	function ajaxlihat(){
		$id = $this->input->get('id');
		$requestData = $_REQUEST;
		$columns = array( 
		    	0 => 'tanggal_pembayaran',
				1 => 'jumlah_pembayaran',
		);

			$query = $this->db->query("SELECT count(*) total_data FROM v_detil_pembayaran where id_kasbon = ?", array($id));

			foreach ($query->result() as $rowC) { 
				$totalData = $rowC->total_data;
				$totalFiltered = $totalData; 
			}	

		$data = array();

		if( !empty($requestData['search']['value']) ) {
			$search_value = "%" . $requestData['search']['value'] . "%";

			$query = $this->db->query("SELECT count(*) total_data FROM v_detil_pembayaran WHERE id_kasbon = ?",array($id));

			foreach ($query->result() as $rowC) { 
				$totalFiltered = $rowC->total_data;
			}	

			$query = $this->db->query("SELECT * FROM v_detil_pembayaran WHERE id_kasbon = ?
			 ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'],array($id));
						
		} else {	

			$query = $this->db->query("SELECT * FROM v_detil_pembayaran where id_kasbon = ?
				ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'], array($id));
						
		}

		foreach ($query->result() as $row) { 
			$nestedData=array(); 
			$tanggal = $this->tanggal_indo->datetime($row->tanggal_pembayaran);
			$nestedData[] = $tanggal;
			$jumlah = $this->rupiah->convert_ke_rupiah($row->jumlah_pembayaran);
			$nestedData[] = $jumlah;
			
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
