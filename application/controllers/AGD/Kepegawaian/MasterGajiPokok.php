<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterGajiPokok extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterGajiPokok');
	}

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 					= 'Master Gaji Pokok | Kepegawaian';
		$data['HeaderTitle']			= 'Kepegawaian';
		$data['GetMasterGajiPokok'] 	= $this->ModelMasterGajiPokok->get();
		$this->load->view('agd/kepegawaian/mastergajipokok/index', $data);
	}

	public function edit($IdPendidikanFormal,$IdMasaKerja,$IdPTKP) //Menampilkan Form Edit Data + Mengupdate Data Yang Diedit Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterGajiPokok->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Diupdate Ke Database
			$this->ModelMasterGajiPokok->edit($IdPendidikanFormal,$IdMasaKerja,$IdPTKP);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterptkp/edit/'.$IdPTKP);	//Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Edit + Jika Form Tidak Lolos Validasi Maka Kembali Ke Tampilan Form Edit Data
			$data['Title'] 							= 'Master PTKP | Kepegawaian';
			$data['HeaderTitle']					= 'Kepegawaian';
			$data['EditMasterPTKP'] 	= $this->ModelMasterGajiPokok->getById($IdPTKP);
			$this->load->view('agd/kepegawaian/masterptkp/edit', $data);
			
			if (!$data['EditMasterPTKP']) //Jika IDnya Diubah-ubah di URLnya, Maka di Direct ke Function Index
			{
				redirect('agd/kepegawaian/masterptkp');
			}			
		}		
	}
}