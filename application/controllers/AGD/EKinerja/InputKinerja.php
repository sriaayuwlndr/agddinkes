<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputKinerja extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/EKinerja/ModelInputKinerja');
        $this->session->userdata('IdPegawai');
    }

    public function index()
	{
		$IdPegawai 					= $this->session->userdata('IdPegawai');
		$data['Title'] 				= 'Input Kinerja | E-Kinerja';
		$data['HeaderTitle'] 		= 'E-Kinerja';
		$data['GetAktivitasUtama']	= $this->ModelInputKinerja->GetAktivitasUtama($IdPegawai);
		$data['GetAktivitasUmum']	= $this->ModelInputKinerja->GetAktivitasUmum();
		$data['DaftarAktivitas']	= $this->ModelInputKinerja->DaftarAktivitas($IdPegawai);
		$this->load->view('agd/ekinerja/kinerja/inputkinerja', $data);
	}

	public function AddAktivitasUtama()
	{
		$IdPegawai 						= $this->session->userdata('IdPegawai');
        // $TanggalKinerja            		= $this->input->post('TanggalKinerja');
		// var_dump($TanggalKinerja);
		// die;
		$this->ModelInputKinerja->AddAktivitas($IdPegawai);

		$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
		redirect('agd/ekinerja/inputkinerja');


		// $validasi = $this->form_validation->set_rules($this->ModelInputKinerja->rules());

		// if ($validasi->run()) 
		// {
		// 	//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
		// 	$IdPegawai 						= $this->session->userdata('IdPegawai');
		// 	$this->ModelInputKinerja->AddAktivitas($IdPegawai);
		// 	$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
		// 	redirect('agd/ekinerja/inputkinerja'); //Redirect Biar Gak Resubmission
		// }

		// else
		// {
		// 	$IdPegawai 					= $this->session->userdata('IdPegawai');
		// 	$data['Title'] 				= 'Input Kinerja | E-Kinerja';
		// 	$data['HeaderTitle'] 		= 'E-Kinerja';
		// 	$data['GetAktivitasUtama']	= $this->ModelInputKinerja->GetAktivitasUtama($IdPegawai);
		// 	$data['GetAktivitasUmum']	= $this->ModelInputKinerja->GetAktivitasUmum();
		// 	$data['DaftarAktivitas']	= $this->ModelInputKinerja->DaftarAktivitas($IdPegawai);
		// 	$this->load->view('agd/ekinerja/kinerja/inputkinerja', $data);
		// }
	}

}