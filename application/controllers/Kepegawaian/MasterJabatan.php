<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterJabatan extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->model('ModelMasterJabatan');
	}

	public function index() //MENAMPILKAN SEMUA DATA MASTER Jabatan
	{
		$data['GetMasterJabatan'] 		= $this->ModelMasterJabatan->get();
		$this->load->view('admin/masterjabatan/index', $data);
	}

	public function add() //MENAMPILKAN FORM TAMBAH AGAMA
	{
		$this->load->view('admin/masteragama/add');
	}

	public function submit() //MENGSUBMIT FORM TAMBAH AGAMA
	{
		$Agama					= $this->input->post('Agama');
		$StatusAktif			= $this->input->post('StatusAktif');

		// $re='select * from masterpegawai where statuaaktif='$StatusAktif'';
		$data = array
		(
			'Agama'				=> $Agama,
			'StatusAktif'		=> $StatusAktif,
		);

		if($this->ModelMasterAgama->add($data))
		{
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}
		redirect('kepegawaian/masteragama/add');
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