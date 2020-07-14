<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterAgama extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
		$this->load->model('ModelMasterAgama');
	}

	public function index() //MENAMPILKAN SEMUA DATA
	{
		$data['GetMasterAgama'] 		= $this->ModelMasterAgama->get();
		$this->load->view('admin/masteragama/index', $data);
	}

	public function add() //MENAMPILKAN FORM TAMBAH DATA + MENAMBAHKAN DATA BARU KE DATABASE
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterAgama->rules());

		if ($validasi->run()) 
		{
			$Agama                  = $this->input->post('Agama');
        	$StatusAktif            = 1;
			//JIKA DATA LOLOS VALIDASI, MAKA DATA DITAMBAHKAN KE DATABASE
			// $this->ModelMasterAgama->add();
			$this->db->query("EXEC AUD_MasterAgama '', '$Agama', '$StatusAktif','A'");
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
			redirect('kepegawaian/masteragama/add'); //REDIRECT BIAR GAK RESUBMISSION
		}

		else

		{
			//MENAMPILKAN FORM TAMBAH + JIKA FORM TIDAK DIISI MAKA KEMBALI KE TAMPILAN FORM TAMBAH DATA
			$this->load->view('admin/masteragama/add'); 
		}
	}

	public function edit($IdAgama) //MENAMPILKAN FORM EDIT DATA + MENYIMPAN DATA YANG DIEDIT KE DATABASE
	{
		$validasi = $this->form_validation->set_rules($this->ModelMasterAgama->rules());

		if ($validasi->run()) 
		{
			//JIKA DATA LOLOS VALIDASI, MAKA DATA DISIMPAN KE DATABASE
			// $this->ModelMasterAgama->edit($IdAgama);
			$Agama                  = $this->input->post('Agama');
        	$StatusAktif            = $this->input->post('StatusAktif');
			$this->db->query("EXEC AUD_MasterAgama '$IdAgama', '$Agama', '$StatusAktif','A'");

			$this->session->set_flashdata('success', 'Berhasil Disimpan');
			redirect('kepegawaian/masteragama/edit/'.$IdAgama);	//REDIRECT BIAR GAK RESUBMISSION
		}

		else

		{
			//MENAMPILKAN FORM EDIT + JIKA FORM TIDAK LOLOS VALIDASI MAKA KEMBALI KE TAMPILAN FORM EDIT DATA
			$data['EditMasterAgama'] 	= $this->ModelMasterAgama->getById($IdAgama);
			if (!$data['EditMasterAgama']) redirect('kepegawaian/masteragama');
			$this->load->view('admin/masteragama/edit', $data);
		}		
	}

	//EDITABLE KOLOM
	public function savedata()
	{

		 If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            redirect('kepegawaian/masteragama');
        }


		$IdAgama				= $this->input->post('IdAgama',true);
		$Agama					= $this->input->post('Agama',true);
		// $StatusAktif			= $this->input->post('StatusAktif');

		$data = array
		(
			'Agama'				=> $Agama,
			// 'StatusAktif'		=> $StatusAktif,
		);
		
		$this->ModelMasterAgama->savedata($IdAgama, $data);

		echo "Successfully saved";
	}

	public function PageNotFound() //MENAMPILKAN FORM TAMBAH AGAM
	{
		$this->load->view('admin/error/pagenotfound');
	}

}