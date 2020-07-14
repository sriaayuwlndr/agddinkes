<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterAgama extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterAgama');
	}

	public function index() //Menampilkan Semua Data
	{
		$data['Title'] 					= 'Master Agama | Kepegawaian';
		$data['HeaderTitle']			= 'Kepegawaian';
		$data['GetMasterAgama'] 		= $this->ModelMasterAgama->get();
		$this->load->view('agd/kepegawaian/masteragama/index', $data);
	}

	public function add() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterAgama->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$this->ModelMasterAgama->add();
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masteragama/add'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Master Agama | Kepegawaian';
			$data['HeaderTitle']			= 'Kepegawaian';
			$this->load->view('agd/kepegawaian/masteragama/add', $data); 
		}
	}

	public function edit($IdAgama) //Menampilkan Form Edit Data + Mengupdate Data Yang Diedit Ke Database
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterAgama->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Diupdate Ke Database
			$this->ModelMasterAgama->edit($IdAgama);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/kepegawaian/masteragama/edit/'.$IdAgama);	//Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Edit + Jika Form Tidak Lolos Validasi Maka Kembali Ke Tampilan Form Edit Data
			$data['Title'] 					= 'Master Agama | Kepegawaian';
			$data['HeaderTitle']			= 'Kepegawaian';
			$data['EditMasterAgama'] 		= $this->ModelMasterAgama->getById($IdAgama);
			$this->load->view('agd/kepegawaian/masteragama/edit', $data);
			
			if (!$data['EditMasterAgama']) //Jika IDnya Diubah-ubah di URLnya, Maka di Direct ke Function Index
			{
				redirect('agd/kepegawaian/masteragama');
			}			
		}		
	}

	public function LiveEdit() //Live Editable Kolom
	{
		If($_SERVER['REQUEST_METHOD']  != 'POST'  )
		{
            redirect('agd/kepegawaian/masteragama');
        }

		$this->ModelMasterAgama->LiveEdit();
		echo "Data Berhasil Di Edit";		
	}	
}