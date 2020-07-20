<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDashboard extends CI_Model
{
    // Nama Tabel 			= GajiPTKP
    // Nama View dari Tabel = ViewMasterPTKP

    public function __construct()
    {
        $this->load->database();
    }

    public function GetInformasi() //Menampilkan Semua Data
    {
        $this->db->order_by('TanggalDibuat'); //Berdasarkan Yang Paling Awal
    	return $this->db->get('MasterInformasi')->result(); 
    }
}