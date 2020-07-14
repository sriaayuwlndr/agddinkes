<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterAgama extends CI_Model
{
    // Nama Tabel 			= MasterAgama
    // Nama View dari Tabel = ViewMasterAgama

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'Agama',
            'label'     => 'Agama',
            'rules'     => 'required|max_length[20]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get() //Menampilkan Semua Data
    {
        $this->db->order_by('TanggalDibuat'); //Berdasarkan Yang Paling Awal
    	return $this->db->get('ViewMasterAgama')->result(); 
    }

    public function getById($IdAgama) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('ViewMasterAgama', ['IdAgama' => $IdAgama])->row();
    }

    public function add() //Menambahkan Data Baru Ke Database
    {
        $Agama                  = $this->input->post('Agama');
        $StatusAktif            = 1;

        $data = array
        (
            'Agama'             => $Agama,
            'StatusAktif'       => $StatusAktif
        );


        $this->db->insert('ViewMasterAgama',$data);
    }

    public function edit($IdAgama) //Mengupdate Data Yang Diubah Ke Database
    {
        $Agama                  = $this->input->post('Agama');
        $StatusAktif            = $this->input->post('StatusAktif');

        $data = array
        (
            'Agama'             => $Agama,
            'StatusAktif'       => $StatusAktif,
        );

        $this->db->where('IdAgama',$IdAgama);
        $this->db->update('ViewMasterAgama',$data);
    }
    
    public function LiveEdit() //MENYIMPAN DATA AGAMA YANG DIUBAH
    {
        $IdAgama                = $this->input->post('IdAgama',true);
        $Agama                  = $this->input->post('Agama',true);

        $data = array
        (
            'Agama'             => $Agama,
        );

        $this->db->where('IdAgama',$IdAgama);
        $this->db->update('ViewMasterAgama',$data);
    }
}