<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterAgama extends CI_Model
{

    // Nama Tabel =  MasterAgama
    // Nama View dari Tabel Master Agama = ViewMasterAgama

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //RULES UNTUK VALIDASI SAAT TAMBAH DATA
    {
        return
        [
            ['field'    => 'Agama',
            'label'     => 'Agama',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>Kolom %s Wajib Diisi.</b>')]
        ];
    }

    public function get() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
        $this->db->order_by('TanggalDibuat','DESC');
    	return $this->db->get('ViewMasterAgama')->result(); 
    }

    public function getById($IdAgama) //MENAMPILKAN DATA BERDASARKAN ID
    {
        return $this->db->get_where('ViewMasterAgama', ['IdAgama' => $IdAgama])->row();
    }

    public function add() //MENAMBAHKAN DATA BARU KE DATABASE
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

    public function edit($IdAgama) //MENYIMPAN DATA YANG DIEDIT KE DATABASE
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



    //EDITABLE KOLOM

    public function savedata($IdAgama, $data) //MENYIMPAN DATA AGAMA YANG DIUBAH
    {
        $this->db->where('IdAgama',$IdAgama);
        $this->db->update('MasterAgama',$data);
    }

    
}