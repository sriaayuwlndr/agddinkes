<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterPTKP extends CI_Model
{
    // Nama Tabel 			= GajiPTKP
    // Nama View dari Tabel = ViewMasterPTKP

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'PTKP',
            'label'     => 'PTKP',
            'rules'     => 'required|max_length[5]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Keterangan',
            'label'     => 'Keterangan',
            'rules'     => 'required|max_length[50]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get() //Menampilkan Semua Data
    {
        $this->db->order_by('TanggalDibuat'); //Berdasarkan Yang Paling Awal
    	return $this->db->get('ViewMasterPTKP')->result(); 
    }

    public function getById($IdPTKP) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('ViewMasterPTKP', ['IdPTKP' => $IdPTKP])->row();
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

    public function edit($IdPTKP) //Mengupdate Data Yang Diubah Ke Database
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

        $this->db->where('IdPTKP',$IdPTKP);
        $this->db->update('ViewMasterPTKP',$data);
    }
    
}