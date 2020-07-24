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
		// $data['GetDaftarAktivitasByTanggalKinerja']	= $this->ModelInputKinerja->GetDaftarAktivitasByTanggalKinerja($IdPegawai, $TanggalKinerja);
		$this->load->view('agd/ekinerja/kinerja/inputkinerja', $data);
	}

	public function AddAktivitas()
	{
		$validasi 				= $this->form_validation->set_rules($this->ModelInputKinerja->rules());
		$JamMulai               = $this->input->post('JamMulai');
        $JamSelesai             = $this->input->post('JamSelesai');
        $TanggalKinerja         = $this->input->post('TanggalKinerja');
        $TanggalHariIni			= date('yy-m-d');

		if ($validasi->run())
		{
			if($TanggalKinerja <= $TanggalHariIni) //Tanggal Kinerja Tidak Boleh Lebih dari hari ini
			{
				if($JamSelesai > $JamMulai) // Jam Selesai Gak Boleh Lebih Awal dari Jam Mulai
				{
					$IdPegawai 						= $this->session->userdata('IdPegawai');
					$this->ModelInputKinerja->AddAktivitas($IdPegawai);
					$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Aktivitas Berhasil Diinput!</div>');
					redirect('agd/ekinerja/inputkinerja');
				}

				else
				{
					$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Gagal! Jam Selesai tidak boleh lebih awal dari Jam Mulai</div>');
					redirect('agd/ekinerja/inputkinerja');
				}
			}

			else
			{
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Gagal! Anda hanya bisa menginput kinerja sampai hari ini!</div>');
				redirect('agd/ekinerja/inputkinerja');	
			}
		}

		else
		{
			$IdPegawai 					= $this->session->userdata('IdPegawai');
			$data['Title'] 				= 'Input Kinerja | E-Kinerja';
			$data['HeaderTitle'] 		= 'E-Kinerja';
			$data['GetAktivitasUtama']	= $this->ModelInputKinerja->GetAktivitasUtama($IdPegawai);
			$data['GetAktivitasUmum']	= $this->ModelInputKinerja->GetAktivitasUmum();
			$data['DaftarAktivitas']	= $this->ModelInputKinerja->DaftarAktivitas($IdPegawai);
			$this->load->view('agd/ekinerja/kinerja/inputkinerja', $data);
		}
	}

}