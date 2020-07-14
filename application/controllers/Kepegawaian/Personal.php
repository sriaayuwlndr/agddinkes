<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();

		// ========== VALIDASI JIKA USER BELUM LOGIN ==========
	  	if($this->session->userdata('masuk') != TRUE)
	  	{
			$url = base_url('login');
			redirect($url);
		}		 
    }  

	public function index()
	{
		$this->load->view('admin/personal/profil');
	}

}
