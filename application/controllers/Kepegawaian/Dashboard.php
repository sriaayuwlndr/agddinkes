<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
        // is_logged_in();


		// ========== VALIDASI JIKA USER BELUM LOGIN ==========
	 	//  if($this->session->userdata('masuk') != TRUE)
		// {
		// 	$url = base_url('login');
		// 	redirect($url);
		// }		 
    }  

	// function __construct()
	// {  
	//        parent::__construct();  
	//        $this->simple_login->cek_login(); 
	//    }

	public function index()
	{
		$this->load->view('admin/dashboard/index');
	}

}
