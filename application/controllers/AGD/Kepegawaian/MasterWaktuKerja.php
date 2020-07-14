<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterWaktuKerja extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterWaktuKerja');
	}

	//WaktuKerja
	//waktukerja
	//Waktu Kerja

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 							= 'Master WaktuKerja | Kepegawaian';
		$data['HeaderTitle']					= 'Kepegawaian';
		$data['GetMasterWaktuKerja'] 		= $this->ModelMasterWaktuKerja->get();
		$this->load->view('agd/kepegawaian/masterwaktukerja/index', $data);
	}

	public function add() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterWaktuKerja->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$this->ModelMasterWaktuKerja->add();
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterwaktukerja/add'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Master WaktuKerja | Kepegawaian';
			$data['HeaderTitle']			= 'Kepegawaian';
			$this->load->view('agd/kepegawaian/masterwaktukerja/add', $data); 
		}
	}

	public function edit($IdWaktuKerja) //Menampilkan Form Edit Data + Mengupdate Data Yang Diedit Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterWaktuKerja->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Diupdate Ke Database
			$this->ModelMasterWaktuKerja->edit($IdWaktuKerja);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterwaktukerja/edit/'.$IdWaktuKerja);	//Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Edit + Jika Form Tidak Lolos Validasi Maka Kembali Ke Tampilan Form Edit Data
			$data['Title'] 							= 'Master WaktuKerja | Kepegawaian';
			$data['HeaderTitle']					= 'Kepegawaian';
			$data['EditMasterWaktuKerja'] 	= $this->ModelMasterWaktuKerja->getById($IdWaktuKerja);
			$this->load->view('agd/kepegawaian/masterwaktukerja/edit', $data);
			
			if (!$data['EditMasterWaktuKerja']) //Jika IDnya Diubah-ubah di URLnya, Maka di Direct ke Function Index
			{
				redirect('agd/kepegawaian/masterwaktukerja');
			}			
		}		
	}	
}