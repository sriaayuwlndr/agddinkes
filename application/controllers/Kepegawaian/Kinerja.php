<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EKinerja extends CI_Controller
{
	function  __construct()
	{
        parent::__construct();
        $this->load->model('ModelKinerja');
    }

	public function InputKinerja()
	{
		$this->load->view('admin/kinerja/inputkinerja');
    }
}