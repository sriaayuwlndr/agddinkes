<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterGajiPokok extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->model('ModelMasterGajiPokok');
	}

	public function index() //MENAMPILKAN SEMUA DATA MASTER GAJI
	{
		$data['GetMasterGajiPokok'] 		= $this->ModelMasterGajiPokok->get();
		$this->load->view('admin/mastergajipokok/index', $data);
	}
}