<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterJabatan extends CI_Model
{
    // Nama Tabel 			= MasterJabatan
    // Nama View dari Tabel = ViewMasterJabatan

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'Jabatan',
            'label'     => 'Jabatan',
            'rules'     => 'required|max_length[100]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Pengkali',
            'label'     => 'Pengkali',
            'rules'     => 'required|decimal',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Grading',
            'label'     => 'Grading',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function get() //Menampilkan Semua Data
    {
        $this->db->order_by('TanggalDibuat'); //Berdasarkan Yang Paling Awal
    	return $this->db->get('ViewMasterJabatan')->result(); 
    }

    public function getById($IdJabatan) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('ViewMasterJabatan', ['IdJabatan' => $IdJabatan])->row();
    }

    public function add() //Menambahkan Data Baru Ke Database
    {
        $Jabatan            = $this->input->post('Jabatan');
        $Pengkali           = $this->input->post('Pengkali');
        $Grading            = $this->input->post('Grading');
        $StatusAktif        = 1;

        $data = array
        (
            'Jabatan'       => $Jabatan,
            'Pengkali'      => $Pengkali,
            'Grading'       => $Grading,
            'StatusAktif'   => $StatusAktif
        );

        $this->db->insert('ViewMasterJabatan',$data);
    }

    public function edit($IdJabatan) //Mengupdate Data Yang Diubah Ke Database
    {
        $Jabatan            = $this->input->post('Jabatan');
        $Pengkali           = $this->input->post('Pengkali');
        $Grading            = $this->input->post('Grading');
        $StatusAktif        =  $this->input->post('StatusAktif');

        $data = array
        (
            'Jabatan'       => $Jabatan,
            'Pengkali'      => $Pengkali,
            'Grading'       => $Grading,
            'StatusAktif'   => $StatusAktif
        );

        $this->db->where('IdJabatan',$IdJabatan);
        $this->db->update('ViewMasterJabatan',$data);
    }
    
}