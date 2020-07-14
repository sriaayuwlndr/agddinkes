<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSettingAktivitasBawahan extends CI_Model
{
    // Nama Tabel           = MasterPegawai
    // Nama View dari Tabel = ViewMasterPegawai

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'IdAktivitas',
            'label'     => 'Aktivitas',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],
        ];
    }

    public function getJabatan($IdPegawai) //Menampilkan Semua Data
    {
        // return $this->db->query("SELECT IdJabatan FROM MasterPegawai WHERE IdPegawai = '$IdPegawai'")->row();
        return $this->db->get_where('MasterPegawai', ['IdPegawai' => $IdPegawai])->row();
    }

    public  function GetBawahan($IdJabatan)
    {
        // return $this->db->query("SELECT * FROM ViewMasterPegawai WHERE IdJabatanAtasan = '$IdJabatan'")->result();
        return $this->db->get_where('ViewMasterPegawai', ['IdJabatanAtasan' => $IdJabatan])->result();
    }

    public function GetMappingAktivitas($IdPegawai)
    {
        return $this->db->get_where('ViewMasterMappingAktivitas', ['IdPegawai' => $IdPegawai])->result();
    }
    
    // public function GetTotalMappingAktivitas($IdPegawai)
    // {
    //     return $this->db->get_where('ViewMasterMappingAktivitas', ['IdPegawai' => $IdPegawai])->result();
    // }


    public function GetPegawai($IdPegawai)
    {
        return $this->db->get_where('ViewMasterPegawai', ['IdPegawai' => $IdPegawai])->row_array();
    }

    public function getAktivitas() //Menampilkan Data Mapping Aktivitas Berdasarkan Id Pegawai
    {
        return $this->db->get('MasterAktivitas')->result();
    }

    public function add($IdPegawai) //Menambahkan Data Baru Ke Database
    {
        $IdAktivitas               = $this->input->post('IdAktivitas');
        // $IdPegawai                  = $this->input->post('IdPegawai');
        

        $data = array
        (
            'IdPegawai'             => $IdPegawai,
            'IdAktivitas'           => $IdAktivitas,
        );

        $this->db->insert('ViewMasterMappingAktivitas',$data);
    }

    public function CekMappingAktivitas($IdPegawai,$IdAktivitas)
    {
        return $this->db->get_where('ViewMasterMappingAktivitas', ['IdPegawai' => $IdPegawai, 'IdAktivitas' => $IdAktivitas])->row_array();
    }

    public function DeleteMappingAktivitas($IdMappingAktivitas)
    {
        $this->db->delete('MasterMappingAktivitas', array('IdMappingAktivitas' => $IdMappingAktivitas));
        
    }
}