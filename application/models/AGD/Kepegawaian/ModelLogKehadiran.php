<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogKehadiran extends CI_Model
{
    // Nama Tabel 			= LogKehadiran
    // Nama View dari Tabel = ViewLogKehadiran

    public function __construct()
    {
        $this->load->database();
    }

    // Mesin Finger Print

    public function get() //Menampilkan Semua Data
    {
    	return $this->db->get('LogKehadiran')->result(); 
    }
}