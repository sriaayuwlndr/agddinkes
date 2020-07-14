<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSuntingProfil extends CI_Model
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

    public function add() //Menambahkan Data Baru Ke Database
    {
        $PTKP               = $this->input->post('PTKP');
        $Keterangan         = $this->input->post('Keterangan');
        $StatusAktif        = 1;

        $data = array
        (
            'PTKP'          => $PTKP,
            'Keterangan'    => $Keterangan,
            'StatusAktif'   => $StatusAktif
        );

        $this->db->insert('ViewMasterPTKP',$data);
    }
}