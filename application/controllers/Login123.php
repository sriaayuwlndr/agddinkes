<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelLogin');
		// $this->load->library('simple_login');
	}

	// public function index()
 //    {
 //        if ($this->session->userdata('IdPegawai')) 
 //        {
 //            redirect('kepegawaian/dashboard');
 //        }

 //        $validasi 		= $this->form_validation->set_rules($this->ModelLogin->rules());

 //        if ($validasi->run() == false) 
 //        {
 //            $this->load->view('login/login');
 //        } 

 //        else 
            
 //        {
 //            $this->_login();
 //        }
 //    }

 //    private function _login()
 //    {
 //        $IdPegawai 		= $this->input->post('IdPegawai');
 //        $Password 		= $this->input->post('Password');

 //        //Penggunanya Ada
 //        $Pengguna 		= $this->db->get_where('ViewMasterLogin', ['IdPegawai' => $IdPegawai])->row_array();
 //        if ($Pengguna) 
 //        {
 //            //Jika Penggunanya Aktif
 //            if ($Pengguna['StatusAktif'] == 1)
 //            {
 //            	//Cek Password
 //                if (password_verify($Password, $Pengguna['Password']))
 //                {
 //                	//Jika Password Benar
 //                    $data = 
 //                    [
 //                        'IdPegawai' 	=> $Pengguna['IdPegawai'],
 //                        'NamaLengkap' 	=> $Pengguna['NamaLengkap'],
 //                        'HakAkses' 		=> $Pengguna['HakAkses']
 //                    ];

 //                    $this->session->set_userdata($data);

 //                    //Validasi Hak Akses
 //                    if ($Pengguna['HakAkses'] == 1)
 //                    {
 //                        redirect('kepegawaian/dashboard');
 //                    }

 //                    else if ($Pengguna['HakAkses'] == 2) 
 //                    {
 //                        redirect('kepegawaian/jadwalkerja/shift');
 //                    }

 //                    else 
 //                    {
 //                        redirect('kepegawaian/dashboard');
 //                    }
 //               	}

 //               	else 

 //                {
 //                    //Password Salah
 //                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
 //                    ID Pegawai atau Password Salah!
 //                  	</div>');
 //                    redirect('login');
 //                }
 //            }

 //            else 

 //            {
 //            	//Pengguna Sudah Tidak Aktif
 //                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
 //            	ID Pegawai atau Password Salah!
 //          		</div>');
 //                redirect('login');
 //            }
 //        }

 //        else 

 //        {
 //            //Tidak Ada Pengguna/Tidak Terdaftar
 //            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
 //            Id Pegawai Tidak Terdaftar!
 //          	</div>');
 //            redirect('login');
 //        }
 //    }
















	// public function index()
	// {
	// 	// $this->load->view('login/login');

	// 	$valid          = $this->form_validation;  
 	//        $IdPegawai      = $this->input->post('IdPegawai');  
 	//        $Password       = $this->input->post('Password');  
	//        $valid->set_rules('IdPegawai','IdPegawai','required');  
	//     $valid->set_rules('Password','Password','required');  


	//     if($valid->run())
	 //        {  
	 //            $this->simple_login->login($IdPegawai,$Password, base_url('kepegawaian/dashboard'), base_url('login'));  
	 //        }

	 //        $this->load->view('login/login');

	// }

	// public function logout()
	// {  
	 //        $this->simple_login->logout();  
	 //    }  


    // ========== YANG BENER ================

    public function index()
	{
		$this->load->view('login/login');
	}


	function OtentikasiPengguna()
	{
        
        $validasi 		= $this->form_validation->set_rules($this->ModelLogin->rules());

        if ($validasi->run())
        {
        	$IdPegawai 		= htmlspecialchars($this->input->post('IdPegawai',TRUE),ENT_QUOTES);
        	$Password 		= htmlspecialchars($this->input->post('Password',TRUE),ENT_QUOTES);
       
	        $CekPengguna 	= $this->ModelLogin->OtentikasiPengguna($IdPegawai,MD5($Password));

	        if($CekPengguna->num_rows() > 0)
	        {
				$data = $CekPengguna->row_array();
	    		$this->session->set_userdata('masuk',TRUE);
		         
		        if($data['HakAkses'] =='1')
		        {
		        	// ========== Jika Login Hak Akses = 1 ========== 
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('ses_id',$data['IdPegawai']);
		            $this->session->set_userdata('ses_nama',$data['NamaLengkap']);
		            redirect('kepegawaian/dashboard');
		        }

		        else if($data['HakAkses'] =='2')

		        { 
		        	//========== Jika Login Hak Akses = 2 ==========
		            $this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id',$data['IdPegawai']);
		            $this->session->set_userdata('ses_nama',$data['NamaLengkap']);
		            redirect('kepegawaian/dashboard');
		        }

		        else

		        { 
	        		// ========== Jika Login Hak Akses = 3 ==========
		            $this->session->set_userdata('akses','3');
					$this->session->set_userdata('ses_id',$data['IdPegawai']);
		            $this->session->set_userdata('ses_nama',$data['NamaLengkap']);
		            redirect('kepegawaian/dashboard');
		        }
	        }

	        else

	        { 
	    		// ========== jika username dan password tidak ditemukan atau salah ==========
				echo $this->session->set_flashdata('pesan','ID Pegawai atau Password Salah');
				redirect(base_url('login'));	
	        }
	    }


	    else

	    {
	    	$this->load->view('login/login');
	    }
    }

    function LogOut()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    
}

?>

