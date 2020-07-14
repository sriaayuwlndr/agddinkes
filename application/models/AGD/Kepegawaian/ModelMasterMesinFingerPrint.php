<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterMesinFingerPrint extends CI_Model
{
    // Nama Tabel 			= MasterMesinFingerPrint
    // Nama View dari Tabel = ViewMasterMesinFingerPrint

    public function __construct()
    {
        $this->load->database();
    }

    // Mesin Finger Print

    public function get() //Menampilkan Semua Data
    {
    	return $this->db->get('MasterMesinFingerPrint')->result(); 
    }
}