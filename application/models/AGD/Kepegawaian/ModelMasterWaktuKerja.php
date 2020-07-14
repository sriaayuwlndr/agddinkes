<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterWaktuKerja extends CI_Model
{
    // Nama Tabel 			= MasterWaktuKerja
    // Nama View dari Tabel = ViewMasterWaktuKerja

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'Keterangan',
            'label'     => 'Keterangan',
            'rules'     => 'required|max_length[40]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'JamMasuk',
            'label'     => 'Jam Masuk',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'JamPulang',
            'label'     => 'Jam Pulang',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get() //Menampilkan Semua Data
    {
        $this->db->order_by('TanggalDibuat','DESC'); //Berdasarkan Yang Terbaru
    	return $this->db->get('ViewMasterWaktuKerja')->result(); 
    }

    public function getById($IdWaktuKerja) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('ViewMasterWaktuKerja', ['IdWaktuKerja' => $IdWaktuKerja])->row();
    }

    public function add() //Menambahkan Data Baru Ke Database
    {
        $Keterangan         = $this->input->post('Keterangan');
        $JamMasuk           = $this->input->post('JamMasuk');
        $JamPulang          = $this->input->post('JamPulang');
        $StatusAktif        = 1;

        $data = array
        (
            'Keterangan'    => $Keterangan,
            'JamMasuk'      => $JamMasuk,
            'JamPulang'     => $JamPulang,
            'StatusAktif'   => $StatusAktif
        );

        $this->db->insert('ViewMasterWaktuKerja',$data);
    }

    public function edit($IdWaktuKerja) //Mengupdate Data Yang Diubah Ke Database
    {
        $Keterangan         = $this->input->post('Keterangan');
        $JamMasuk           = $this->input->post('JamMasuk');
        $JamPulang          = $this->input->post('JamPulang');
        $StatusAktif        = 1;

        $data = array
        (
            'Keterangan'    => $Keterangan,
            'JamMasuk'      => $JamMasuk,
            'JamPulang'     => $JamPulang,
            'StatusAktif'   => $StatusAktif
        );

        $this->db->where('IdWaktuKerja',$IdWaktuKerja);
        $this->db->update('ViewMasterWaktuKerja',$data);
    }
    
}