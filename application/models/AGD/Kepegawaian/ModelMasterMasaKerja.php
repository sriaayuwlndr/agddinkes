<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterMasaKerja extends CI_Model
{
    // Nama Tabel 			= GajiMasaKerja
    // Nama View dari Tabel = ViewMasterMasaKerja

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'MasaKerja1',
            'label'     => 'Masa Kerja 1',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'MasaKerja2',
            'label'     => 'Masa Kerja 2',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get() //Menampilkan Semua Data
    {
        $this->db->order_by('TanggalDibuat'); //Berdasarkan Yang Paling Awal
    	return $this->db->get('ViewMasterMasaKerja')->result(); 
    }

    public function getById($IdMasaKerja) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('ViewMasterMasaKerja', ['IdMasaKerja' => $IdMasaKerja])->row();
    }

    public function add() //Menambahkan Data Baru Ke Database
    {
        $MasaKerja1          = $this->input->post('MasaKerja1');
        $MasaKerja2          = $this->input->post('MasaKerja2');
        $StatusAktif         = 1;

        $data = array
        (
            'MasaKerja1'     => $MasaKerja1,
            'MasaKerja2'     => $MasaKerja2,
            'StatusAktif'    => $StatusAktif
        );


        $this->db->insert('ViewMasterMasaKerja',$data);
    }

    public function edit($IdMasaKerja) //Mengupdate Data Yang Diubah Ke Database
    {
        $MasaKerja1          = $this->input->post('MasaKerja1');
        $MasaKerja2          = $this->input->post('MasaKerja2');
        $StatusAktif         = $this->input->post('StatusAktif');

        $data = array
        (
            'MasaKerja1'     => $MasaKerja1,
            'MasaKerja2'     => $MasaKerja2,
            'StatusAktif'    => $StatusAktif,
        );

        $this->db->where('IdMasaKerja',$IdMasaKerja);
        $this->db->update('ViewMasterMasaKerja',$data);
    }
    
}