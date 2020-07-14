<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->model('ModelLaporan');
	}

	public function GajiPokok() //MENAMPILKAN SEMUA LAPORAN GAJI PEGAWAI
	{
		$data['GetLaporanGajiPokok'] 		= $this->ModelLaporan->getHitungGajiPokok();
		$data['GetBulan'] 					= $this->ModelLaporan->getBulan();
		$data['GetTahun'] 					= $this->ModelLaporan->getTahun();
		$this->load->view('admin/laporan/gajipokok', $data);
	}

	public function Gaji() //MENAMPILKAN SEMUA LAPORAN GAJI PEGAWAI
	{
		$data['GetLaporanGaji'] 			= $this->ModelLaporan->getHitungGaji();
		$data['GetBulan'] 					= $this->ModelLaporan->getBulan();
		$data['GetTahun'] 					= $this->ModelLaporan->getTahun();
		$this->load->view('admin/laporan/gaji', $data);
	}

	public function Tunjangan()
	{
		$data['GetLaporanTunjangan'] 		= $this->ModelLaporan->getHitungTunjangan();
		$this->load->view('admin/laporan/tunjangan', $data);
	}

}