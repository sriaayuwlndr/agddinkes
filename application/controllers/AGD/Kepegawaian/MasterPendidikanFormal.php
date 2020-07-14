<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterPendidikanFormal extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterPendidikanFormal'); 
	}

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 							= 'Master Pendidikan Formal | Kepegawaian';
		$data['HeaderTitle']					= 'Kepegawaian';
		$data['GetMasterPendidikanFormal'] 		= $this->ModelMasterPendidikanFormal->get();
		$this->load->view('agd/kepegawaian/masterpendidikanformal/index', $data);
	}

	public function add() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterPendidikanFormal->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$this->ModelMasterPendidikanFormal->add();
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterpendidikanformal/add'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Master Pendidikan Formal | Kepegawaian';
			$data['HeaderTitle']			= 'Kepegawaian';
			$this->load->view('agd/kepegawaian/masterpendidikanformal/add', $data); 
		}
	}

	public function edit($IdPendidikanFormal) //Menampilkan Form Edit Data + Mengupdate Data Yang Diedit Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterPendidikanFormal->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Diupdate Ke Database
			$this->ModelMasterPendidikanFormal->edit($IdPendidikanFormal);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masterpendidikanformal/edit/'.$IdPendidikanFormal);	//Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Edit + Jika Form Tidak Lolos Validasi Maka Kembali Ke Tampilan Form Edit Data
			$data['Title'] 							= 'Master Pendidikan Formal | Kepegawaian';
			$data['HeaderTitle']					= 'Kepegawaian';
			$data['EditMasterPendidikanFormal'] 	= $this->ModelMasterPendidikanFormal->getById($IdPendidikanFormal);
			$this->load->view('agd/kepegawaian/masterpendidikanformal/edit', $data);
			
			if (!$data['EditMasterPendidikanFormal']) //Jika IDnya Diubah-ubah di URLnya, Maka di Direct ke Function Index
			{
				redirect('agd/kepegawaian/masterpendidikanformal');
			}			
		}		
	}	
}