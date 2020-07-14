<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputKinerjaUtama extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/EKinerja/ModelInputKinerjaUtama');
        $this->session->userdata('IdPegawai');
    }

	public function index()
	{
		// $data['GetAktivitasUtama'] 	= $this->ModelInputKinerjaUtama->getAktivitasUtama($IdPegawai);

		$IdPegawai 					= $this->session->userdata('IdPegawai');

		$sql 						= "SELECT MasterMappingAktivitas.IdAktivitas, MasterAktivitas.Aktivitas, MasterAktivitas.WaktuEfektif FROM MasterMappingAktivitas INNER JOIN MasterAktivitas ON MasterMappingAktivitas.IdAktivitas = MasterAktivitas.IdAktivitas WHERE (MasterMappingAktivitas.IdPegawai = '$IdPegawai')";
 		$data['GetAktivitasUtama'] 	= $this->db->query($sql)->result_array();

		$data['Title'] 				= 'Input Kinerja Utama | E-Kinerja';
		$data['HeaderTitle'] 		= 'E-Kinerja';
		$this->load->view('agd/ekinerja/kinerja/inputkinerjautama', $data);
	}

	public function add()
	{
		$validasi = $this->form_validation->set_rules($this->ModelInputKinerjaUtama->rules());

		if ($validasi->run()) 
		{
			//Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
			$IdPegawai 						= $this->session->userdata('IdPegawai');
			$this->ModelInputKinerjaUtama->add($IdPegawai);
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
			redirect('agd/ekinerja/inputkinerjautama'); //Redirect Biar Gak Resubmission
		}

		else

		{
			//Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
			// $IdPegawai 					= $this->session->userdata('IdPegawai');
			// $data['Title'] 				= 'Input Kinerja Utama | E-Kinerja';
			// $data['HeaderTitle'] 		= 'E-Kinerja';
			// $data['GetAktivitasUtama'] 	= $this->ModelInputKinerjaUtama->getAktivitasUtama($IdPegawai);
			// $this->load->view('agd/ekinerja/kinerja/inputkinerjautama', $data); 

			$IdPegawai 					= $this->session->userdata('IdPegawai');
			$sql 						= "SELECT MasterMappingAktivitas.IdAktivitas, MasterAktivitas.Aktivitas FROM MasterMappingAktivitas INNER JOIN MasterAktivitas ON MasterMappingAktivitas.IdAktivitas = MasterAktivitas.IdAktivitas WHERE (MasterMappingAktivitas.IdPegawai = '$IdPegawai')";
	 		$data['GetAktivitasUtama'] 	= $this->db->query($sql)->result_array();
			$data['Title'] 				= 'Input Kinerja Utama | E-Kinerja';
			$data['HeaderTitle'] 		= 'E-Kinerja';
			$this->load->view('agd/ekinerja/kinerja/inputkinerjautama', $data);
		}
		
	}
}