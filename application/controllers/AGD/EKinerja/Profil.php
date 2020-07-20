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
		$data['GetJabatanAtasan'] 		= $this->ModelProfil->GetJabatanAtasan($IdPegawai);
		$IdJabatanAtasan 				= $data['GetJabatanAtasan']->IdJabatanAtasan; //Get Id Jabatan Atasan
		$data['GetNamaAtasan'] 			= $this->ModelProfil->GetNamaAtasan($IdJabatanAtasan); //Get Nama Atasan
		$data['GetMasaKerja'] 			= $this->ModelProfil->GetMasaKerja($IdPegawai); //Get Masa Kerja
		$data['GetRiwayatPendidikanFormal'] 	= $this->ModelProfil->GetRiwayatPendidikanFormal($IdPegawai); //Get Masa Kerja
		$data['GetRiwayatKeluarga'] 	= $this->ModelProfil->GetRiwayatKeluarga($IdPegawai); //Get Masa Kerja
		$data['GetPendidikanTerakhir'] 		= $this->ModelProfil->GetPendidikanTerakhir($IdPegawai); //Get Masa Kerja
		$this->load->view('agd/ekinerja/personal/profil', $data);
	}
}