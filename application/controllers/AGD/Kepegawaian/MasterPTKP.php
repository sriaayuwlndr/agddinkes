<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterPTKP extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterPTKP');
	}

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 							= 'Master PTKP | Kepegawaian';
		$data['HeaderTitle']					= 'Kepegawaian';
		$data['GetMasterPTKP'] 		= $this->ModelMasterPTKP->get();
		$this->load->view('agd/kepegawaian/masterptkp/index', $data);
	}

	public function add() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterPTKP->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$this->ModelMasterPTKP->add();
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterptkp/add'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Master PTKP | Kepegawaian';
			$data['HeaderTitle']			= 'Kepegawaian';
			$this->load->view('agd/kepegawaian/masterptkp/add', $data); 
		}
	}

	public function edit($IdPTKP) //Menampilkan Form Edit Data + Mengupdate Data Yang Diedit Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterPTKP->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Diupdate Ke Database
			$this->ModelMasterPTKP->edit($IdPTKP);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterptkp/edit/'.$IdPTKP);	//Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Edit + Jika Form Tidak Lolos Validasi Maka Kembali Ke Tampilan Form Edit Data
			$data['Title'] 							= 'Master PTKP | Kepegawaian';
			$data['HeaderTitle']					= 'Kepegawaian';
			$data['EditMasterPTKP'] 	= $this->ModelMasterPTKP->getById($IdPTKP);
			$this->load->view('agd/kepegawaian/masterptkp/edit', $data);
			
			if (!$data['EditMasterPTKP']) //Jika IDnya Diubah-ubah di URLnya, Maka di Direct ke Function Index
			{
				redirect('agd/kepegawaian/masterptkp');
			}			
		}		
	}	
}