<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJadwalKerja extends CI_Model
{

	public function __construct()
    {
        $this->load->database();
    }

    public function getJadwalKerjaShift() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
    	return $query = $this->db->get('V_JadwalKerja')->result();
    }
}