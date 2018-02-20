<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_user');		
	}

	function index() {
		$data_user = $this->m_user->ambil_data_user($this->session->id);

		$this->load->view("template/template", array("isi"=>"user/index", "data"=>$data_user));
	}

	function tambah(){
		$this->load->view('template/template',array("isi" => "user/tambah"));
	}

	function aksi_tambah(){
		if ($this->input->post('nama') == null || $this->input->post('username') == null || $this->input->post('password') == null) {
			redirect(base_url('user/tambah?kosong=1'));
		}

		$this->m_user->tambah_user();
		
		redirect(base_url('user'));	
	}

	function ubah($id=null){
		$this->load->view('template/template',array("isi" => "user/ubah", "data" => array("id" => $id)));
	}

	function aksi_ubah(){
		$this->m_user->ubah_user();
		
		redirect(base_url('user'));	
	}

	function ganti_password($id=null){
		$this->load->view('template/template',array("isi" => "user/ganti_password", "data" => array("id" => $id)));
	}

	function aksi_ganti_password(){
		$this->m_user->ganti_password();
		
		redirect(base_url('user'));	
	}

	function hapus($id=null){
		$this->load->view('template/template',array("isi" => "user/hapus", "data" => array("id" => $id)));
	}

	function aksi_hapus(){
		$this->m_user->hapus_user();
		
		redirect(base_url('user'));	
	}

	function ajax(){
		$requestData = $_REQUEST;
		$columns = array( 
		    	0 => 'nama',
				1 => 'username',
		);

			$query = $this->db->query("SELECT count(*) total_data FROM user");

			foreach ($query->result() as $rowC) { 
				$totalData = $rowC->total_data;
				$totalFiltered = $totalData; 
			}	

		$data = array();

		if( !empty($requestData['search']['value']) ) {
			$search_value = "%" . $requestData['search']['value'] . "%";

			$query = $this->db->query("SELECT count(*) total_data FROM user WHERE 
			nama LIKE ? 
			OR username LIKE ? ",array($search_value,$search_value));

			foreach ($query->result() as $rowC) { 
				$totalFiltered = $rowC->total_data;
			}	

			$query = $this->db->query("SELECT * FROM user WHERE 
			nama LIKE ? 
			OR username LIKE ?  
			 ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length'],array($search_value,$search_value));
						
		} else {	

			$query = $this->db->query("SELECT * FROM user
				ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']);
						
		}

		foreach ($query->result() as $row) { 
			$nestedData=array(); 
			$id_user = $row->id;
			$nestedData[] = $row->nama;
			$nestedData[] = $row->username;
			$nestedData[] = "<p align='center'>
			<a href='".base_url('user/ubah/').$id_user."'><button class='btn btn-info'>Ubah</button></a> | <a href='".base_url('user/hapus/').$id_user."'><button class='btn btn-danger'>Hapus</button></a>
			</p>";
			
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
