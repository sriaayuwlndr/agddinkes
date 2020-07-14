<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogKehadiran extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelLogKehadiran');
	}

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 					= 'Master Log Kehadiran | Kepegawaian';
		$data['HeaderTitle']			= 'Kepegawaian';
		$data['GetLogKehadiran'] 		= $this->ModelLogKehadiran->get();
		$this->load->view('agd/kepegawaian/logkehadiran/index', $data);
	}
}