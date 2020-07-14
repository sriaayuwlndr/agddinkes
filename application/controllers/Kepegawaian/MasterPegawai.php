<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterPegawai extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->model('ModelMasterPegawai');
        $this->load->library('encrypt'); 
	}


	public function index() //MENAMPILKAN SEMUA DATA MASTER AGAMA
	{
		$data['GetMasterPegawai'] 		= $this->ModelMasterPegawai->get();
		$this->load->view('admin/masterpegawai/index', $data);
	}

	public function add() //MENAMPILKAN FORM TAMBAH PEGAWAI
	{
		$this->load->view('admin/masterpegawai/add');
	}

	public function submit()
	{
		$rules = array
        (
            array
            (
                'field'     => 'NamaLengkap',
                'label'     => 'Nama Lengkap',
                'rules'     => 'required',
                'errors'    => array('required' => '<b>%s wajib diisi.</b>')
            ),
        );

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('admin/masterpegawai/add');
        }

        else

        {
        	$NamaLengkap		= $this->input->post('NamaLengkap');
            $JenisKelamin       = $this->input->post('JenisKelamin');
            $IdPegawai			= $this->ModelMasterPegawai->createIdPegawai($JenisKelamin);
            $StatusAktif        = 1;
            // $Password           = MD5('12345');
            $Password           = password_hash('12345', PASSWORD_DEFAULT);
            $HakAkses           = 3;

            $InsertIntoMasterPegawai = array
            (
                'IdPegawai'             => $IdPegawai,
                'NamaLengkap'     		=> $NamaLengkap,
                'JenisKelamin'          => $JenisKelamin,
                'StatusAktif'           => $StatusAktif
            );

            $InsertIntoMasterLogin = array
            (
                'IdPegawai'             => $IdPegawai,
                'Password'              => $Password,
                'HakAkses'              => $HakAkses,
                'StatusAktif'           => $StatusAktif
            );

            $this->ModelMasterPegawai->add($InsertIntoMasterPegawai);
            $this->ModelMasterPegawai->addLogMasterPegawai($InsertIntoMasterPegawai);
            $this->ModelMasterPegawai->addMasterLogin($InsertIntoMasterLogin);
            redirect('kepegawaian/masterpegawai');
        }
	}

    // function EnkripsiPassword($input, $rounds = 9)
    // {
    //     $salt ="";
    //     $saltChars = array_merge(range('A','Z'), range('a','z'), range( 0, 9));
    //     for($i = 0; $i < 22; $i++){
    //         $salt .= $saltChars[array_rand($saltChars)];
    //     }
    //     return crypt($input, sprintf('$2y$%02d$', $rounds) . $salt);
    // }


	
}
