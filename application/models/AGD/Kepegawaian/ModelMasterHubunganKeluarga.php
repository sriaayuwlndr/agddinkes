<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterHubunganKeluarga extends CI_Model
{
    // Nama Tabel 			= MasterHubunganKeluarga
    // Nama View dari Tabel = ViewMasterHubunganKeluarga

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'HubunganKeluarga',
            'label'     => 'Hubungan Keluarga',
            'rules'     => 'required|max_length[20]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get() //Menampilkan Semua Data
    {
        $this->db->order_by('TanggalDibuat'); //Berdasarkan Yang Paling Awal
    	return $this->db->get('ViewMasterHubunganKeluarga')->result(); 
    }

    public function getById($IdHubunganKeluarga) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('ViewMasterHubunganKeluarga', ['IdHubunganKeluarga' => $IdHubunganKeluarga])->row();
    }

    public function add() //Menambahkan Data Baru Ke Database
    {
        $HubunganKeluarga       = $this->input->post('HubunganKeluarga');
        $StatusAktif            = 1;

        $data = array
        (
            'HubunganKeluarga'  => $HubunganKeluarga,
            'StatusAktif'       => $StatusAktif
        );

        $this->db->insert('ViewMasterHubunganKeluarga',$data);
    }

    public function edit($IdHubunganKeluarga) //Mengupdate Data Yang Diubah Ke Database
    {
        $HubunganKeluarga       = $this->input->post('HubunganKeluarga');
        $StatusAktif            = $this->input->post('StatusAktif');

        $data = array
        (
            'HubunganKeluarga'  => $HubunganKeluarga,
            'StatusAktif'       => $StatusAktif
        );

        $this->db->where('IdHubunganKeluarga',$IdHubunganKeluarga);
        $this->db->update('ViewMasterHubunganKeluarga',$data);
    }
    
}