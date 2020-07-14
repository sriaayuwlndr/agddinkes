<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterGajiPokok extends CI_Model
{

	public function __construct()
    {
        $this->load->database();
    }

    public function get() //MENAMPILKAN SEMUA DATA MASTER GAJI
    {
        $this->db->order_by('IdPendidikanFormal, IdMasaKerja, IdPTKP');
        return $this->db->get('ViewMasterGajiPokok')->result();
    }
}