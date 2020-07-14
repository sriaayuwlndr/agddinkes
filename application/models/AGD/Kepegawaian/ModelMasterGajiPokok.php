<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterGajiPokok extends CI_Model
{
    // Nama Tabel 			= GajiPokok
    // Nama View dari Tabel = ViewMasterGajiPokok

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
    	return $this->db->get('ViewMasterGajiPokok')->result(); 
    }

    public function getById($IdPendidikanFormal,$IdMasaKerja,$IdPTKP) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('ViewMasterGajiPokok', ['IdPendidikanFormal' => $IdPendidikanFormal, 'IdMasaKerja' => $IdMasaKerja, 'IdPTKP' => $IdPTKP] )->row();
    }

    public function edit($IdPendidikanFormal,$IdMasaKerja,$IdPTKP) //Mengupdate Data Yang Diubah Ke Database
    {
        $PTKP               = $this->input->post('PTKP');
        $Keterangan         = $this->input->post('Keterangan');
        $StatusAktif        = $this->input->post('StatusAktif');

        $data = array
        (
            'PTKP'          => $PTKP,
            'Keterangan'    => $Keterangan,
            'StatusAktif'   => $StatusAktif
        );

        $this->db->where('IdPendidikanFormal',$IdPendidikanFormal);
        $this->db->where('IdMasaKerja',$IdMasaKerja);
        $this->db->where('IdPTKP',$IdPTKP);
        $this->db->update('ViewMasterGajiPokok',$data);
    }
}