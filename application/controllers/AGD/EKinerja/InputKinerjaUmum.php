<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputKinerjaUmum extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/EKinerja/ModelInputKinerjaUmum');
        $this->session->userdata('IdPegawai');
    }

	public function index()
	{
		$data['Title'] 					= 'Input Kinerja Utama | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';
		$IdPegawai 						= $this->session->userdata('IdPegawai');
		$data['GetAktivitas'] 			= $this->ModelInputKinerjaUmum->getAktivitas();
		$this->load->view('agd/ekinerja/kinerja/inputkinerjaumum', $data);
	}

	public function add()
	{
		$validasi 				= $this->form_validation->set_rules($this->ModelInputKinerjaUmum->rules());
		$JamMulai                  = $this->input->post('JamMulai');
        $JamSelesai                = $this->input->post('JamSelesai');
		

		if ($validasi->run()) 
		{
			if($JamSelesai>$JamMulai)
			{
				//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
				$IdPegawai 						= $this->session->userdata('IdPegawai');
				$this->ModelInputKinerjaUmum->add($IdPegawai);
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
				redirect('agd/ekinerja/inputkinerjaumum'); //Redirect Biar Gak Resubmission
			}
			
			else
			{
				$data['Title'] 					= 'Input Kinerja Utama | E-Kinerja';
				$data['HeaderTitle']			= 'E-Kinerja';
				$IdPegawai 						= $this->session->userdata('IdPegawai');
				$data['GetAktivitas'] 			= $this->ModelInputKinerjaUmum->getAktivitas();
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Gagal! Jam Selesai harus lebih besar dari Jam Mulai</div>');
				redirect('agd/ekinerja/inputkinerjaumum');
			}
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			$data['Title'] 					= 'Input Kinerja Utama | E-Kinerja';
			$data['HeaderTitle']			= 'E-Kinerja';
			$IdPegawai 						= $this->session->userdata('IdPegawai');
			$data['GetAktivitas'] 			= $this->ModelInputKinerjaUmum->getAktivitas();
			$this->load->view('agd/ekinerja/kinerja/inputkinerjaumum', $data); 
		}
	}
}