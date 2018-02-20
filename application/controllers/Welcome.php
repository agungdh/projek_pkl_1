<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_welcome');		
	}

	function index() {
		$this->load->view("template/template", array("isi"=>"coba/yakin"));
	}

}
