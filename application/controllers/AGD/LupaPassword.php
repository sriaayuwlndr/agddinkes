<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LupaPassword extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('AGD/ModelLupaPassword');
	}

	public function index()
	{
		$data['title'] = 'Lupa Password';

		$validasi 		= $this->form_validation->set_rules($this->ModelLupaPassword->rules());

        if ($validasi->run() == false) 
        {
            $this->load->view('agd/lupapassword', $data);
        }

        else
        {
	        $IdPegawai          = $this->input->post('IdPegawai');
	        $Email              = $this->input->post('Email');
	        $TanggalLahir       = $this->input->post('TanggalLahir');
	        $NomorHandphone     = $this->input->post('NomorHandphone');

	        //Penggunanya Ada dan Aktif
	        $Pengguna = $this->db->get_where('ViewMasterLogin', ['IdPegawai' => $IdPegawai, 'StatusAktif' => 1])->row_array();

	        if($Pengguna['Email'] == $Email)
	        {
	            if($Pengguna['TanggalLahir'] == $TanggalLahir)
	            {
	                if($Pengguna['NomorHandphone'] == $NomorHandphone)
	                {
	                    $data =
	                    [
	                        'IdPegawai'       => $Pengguna['IdPegawai'],
	                        'Email'           => $Pengguna['Email'],
	                        'TanggalLahir'    => $Pengguna['TanggalLahir'],
	                        'NomorHandphone'  => $Pengguna['NomorHandphone'],
	                    ];

	                    $IdPegawai = $Pengguna['IdPegawai'];
	                    $data['GetPasswordBaru'] = $this->ModelLupaPassword->submitResetPassword($IdPegawai);
	                    $data['title'] = 'Reset Password';
	                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Password Anda Berhasil Di Reset</div>');
	                    $this->load->view('agd/resetpassword2', $data);
	                    
	                }

	                else
	                {
	                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data yang Anda Masukkan Tidak Valid!</div>');
	                    redirect('agd/lupapassword');
	                }
	            }

	            else
	            {
	                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data yang Anda Masukkan Tidak Valid!</div>');
	                redirect('agd/lupapassword');
	            }
	        }

	        else

	        {
	            //DATA ANDA TIDAK VALID dan Direct Ke Lupa Password
	            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data yang Anda Masukkan Tidak Valid!</div>');
	            redirect('agd/lupapassword');
	        }
	    }
	}

	public function ResetPassword()
	{
		if($this->session->userdata('IdPegawai') == $Pengguna['IdPegawai'] )
		{
			$validasi 		= $this->form_validation->set_rules($this->ModelLupaPassword->rulesResetPassword());

			if ($validasi->run() == false)
			{
				// $IdPegawai = $this->session->set_userdata('IdPegawai');
				$data['title'] 	= 'Reset Password';
				$this->load->view('agd/resetpassword', $data);
			}

			else
			{
				$IdPegawai = $this->session->set_userdata('IdPegawai');
				$this->load->view('agd/resetpassword', $IdPegawai);
				$this->ModelLupaPassword->submitResetPassword($IdPegawai);
			}
		}

		else
		{
			$this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Gagal Reset Password!</div>');
			redirect('agd/lupapassword');
		}
	}
}