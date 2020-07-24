<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenilaianKinerja extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/PenilaianKinerja/ModelPenilaianKinerja');
        $this->session->userdata('IdPegawai');
    }

	public function index()
	{
		
		$data['Title'] 					= 'Penilaian Kinerja Bawahan | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';
		$IdPegawai 						= $this->session->userdata('IdPegawai');
		$GetJabatan						= $this->ModelPenilaianKinerja->getJabatan($IdPegawai);
		$IdJabatan 						= $GetJabatan->IdJabatan;
		$data['GetBawahan'] 			= $this->ModelPenilaianKinerja->getBawahan($IdJabatan);
		// var_dump($data['GetBawahan']);
		// die;
		$data['GetBulan'] 				= $this->ModelPenilaianKinerja->GetBulan();
		$data['GetTahun'] 				= $this->ModelPenilaianKinerja->GetTahun();
		$this->load->view('agd/penilaiankinerja/penilaiankinerja/index', $data);
	}

	public function PenilaianAktivitas($IdPegawai)
	{
		$data['Title'] 					= 'Penilaian Kinerja Bawahan | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';



		if(!empty($this->input->post('tgl')) && ($this->input->post('tgl') <> ""))
		{

			$Bulan = date('m', strtotime($this->input->post('tgl')));
			$Tahun = date('Y', strtotime($this->input->post('tgl')));
		}

		else
		{
			$Bulan = date('m');
			$Tahun = date('Y');
		}

		$data['GetKinerjaPegawai'] 		= $this->ModelPenilaianKinerja->GetKinerjaPegawai($IdPegawai, $Bulan, $Tahun);
		$data['GetPegawai'] 					= $this->ModelPenilaianKinerja->GetPegawai($IdPegawai);
		$this->load->view('agd/penilaiankinerja/penilaiankinerja/penilaianaktivitas', $data);
	}

	public function ValidasiAktivitas($IdKinerja)
	{
		$GetIdPegawai 					= $this->ModelPenilaianKinerja->ValidasiAktivitas($IdKinerja);
		$IdPegawai 						= $GetIdPegawai['IdPegawai'];
		redirect('agd/ekinerja/penilaiankinerja/penilaianaktivitas/'.$IdPegawai);
	}

	public function BatalValidasiAktivitas($IdKinerja)
	{
		$GetIdPegawai 					= $this->ModelPenilaianKinerja->BatalValidasiAktivitas($IdKinerja);
		$IdPegawai 						= $GetIdPegawai['IdPegawai'];
		redirect('agd/ekinerja/penilaiankinerja/penilaianaktivitas/'.$IdPegawai);
	}

	public function PenilaianPerilaku()
	{
		$validasi = $this->form_validation->set_rules($this->ModelPenilaianKinerja->rulesPenilaianPerilaku());

		if ($validasi->run()) 
		{
			$IdPegawaiSubmit = $this->session->userdata('IdPegawai'); //Get Id Pegawai Yang Mau Submit Perilaku
        	$this->ModelPenilaianKinerja->AddPenilaianPerilaku($IdPegawaiSubmit);
        	$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Penilaian Perilaku berhasil diinput!</div>');
			redirect('agd/ekinerja/penilaiankinerja'); //Redirect Biar Gak Resubmission
		}

		else
		{
			$data['Title'] 					= 'Penilaian Kinerja Bawahan | E-Kinerja';
			$data['HeaderTitle'] 			= 'E-Kinerja';
			$IdPegawai 						= $this->session->userdata('IdPegawai');
			$GetJabatan						= $this->ModelPenilaianKinerja->getJabatan($IdPegawai);
			$IdJabatan 						= $GetJabatan->IdJabatan;
			$data['GetBawahan'] 			= $this->ModelPenilaianKinerja->getBawahan($IdJabatan);
			$data['GetBulan'] 				= $this->ModelPenilaianKinerja->GetBulan();
			$data['GetTahun'] 				= $this->ModelPenilaianKinerja->GetTahun();
			$this->load->view('agd/penilaiankinerja/penilaiankinerja/index', $data);
		}
	}
















	public function detail($IdPegawai)
	{
		$validasi = $this->form_validation->set_rules($this->ModelValidasiKinerja->rules());

		if ($validasi->run()) 
		{
        	$IdAktivitas               	= $this->input->post('IdAktivitas');
			$CekMappingAktivitas 		= $this->ModelValidasiKinerja->CekMappingAktivitas($IdPegawai, $IdAktivitas);
			if($CekMappingAktivitas)
			{
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Aktivitas Sudah Diinput!</div>');
				redirect('agd/ekinerja/settingaktivitasbawahan/detail/'.$IdPegawai); //Redirect Biar Gak Resubmission
			}

			else
			{
				$this->ModelValidasiKinerja->add($IdPegawai);
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
				redirect('agd/ekinerja/settingaktivitasbawahan/detail/'.$IdPegawai); //Redirect Biar Gak Resubmission
			}
		}

		else
		{
			$data['Title'] 							= 'Setting Aktivitas Bawahan | E-Kinerja';
			$data['HeaderTitle'] 					= 'E-Kinerja';
			$data['GetMappingAktivitas'] 			= $this->ModelSettingAktivitasBawahan->GetMappingAktivitas($IdPegawai);
			$data['GetPegawai'] 					= $this->ModelSettingAktivitasBawahan->GetPegawai($IdPegawai);
			$data['GetAktivitas'] 					= $this->ModelSettingAktivitasBawahan->getAktivitas();
			$this->load->view('agd/penilaiankinerja/settingaktivitasbawahan/detail', $data);
		}
	}

	// public function add($IdPegawai)
	// {

		
	// 		// $data['IdPegawai'] = $IdPegawai;
	// 		$data['Title'] 							= 'Setting Aktivitas Bawahan | E-Kinerja';
	// 		$data['HeaderTitle'] 					= 'E-Kinerja';
	// 		$data['GetMappingAktivitas'] 			= $this->ModelSettingAktivitasBawahan->GetMappingAktivitas($IdPegawai);
	// 		$data['GetPegawai'] 					= $this->ModelSettingAktivitasBawahan->GetPegawai($IdPegawai);
	// 		$data['GetAktivitas'] 					= $this->ModelSettingAktivitasBawahan->getAktivitas();
			
	// 		$this->load->view('agd/penilaiankinerja/settingaktivitasbawahan/detail', $data);
			
	// }
}