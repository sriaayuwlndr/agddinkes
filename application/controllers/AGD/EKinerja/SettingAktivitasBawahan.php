<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingAktivitasBawahan extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/PenilaianKinerja/ModelSettingAktivitasBawahan');
        $this->session->userdata('IdPegawai');
    }

	public function index()
	{
		
		$data['Title'] 						= 'Setting Aktivitas Bawahan | E-Kinerja';
		$data['HeaderTitle'] 				= 'E-Kinerja';
		$IdPegawai 							= $this->session->userdata('IdPegawai');
		$GetJabatan							= $this->ModelSettingAktivitasBawahan->getJabatan($IdPegawai);
		$IdJabatan 							= $GetJabatan->IdJabatan;
		// var_dump($IdJabatan);
		// die;
		$data['GetBawahan'] 				= $this->ModelSettingAktivitasBawahan->getBawahan($IdJabatan);

		// $IdPegawaiBawahan = $GetBawahan['$IdPegawai'];
		// var_dump($IdPegawaiBawahan);
		// die;
		// $data['GetTotalMappingAktivitas'] 	= $this->ModelSettingAktivitasBawahan->GetTotalMappingAktivitas($IdPegawai);
		// var_dump($data['GetTotalMappingAktivitas']);
		// die;
		$this->load->view('agd/penilaiankinerja/settingaktivitasbawahan/index', $data);
	}

	public function detail($IdPegawai)
	{
		// $data['IdPegawai'] = $IdPegawai;

		$validasi = $this->form_validation->set_rules($this->ModelSettingAktivitasBawahan->rules());

		if ($validasi->run()) 
		{
        	$IdAktivitas               	= $this->input->post('IdAktivitas');
			$CekMappingAktivitas 		= $this->ModelSettingAktivitasBawahan->CekMappingAktivitas($IdPegawai, $IdAktivitas);
			if($CekMappingAktivitas)
			{
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Aktivitas Sudah Diinput!</div>');
				redirect('agd/ekinerja/settingaktivitasbawahan/detail/'.$IdPegawai); //Redirect Biar Gak Resubmission
			}

			else
			{
				$this->ModelSettingAktivitasBawahan->add($IdPegawai);
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

	public function delete($IdPegawai)
	{
		$IdMappingAktivitas 		= $this->input->post('IdMappingAktivitas');
		$this->ModelSettingAktivitasBawahan->DeleteMappingAktivitas($IdMappingAktivitas);
		redirect('agd/ekinerja/settingaktivitasbawahan/detail/'.$IdPegawai);
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