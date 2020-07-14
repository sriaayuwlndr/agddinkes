<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatKehadiran extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/EKinerja/ModelRiwayatKehadiran');
        $this->session->userdata('IdPegawai');
    }

	public function index()
	{		
		$data['Title'] 					= 'Riwayat Kehadiran | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';
		$IdPegawai 						= $this->session->userdata('IdPegawai');
		$data['GetRiwayatKehadiran'] 	= $this->ModelRiwayatKehadiran->get($IdPegawai);
		$this->load->view('agd/ekinerja/kehadiran/riwayatkehadiran', $data);
	}

	// RiwayatKehadiran
	// Riwayat Kehadiran
}