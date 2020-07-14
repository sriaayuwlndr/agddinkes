<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterHubunganKeluarga extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterHubunganKeluarga');

		//Keluarga

		//keluarga
	}

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 							= 'Master Hubungan Keluarga | Kepegawaian';
		$data['HeaderTitle']					= 'Kepegawaian';
		$data['GetMasterHubunganKeluarga'] 				= $this->ModelMasterHubunganKeluarga->get();
		$this->load->view('agd/kepegawaian/masterhubungankeluarga/index', $data);
	}

	public function add() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterHubunganKeluarga->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$this->ModelMasterHubunganKeluarga->add();
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterhubungankeluarga/add'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Master HubunganKeluarga | Kepegawaian';
			$data['HeaderTitle']			= 'Kepegawaian';
			$this->load->view('agd/kepegawaian/masterhubungankeluarga/add', $data); 
		}
	}

	public function edit($IdHubunganKeluarga) //Menampilkan Form Edit Data + Mengupdate Data Yang Diedit Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterHubunganKeluarga->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Diupdate Ke Database
			$this->ModelMasterHubunganKeluarga->edit($IdHubunganKeluarga);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterhubungankeluarga/edit/'.$IdHubunganKeluarga);	//Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Edit + Jika Form Tidak Lolos Validasi Maka Kembali Ke Tampilan Form Edit Data
			$data['Title'] 							= 'Master HubunganKeluarga | Kepegawaian';
			$data['HeaderTitle']					= 'Kepegawaian';
			$data['EditMasterHubunganKeluarga'] 	= $this->ModelMasterHubunganKeluarga->getById($IdHubunganKeluarga);
			$this->load->view('agd/kepegawaian/masterhubungankeluarga/edit', $data);
			
			if (!$data['EditMasterHubunganKeluarga']) //Jika IDnya Diubah-ubah di URLnya, Maka di Direct ke Function Index
			{
				redirect('agd/kepegawaian/masterhubungankeluarga');
			}			
		}		
	}	
}