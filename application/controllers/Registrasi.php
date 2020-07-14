<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelRegistrasi');
	}

    public function index()
	{
		$this->load->view('registrasi/index');
	}

    public function registrasi()
	{
		$validasi 		= $this->form_validation->set_rules($this->ModelRegistrasi->rules());

		if ($validasi->run())
		{
            $IdPegawai 		= htmlspecialchars($this->input->post('IdPegawai', true));
            $Email 			= htmlspecialchars($this->input->post('Email', true));
            $Password 		= password_hash($this->input->post('Password'), PASSWORD_DEFAULT);
            $HakAkses 		= 3;
            $StatusAktif 	= 0;

            $data 			= array
			(
				'IdPegawai'		=> $IdPegawai,
				'Email'			=> $Email,
				'Password'		=> $Password,
				'HakAkses'		=> $HakAkses,
				'StatusAktif'		=> $StatusAktif,

			);

            //SIAPKAN TOKEN
            $Token3 		= base64_encode(openssl_random_pseudo_bytes(32));
            $Token2 		= trim($Token3);
            $Token 			= preg_replace('/[^A-Za-z0-9]/', '', $Token2);
            date_default_timezone_set('Asia/Jakarta');


            $dataTokenRegistrasi = array
            (
            
                'Email' 			=> $Email,
                'Token' 			=> $Token,
                'TanggalDibuat' 	=> date('Y-m-d H:i:s'),
            );

            $this->ModelRegistrasi->registrasi($data, $dataTokenRegistrasi);
            $this->SendEmail($Token, $Email, 'VerifikasiAkun');
        }

        else

        {
            $this->load->view('registrasi/index');
        }
	}

	private function SendEmail($Token, $Email, $type)
    {
        $config = array
        (
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_port'     => 465,
            'smtp_user'     => 'sriaayuwlndr@gmail.com',
            'smtp_pass'     => '03LaTahzan10',
            'mailtype'      => 'html',
            'charset'       => 'iso-8859-1',
            'newline'       => "\r\n",
            'crlf'          => "\r\n"
        );

        $DariEmail = 'sriaayuwlndr@gmail.com';
        $this->load->library('email', $config);
        $this->email->initialize($config);


        if ($type == 'VerifikasiAkun') 
        {
            $this->email->from($DariEmail, 'Sri Ayu Wulandari');
            $this->email->to($Email);
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Click this link to verify you account :<a href="' . base_url() . 'registrasi/verify?email=' . $Email . '&token=' . $Token . '">Active</a>');
        }

        elseif ($type == 'LupaPassword')

        {
            $this->email->from($DariEmail, 'Sri Ayu Wulandari');
            $this->email->to($Email);
            $this->email->subject('Lupa Password');
            $this->email->message('Click this link to reset your password :<a href="' . base_url() . 'registrasi/resetpassword?email=' . $this->input->post('email') . '&token=' . $token . '">Reset Password</a>');
        }

    	if ($this->email->send()) 
    	{
        	return true;
    	} 

        else 

        {
            echo $this->email->print_debugger();
            die;
        }
    }
}




	// public function Registrasi()
	// {
	// 	$validasi = $this->form_validation->set_rules($this->ModelRegistrasi->rules());

	// 	if ($validasi->run()) 
	// 	{
	// 		//JIKA DATA LOLOS VALIDASI, MAKA DATA DITAMBAHKAN KE DATABASE
	// 		$this->ModelRegistrasi->registrasi();
	// 		$this->session->set_flashdata('success', 'Berhasil Disimpan');
	// 		redirect('registrasi/registrasi'); //REDIRECT BIAR GAK RESUBMISSION
	// 	}

	// 	else

	// 	{
	// 		//MENAMPILKAN FORM TAMBAH + JIKA FORM TIDAK DIISI MAKA KEMBALI KE TAMPILAN FORM TAMBAH DATA
	// 		$this->load->view('registrasi/index'); 
	// 	}
	// }

?>

