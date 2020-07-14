<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProfil extends CI_Model
{
    // Nama Tabel           = MasterPegawai
    // Nama View dari Tabel = ViewMasterPegawai

    public function __construct()
    {
        $this->load->database();
    }

    public function get($IdPegawai) //Menampilkan Semua Data
    {
    	return $this->db->get_where('ViewMasterPegawai', ['IdPegawai' => $IdPegawai])->row();
    }
}