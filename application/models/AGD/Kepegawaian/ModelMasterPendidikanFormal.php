<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterPendidikanFormal extends CI_Model
{
    // Nama Tabel 			= MasterPendidikanFormal
    // Nama View dari Tabel = ViewMasterPendidikanFormal

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'PendidikanFormal',
            'label'     => 'Pendidikan Formal',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get() //Menampilkan Semua Data
    {
        $this->db->order_by('TanggalDibuat'); //Berdasarkan Yang Paling Awal
    	return $this->db->get('ViewMasterPendidikanFormal')->result(); 
    }

    public function getById($IdPendidikanFormal) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('ViewMasterPendidikanFormal', ['IdPendidikanFormal' => $IdPendidikanFormal])->row();
    }

    public function add() //Menambahkan Data Baru Ke Database
    {
        $PendidikanFormal       = $this->input->post('PendidikanFormal');
        $StatusAktif            = 1;

        $data = array
        (
            'PendidikanFormal'  => $PendidikanFormal,
            'StatusAktif'       => $StatusAktif
        );


        $this->db->insert('ViewMasterPendidikanFormal',$data);
    }

    public function edit($IdPendidikanFormal) ///Mengupdate Data Yang Diubah Ke Database
    {
        $PendidikanFormal       = $this->input->post('PendidikanFormal');
        $StatusAktif            = $this->input->post('StatusAktif');

        $data = array
        (
            'PendidikanFormal'  => $PendidikanFormal,
            'StatusAktif'       => $StatusAktif,
        );

        $this->db->where('IdPendidikanFormal',$IdPendidikanFormal);
        $this->db->update('ViewMasterPendidikanFormal',$data);
    }
    
}