<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterGaji extends CI_Model
{
    // Nama Tabel 			= GajiPokok
    // Nama View dari Tabel = ViewMasterGaji

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'IdPendidikanFormal',
            'label'     => 'IdPendidikanFormal',
            'rules'     => 'required|max_length[1]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'IdMasaKerja',
            'label'     => 'IdMasaKerja',
            'rules'     => 'required|max_length[1]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'IdPTKP',
            'label'     => 'IdPTKP',
            'rules'     => 'required|max_length[1]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get() //Menampilkan Semua Data
    {
        $this->db->order_by('IdPendidikanFormal, IdMasaKerja, IdPTKP'); //Berdasarkan Yang Paling Awal
    	return $this->db->get('ViewMasterGaji')->result(); 
    }
}