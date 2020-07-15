<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
    }  

	public function index()
	{
		$data['Title'] 			= 'Dashboard | Kepegawaian';
		$data['HeaderTitle'] 	= 'Kepegawaian';
		$this->load->view('agd/kepegawaian/dashboard/index', $data);
	}
}