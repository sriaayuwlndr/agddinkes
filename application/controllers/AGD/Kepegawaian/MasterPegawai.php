<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterPegawai extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Kepegawaian/ModelMasterPegawai');
	}


	public function index() //Menampilkan Semua Data
	{
        $data['Title']                  = 'Master Pegawai | Kepegawaian';
        $data['HeaderTitle']            = 'Kepegawaian';
		$data['GetMasterPegawai'] 		= $this->ModelMasterPegawai->get();
		$this->load->view('agd/kepegawaian/masterpegawai/index', $data);
	}

	public function add() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{

        $validasi = $this->form_validation->set_rules($this->ModelMasterPegawai->rules());

        if ($validasi->run()) 
        {
            //Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
            $this->ModelMasterPegawai->add();
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
            redirect('agd/kepegawaian/masterpegawai/add');
        }

        else

        {
            //Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
            $data['Title']                  = 'Master Pegawai | Kepegawaian';
            $data['HeaderTitle']            = 'Kepegawaian';
            $data['GetJabatanAtasan']       = $this->ModelMasterPegawai->getJabatanAtasan();
            $this->load->view('agd/kepegawaian/masterpegawai/add', $data); 
        }
	}
}