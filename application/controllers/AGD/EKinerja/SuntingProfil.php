<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuntingProfil extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/EKinerja/ModelSuntingProfil');
        $this->session->userdata('IdPegawai');
    }

	public function index()
	{
		$data['Title'] 					= 'Sunting Profil | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';
		$IdPegawai 						= $this->session->userdata('IdPegawai');
		$data['GetSuntingProfil'] 		= $this->ModelSuntingProfil->get($IdPegawai);
		$data['GetAgama'] 				= $this->ModelSuntingProfil->GetAgama();
		$data['GetRiwayatKeluarga'] 	= $this->ModelSuntingProfil->GetRiwayatKeluarga($IdPegawai);
		$this->load->view('agd/ekinerja/personal/suntingprofil', $data);
	}

	public function add()
	{
		$validasi = $this->form_validation->set_rules($this->ModelSuntingProfil->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$this->ModelSuntingProfil->add(IdPegawai);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/ekinerja/suntingprofil'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Sunting Profil | E-Kinerja';
			$data['HeaderTitle'] 			= 'E-Kinerja';
			$IdPegawai 						= $this->session->userdata('IdPegawai');
			$data['GetSuntingProfil'] 		= $this->ModelSuntingProfil->get($IdPegawai);
			$data['GetRiwayatKeluarga'] 	= $this->ModelSuntingProfil->GetRiwayatKeluarga($IdPegawai);
			$this->load->view('agd/ekinerja/personal/suntingprofil', $data); 
		}
	}

	public function SubmitSuntingProfil()
	{
		$validasi = $this->form_validation->set_rules($this->ModelSuntingProfil->rulesProfil());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			// $IdPegawai 						= $this->session->userdata('IdPegawai');
			$this->ModelSuntingProfil->SubmitSuntingProfil(IdPegawai);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/ekinerja/suntingprofil'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Sunting Profil | E-Kinerja';
			$data['HeaderTitle'] 			= 'E-Kinerja';
			$IdPegawai 						= $this->session->userdata('IdPegawai');
			$data['GetSuntingProfil'] 		= $this->ModelSuntingProfil->get($IdPegawai);
			$data['GetAgama'] 				= $this->ModelSuntingProfil->GetAgama();
			$data['GetRiwayatKeluarga'] 	= $this->ModelSuntingProfil->GetRiwayatKeluarga($IdPegawai);
			$this->load->view('agd/ekinerja/personal/suntingprofil', $data);
		}
	}
}