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
		$data['Title'] 			= 'Dashboard | E-Kinerja';
		$data['HeaderTitle'] 	= 'E-Kinerja';
		$this->load->view('agd/ekinerja/dashboard/index', $data);
	}

}