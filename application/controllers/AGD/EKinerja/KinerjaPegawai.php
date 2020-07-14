<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KinerjaPegawai extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
    }  

	public function index()
	{
		$data['title'] = 'EKinerja | E-Kinerja AGD';
		$data['HeaderTitle'] 		= 'E-Kinerja';
		$this->load->view('agd/ekinerja/kinerjapegawai/index', $data);
	}

}