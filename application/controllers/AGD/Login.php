<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('AGD/ModelLogin');
	}

	public function index()
    {
        if ($this->session->userdata('IdPegawai')) 
        {
            $this->PeriksaHakAkses(); //Panggil Function PeriksaHakAkses
        }

        $validasi 		= $this->form_validation->set_rules($this->ModelLogin->rules());

        if ($validasi->run() == false) 
        {
            $this->load->view('agd/login');
        } 

        else 
            
        {
            $this->Login(); //Panggil Function Login
        }
    }

    private function Login()
    {
        $IdPegawai 		= $this->input->post('IdPegawai'); //USERNAMENYA PAKE ID PEGAWAI
        $Password 		= $this->input->post('Password');

        //Penggunanya Ada
        $Pengguna 		= $this->db->get_where('ViewMasterLogin', ['IdPegawai' => $IdPegawai])->row_array();
        if ($Pengguna) 
        {
            //Jika Penggunanya Aktif
            if ($Pengguna['StatusAktif'] == 1)
            {
            	//Cek Password
                if (password_verify($Password, $Pengguna['Password']))
                {
                    // CATAT WAKTU LOGIN
                    $this->ModelLogin->TerakhirLogin($IdPegawai);

                	//Jika Password Benar
                    $data = 
                    [
                        'IdPegawai' 	        => $Pengguna['IdPegawai'],
                        'NamaLengkap' 	        => $Pengguna['NamaLengkap'],
                        'IdHakAkses'            => $Pengguna['IdHakAkses'],
                        'KeteranganDivisi' 		=> $Pengguna['KeteranganDivisi'],
                    ];

                    $this->session->set_userdata($data);
                    $this->PeriksaHakAkses(); //Validasi Hak Akses Pake Function PeriksaHakAkses
               	}

               	else 
                {
                    //Password Salah
                    $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Username atau Password Salah!</div>');
                    redirect('agd/login');
                }
            }

            else 
            {
            	//Pengguna Sudah Tidak Aktif
                $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Username atau Password Salah!</div>');
                redirect('agd/login');
            }
        }

        else 
        {
            //Tidak Ada Pengguna/Tidak Terdaftar
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Username atau Password Salah!</div>');
            redirect('agd/login');
        }
    }

    public function LogOut()
    {
        $this->session->unset_userdata('IdPegawai');
        $this->session->unset_userdata('IdHakAkses');
        $this->session->set_flashdata('notifikasi', '<div class="alert alert-success" role="alert">Anda Berhasil Log Out!</div>');
        redirect('agd/login');
    }

    private function PeriksaHakAkses()
    {
        if($this->session->userdata('IdHakAkses') == 1)
        {
            redirect('agd/administrator/dashboard');
        }

        else if($this->session->userdata('IdHakAkses') == 2)
        {
            redirect('agd/kepegawaian/dashboard');
        }

        else if($this->session->userdata('IdHakAkses') == 3)
        {
            redirect('agd/keuangan/dashboard');
        }

        else if($this->session->userdata('IdHakAkses') == 4)
        {
            redirect('agd/diklatinternal/dashboard');
        }

        else if($this->session->userdata('IdHakAkses') == 5)
        {
            redirect('agd/diklateksternal/dashboard');
        }

        else if($this->session->userdata('IdHakAkses') == 6)
        {
            redirect('agd/ekinerja/dashboard');
        }

        else if($this->session->userdata('IdHakAkses') == 7)
        {
            redirect('agd/ekinerja/dashboard');
        }

        else
        {
            //Jika Hak Aksesnya 0, Kosong, dan Gak Ada Di Daftar, Maka Langsung Dihapus Session-nya!
            $this->session->unset_userdata('IdPegawai');
            $this->session->unset_userdata('IdHakAkses');
            $this->session->set_flashdata('notifikasi', '<div class="alert alert-danger" role="alert">Username atau Password Salah!</div>');
            redirect('agd/login');
        }
    }
}