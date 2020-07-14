<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CapaianKinerja extends CI_Controller
{
	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
        $this->load->model('AGD/EKinerja/ModelCapaianKinerja');
        $this->session->userdata('IdPegawai');
    }

	public function index()
	{
		$data['Title'] 					= 'Capaian Kinerja Bawahan | E-Kinerja';
		$data['HeaderTitle'] 			= 'E-Kinerja';
		$IdPegawai 						= $this->session->userdata('IdPegawai');

		if(!empty($this->input->post('tgl')) && ($this->input->post('tgl') <> ""))
		{

			$Bulan = date('m', strtotime($this->input->post('tgl')));
			$Tahun = date('Y', strtotime($this->input->post('tgl')));
			$TanggalHariIni = date('Y-m-d', strtotime($this->input->post('tgl')));
		}

		else
		{
			$Bulan = date('m');
			// var_dump($Bulan);
			// die;
			$Tahun = date('Y');
			$TanggalHariIni = date('Y-m-d');
		}

		$GetIdStatusPegawai = $this->ModelCapaianKinerja->GetIdStatusPegawai($IdPegawai);
		$GetIdStatusPegawai = $GetIdStatusPegawai['IdStatusPegawai'];

		if ($GetIdStatusPegawai == 2)
		{
			$TanggalPertama = date('Y-m-01', strtotime($TanggalHariIni));
			$TanggalTerakhir = date('Y-m-t', strtotime($TanggalHariIni));

			$Begin 	= new DateTime($TanggalPertama);
			$End 	= new DateTime($TanggalTerakhir);

			$DataRange = new DatePeriod($Begin, new DateInterval('P1D'), $End);
			
			$i 		= 0;
			$X 		= 0;
			$End 	= 1;

			foreach($DataRange as $date)
			{
				$DataRange     	= $date->format("Y-m-d");
				$datetime     	= DateTime::createFromFormat('Y-m-d', $DataRange);

				//Convert tanggal untuk mendapatkan nama hari
				$day         	= $datetime->format('D');

				//Check untuk menghitung yang bukan hari sabtu dan minggu
				if($day!="Sun" && $day!="Sat" )
				{
					//echo $i;
					$X    +=    $End-$i;

				}

				$HariLibur 			= 0; // count hari libur
				$JumlahHariKerja 	= $X - $HariLibur;
				$End++;
				$i++;
				
			}  

			$JamKerjaPerHari 	= 300;
			$Total 				= $JumlahHariKerja * $JamKerjaPerHari;
		}

		else
		{
			$JamKerjaPerHari	= 450;
			$JumlahHariKerja 	= 14;
			$Total 				= $JumlahHariKerja * $JamKerjaPerHari;
		}
			


		$data['GetKinerjaPegawai'] 						= $this->ModelCapaianKinerja->GetKinerjaPegawai($IdPegawai, $Bulan, $Tahun);
		$data['GetAllCapaian'] 							= $this->ModelCapaianKinerja->GetAllCapaian($IdPegawai, $Bulan, $Tahun);
		$data['GetValidasiCapaian'] 					= $this->ModelCapaianKinerja->GetValidasiCapaian($IdPegawai, $Bulan, $Tahun);
		$data['GetTotalTerlambatDanPulangCepat'] 		= $this->ModelCapaianKinerja->GetTotalTerlambatDanPulangCepat($IdPegawai, $Bulan, $Tahun);
		$data['BatasMaksimal'] 							= $Total;
		$data['JumlahHariKerja'] 						= $JumlahHariKerja;
		$data['JamKerjaPerHari'] 						= $JamKerjaPerHari;
		$data['GetPenambahanCapaianWaktuEfektif'] 		= $this->ModelCapaianKinerja->GetPenambahanCapaianWaktuEfektif($IdPegawai, $Bulan, $Tahun);

		$data['GetJumlahPenambahanCapaianWaktuEfektif']	= $this->ModelCapaianKinerja->GetJumlahPenambahanCapaianWaktuEfektif($IdPegawai, $Bulan, $Tahun);

		$data['GetPenguranganCapaianWaktuEfektif'] 		= $this->ModelCapaianKinerja->GetPenguranganCapaianWaktuEfektif($IdPegawai, $Bulan, $Tahun);

		$data['GetJumlahPenguranganCapaianWaktuEfektif'] = $this->ModelCapaianKinerja->GetJumlahPenguranganCapaianWaktuEfektif($IdPegawai, $Bulan, $Tahun);

		$data['GetSerapan'] 							= $this->db->get_where('RiwayatSerapan', ['Bulan'=>$Bulan, 'Tahun'=>$Tahun])->row_array();
		// $query = $this->db->query("SELECT IdSerapan, Bulan, Tahun, NilaiSerapan FROM  RiwayatSerapan WHERE  (Bulan = $Bulan) AND (Tahun = $Tahun)";
		// var_dump($data['GetSerapan']);
		// echo $query;
		// die;

		$this->load->view('agd/ekinerja/kinerja/capaiankinerja', $data);
	}

















	public function detail($IdPegawai)
	{
		$validasi = $this->form_validation->set_rules($this->ModelValidasiKinerja->rules());

		if ($validasi->run()) 
		{
        	$IdAktivitas               	= $this->input->post('IdAktivitas');
			$CekMappingAktivitas 		= $this->ModelValidasiKinerja->CekMappingAktivitas($IdPegawai, $IdAktivitas);
			if($CekMappingAktivitas)
			{
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Aktivitas Sudah Diinput!</div>');
				redirect('agd/ekinerja/settingaktivitasbawahan/detail/'.$IdPegawai); //Redirect Biar Gak Resubmission
			}

			else
			{
				$this->ModelValidasiKinerja->add($IdPegawai);
				$this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
				redirect('agd/ekinerja/settingaktivitasbawahan/detail/'.$IdPegawai); //Redirect Biar Gak Resubmission
			}
		}

		else
		{
			$data['Title'] 							= 'Setting Aktivitas Bawahan | E-Kinerja';
			$data['HeaderTitle'] 					= 'E-Kinerja';
			$data['GetMappingAktivitas'] 			= $this->ModelSettingAktivitasBawahan->GetMappingAktivitas($IdPegawai);
			$data['GetPegawai'] 					= $this->ModelSettingAktivitasBawahan->GetPegawai($IdPegawai);
			$data['GetAktivitas'] 					= $this->ModelSettingAktivitasBawahan->getAktivitas();
			$this->load->view('agd/penilaiankinerja/settingaktivitasbawahan/detail', $data);
		}
	}

	// public function add($IdPegawai)
	// {

		
	// 		// $data['IdPegawai'] = $IdPegawai;
	// 		$data['Title'] 							= 'Setting Aktivitas Bawahan | E-Kinerja';
	// 		$data['HeaderTitle'] 					= 'E-Kinerja';
	// 		$data['GetMappingAktivitas'] 			= $this->ModelSettingAktivitasBawahan->GetMappingAktivitas($IdPegawai);
	// 		$data['GetPegawai'] 					= $this->ModelSettingAktivitasBawahan->GetPegawai($IdPegawai);
	// 		$data['GetAktivitas'] 					= $this->ModelSettingAktivitasBawahan->getAktivitas();
			
	// 		$this->load->view('agd/penilaiankinerja/settingaktivitasbawahan/detail', $data);
			
	// }
}