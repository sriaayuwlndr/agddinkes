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

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'IdHubunganKeluarga',
            'label'     => 'IdHubunganKeluarga',
            'rules'     => 'required|max_length[5]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'NamaKeluarga',
            'label'     => 'NamaKeluarga',
            'rules'     => 'required|max_length[50]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get($IdPegawai) //Menampilkan Semua Data
    {
    	return $this->db->get_where('ViewMasterPegawai', ['IdPegawai' => $IdPegawai])->row();
    }

    public function GetRiwayatKeluarga($IdPegawai) //Menampilkan Semua Data
    {
        return $this->db->get_where('ViewRiwayatKeluarga', ['IdPegawai' => $IdPegawai])->result();
    }

    public function add($IdPegawai) //Menambahkan Data Baru Ke Database
    {
        $IdPegawai              = $this->input->post('IdPegawai');
        $IdHubunganKeluarga     = $this->input->post('IdHubunganKeluarga');
        $NamaKeluarga           = $this->input->post('NamaKeluarga');
        $PengakuanAGD           = 0;

        $data = array
        (
            'IdPegawai'             => $IdPegawai,
            'IdHubunganKeluarga'    => $IdHubunganKeluarga,
            'NamaKeluarga'          => $NamaKeluarga,
            'PengakuanAGD'          => $PengakuanAGD
        );

        $this->db->insert('RiwayatKeluarga',$data);
    }
}