<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterMesinFingerPrint extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterMesinFingerPrint');
	}

	//FingerPrint

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 							= 'Master MesinFingerPrint | Kepegawaian';
		$data['HeaderTitle']					= 'Kepegawaian';
		$data['GetMasterMesinFingerPrint'] 		= $this->ModelMasterMesinFingerPrint->get();
		$this->load->view('agd/kepegawaian/mastermesinfingerprint/index', $data);
	}
}