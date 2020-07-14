<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/EKinerja/ModelProfil');
        $this->session->userdata('IdPegawai');
    }

	public function index()
	{
		
		$data['Title'] 					= 'Profil | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';
		$IdPegawai 						= $this->session->userdata('IdPegawai');
		$data['GetProfilPegawai'] 		= $this->ModelProfil->get($IdPegawai);
		$this->load->view('agd/ekinerja/personal/profil', $data);
	}
}