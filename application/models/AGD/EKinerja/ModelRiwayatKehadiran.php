<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelRiwayatKehadiran extends CI_Model
{
    // Nama View dari Tabel = ViewKehadiran

    public function __construct()
    {
        $this->load->database();
    }

    public function get($IdPegawai) //Menampilkan Semua Data
    {
    	return $this->db->get_where('ViewKehadiran', ['IdPegawai' => $IdPegawai])->result();
    }
}