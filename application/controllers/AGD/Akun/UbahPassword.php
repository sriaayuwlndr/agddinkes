<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UbahPassword extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
        PeriksaLogin();
		$this->load->model('AGD/Akun/ModelUbahPassword');
        
	}


	public function index() //Menampilkan Semua Data
	{
        $data['Title']                  = 'Ubah Password';
        $data['HeaderTitle']            = 'E-Kinerja';
        $IdPegawai                      = $this->session->userdata('IdPegawai');
		$data['GetPassword'] 		    = $this->ModelUbahPassword->getById($IdPegawai);
		$this->load->view('agd/akun/ubahpassword', $data);
	}

	public function UbahPassword() //Menampilkan Form Tambah Data + Menambahkan Data Baru Ke Database
	{
        $validasi = $this->form_validation->set_rules($this->ModelUbahPassword->rules());

        if ($validasi->run()) 
        {
            //Jika Data Lolos Validasi, Maka Data Ditambahkan Ke Database
            $IdPegawai                      = $this->session->userdata('IdPegawai');

            $this->ModelUbahPassword->UbahPassword($IdPegawai);
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Berhasil Disimpan!</div>');
            redirect('agd/akun/ubahpassword');
        }

        else

        {
            //Menampilkan Form Tambah + Jika Form Tidak Diisi Maka Kembali Ke Tampilan Form Tambah Data
            $data['Title']                  = 'Ubah Password';
            $data['HeaderTitle']            = 'E-Kinerja';
            $IdPegawai                      = $this->session->userdata('IdPegawai');
            $data['GetPassword']            = $this->ModelUbahPassword->getById($IdPegawai);
            $this->load->view('agd/akun/ubahpassword', $data);
        }
	}
}