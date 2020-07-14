<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKinerja extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getKinerjaByIdPegawai() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
        // $this->db->where('IdPegawai', $IdPegawai);
    	return $this->db->get('RiwayatKinerja');
    }

    function fetch_all_event(){
		$this->db->order_by('id');
		return $this->db->get('coba');
    }
    
    function insert_event($data)
	{
		$this->db->insert('coba', $data);
	}
}