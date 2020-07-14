<?php
class LupaPassword extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ModelLupaPassword');
	}

	public function index()
	{
		$this->load->view('login/lupapassword');
	}

	public function ResetPassword()
	{
		$validasi 		= $this->form_validation->set_rules($this->ModelLupaPassword->rules());

		if ($validasi->run())
        {
        	$Email 				= $this->input->post('Email');   
            $CleanXSS 			= $this->security->xss_clean($Email);  
            $getPegawaiByEmail	= $this->ModelLupaPassword->getPegawaiByEmail($CleanXSS);


            if(!$getPegawaiByEmail)
            {  
               $this->session->set_flashdata('msg', 'Email Address salah, silakan coba kembali.');  
               redirect(site_url('login'),'refresh');   
            }

            //MEMBUAT TOKEN
            $IdPegawai 	= $getPegawaiByEmail->IdPegawai;
            $Token 		= $this->ModelLupaPassword->addToken($IdPegawai); 
        }
	}


}