<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterGaji extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->model('ModelMasterGaji');
	}

	public function index() //MENAMPILKAN SEMUA DATA MASTER GAJI
	{
		$data['GetMasterGaji'] 		= $this->ModelMasterGaji->get();
		$this->load->view('admin/mastergaji/index', $data);
	}

	public function add() //MENAMPILKAN FORM TAMBAH GAJI
	{
		$data['GetMasterPendidikanFormal'] 		= $this->ModelMasterGaji->getMasterPendidikanFormal();
		$data['GetMasterMasaKerja'] 			= $this->ModelMasterGaji->getMasterMasaKerja();
		$data['GetMasterPTKP'] 					= $this->ModelMasterGaji->getMasterPTKP();
		$this->load->view('admin/mastergaji/add',$data);
	}

	public function submit() //MEN-SUBMIT FORM TAMBAH GAJI
	{
		$IdPendidikanFormal			= $this->input->post('IdPendidikanFormal');
		$IdMasaKerja				= $this->input->post('IdMasaKerja');
		$IdPTKP						= $this->input->post('IdPTKP');
		$NominalGaji				= $this->input->post('NominalGaji');

		$data = array
		(
			'IdPendidikanFormal'		=> $IdPendidikanFormal,
			'IdMasaKerja'				=> $IdMasaKerja,
			'IdPTKP'					=> $IdPTKP,
			'NominalGaji'				=> $NominalGaji,
		);

		if($this->ModelMasterGaji->add($data))
		{
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}
		redirect('kepegawaian/mastergaji/add');
	}


	public function edit($IdAgama) //MENAMPILKAN FORM EDIT
	{
		$query 						= $this->uri->segment(3);
		$data['EditMasterAgama'] 	= $this->ModelMasterAgama->edit($IdAgama);
		$this->load->view('admin/masteragama/edit', $data);
	}

	public function save($IdAgama)
	{
		$Agama					= $this->input->post('Agama');
		$StatusAktif			= $this->input->post('StatusAktif');

		$data = array
		(
			'Agama'				=> $Agama,
			'StatusAktif'		=> $StatusAktif,
		);
		
		$this->ModelMasterAgama->save($IdAgama, $data);
		$this->session->set_flashdata('success', 'Berhasil Disimpan');
		redirect('kepegawaian/masteragama/edit/'.$IdAgama);		
	}	
}