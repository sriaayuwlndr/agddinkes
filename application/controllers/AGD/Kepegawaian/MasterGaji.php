<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterGaji extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterGaji');
	}

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 				= 'Master Gaji | Kepegawaian';
		$data['HeaderTitle']		= 'Kepegawaian';
		$data['GetMasterGaji'] 		= $this->ModelMasterGaji->get();
		$this->load->view('agd/kepegawaian/mastergaji/index', $data);
	}
}