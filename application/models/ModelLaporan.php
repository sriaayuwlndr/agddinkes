<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLaporan extends CI_Model
{

	public function __construct()
    {
        $this->load->database();
    }

    public function getHitungGajiPokok() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
        return $query = $this->db->get('ViewHitungGajiPokok')->result();
    }

    public function getHitungGaji() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
    	return $query = $this->db->get('V_HitungGaji')->result();
    }

    public function getHitungTunjangan() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
    	return $query = $this->db->get('V_HitungTunjangan')->result();
    }

    public function getBulan() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
        return $query = $this->db->get('MasterBulan')->result();
    }

    public function getTahun() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
        return $query = $this->db->get('MasterTahun')->result();
    }
}