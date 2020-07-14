<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterJabatan extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterJabatan');
	}

	//Jabatan
	//jabatan
	
	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 							= 'Master Jabatan | Kepegawaian';
		$data['HeaderTitle']					= 'Kepegawaian';
		$data['GetMasterJabatan'] 		= $this->ModelMasterJabatan->get();
		$this->load->view('agd/kepegawaian/masterjabatan/index', $data);
	}

	public function add() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterJabatan->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$this->ModelMasterJabatan->add();
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterjabatan/add'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Master Jabatan | Kepegawaian';
			$data['HeaderTitle']			= 'Kepegawaian';
			$this->load->view('agd/kepegawaian/masterjabatan/add', $data); 
		}
	}

	public function edit($IdJabatan) //Menampilkan Form Edit Data + Mengupdate Data Yang Diedit Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterJabatan->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Diupdate Ke Database
			$this->ModelMasterJabatan->edit($IdJabatan);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterjabatan/edit/'.$IdJabatan);	//Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Edit + Jika Form Tidak Lolos Validasi Maka Kembali Ke Tampilan Form Edit Data
			$data['Title'] 							= 'Master Jabatan | Kepegawaian';
			$data['HeaderTitle']					= 'Kepegawaian';
			$data['EditMasterJabatan'] 	= $this->ModelMasterJabatan->getById($IdJabatan);
			$this->load->view('agd/kepegawaian/masterjabatan/edit', $data);
			
			if (!$data['EditMasterJabatan']) //Jika IDnya Diubah-ubah di URLnya, Maka di Direct ke Function Index
			{
				redirect('agd/kepegawaian/masterjabatan');
			}			
		}		
	}	
}