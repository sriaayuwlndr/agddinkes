<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterMasaKerja extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterMasaKerja'); 

		//MasaKerja
		//masakerja
		//Masa Kerja
	}

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 							= 'Master Masa Kerja | Kepegawaian';
		$data['HeaderTitle']					= 'Kepegawaian';
		$data['GetMasterMasaKerja'] 		= $this->ModelMasterMasaKerja->get();
		$this->load->view('agd/kepegawaian/mastermasakerja/index', $data);
	}

	public function add() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterMasaKerja->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$this->ModelMasterMasaKerja->add();
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/mastermasakerja/add'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Master Masa Kerja | Kepegawaian';
			$data['HeaderTitle']			= 'Kepegawaian';
			$this->load->view('agd/kepegawaian/mastermasakerja/add', $data); 
		}
	}

	public function edit($IdMasaKerja) //Menampilkan Form Edit Data + Mengupdate Data Yang Diedit Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterMasaKerja->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Diupdate Ke Database
			$this->ModelMasterMasaKerja->edit($IdMasaKerja);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/mastermasakerja/edit/'.$IdMasaKerja);	//Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Edit + Jika Form Tidak Lolos Validasi Maka Kembali Ke Tampilan Form Edit Data
			$data['Title'] 							= 'Master Masa Kerja | Kepegawaian';
			$data['HeaderTitle']					= 'Kepegawaian';
			$data['EditMasterMasaKerja'] 	= $this->ModelMasterMasaKerja->getById($IdMasaKerja);
			$this->load->view('agd/kepegawaian/mastermasakerja/edit', $data);
			
			if (!$data['EditMasterMasaKerja']) //Jika IDnya Diubah-ubah di URLnya, Maka di Direct ke Function Index
			{
				redirect('agd/kepegawaian/mastermasakerja');
			}			
		}		
	}	
}