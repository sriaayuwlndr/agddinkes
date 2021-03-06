<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPenilaianKinerja extends CI_Model
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
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function rulesPenilaianPerilaku() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'IdPegawai',
            'label'     => 'Nama Pegawai',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'NilaiPerilaku',
            'label'     => 'Nilai Perilaku',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Bulan',
            'label'     => 'Bulan',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Tahun',
            'label'     => 'Tahun',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],
        ];
    }

    public function getJabatan($IdPegawai) //Menampilkan Semua Data
    {
        return $this->db->get_where('MasterPegawai', ['IdPegawai' => $IdPegawai])->row();
    }

    public  function GetBawahan($IdJabatan)
    {
        return $this->db->get_where('ViewMasterPegawai', ['IdJabatanAtasan' => $IdJabatan])->result();
    }

    public function GetKinerjaPegawai($IdPegawai, $Bulan, $Tahun)
    {
        // return $this->db->get_where('MasterKinerjaPegawai', ['IdPegawai' => $IdPegawai, Date('TanggalKinerja') => CURDATE()])->result();
        // return $this->db->query("SELECT * FROM ViewMasterKinerjaPegawai WHERE IdPegawai = '$IdPegawai' AND MONTH(TanggalKinerja) = month(GETDATE()) AND year(TanggalKinerja) = year(GETDATE())")->result();
        return $this->db->query("SELECT * FROM ViewMasterKinerjaPegawai WHERE IdPegawai = '$IdPegawai' AND MONTH(TanggalKinerja) = '$Bulan' AND year(TanggalKinerja) = '$Tahun'")->result();
    }

    public function GetPegawai($IdPegawai)
    {
        return $this->db->get_where('ViewMasterPegawai', ['IdPegawai' => $IdPegawai])->row_array();
    }

    public function ValidasiAktivitas($IdKinerja)
    {
        $this->db->set('StatusValidasi', '1');
        $this->db->where('IdKinerja', $IdKinerja);
        $this->db->update('MasterKinerjaPegawai');
        return $this->db->get_where('MasterKinerjaPegawai', ['IdKinerja' => $IdKinerja])->row_array();
    }

    public function BatalValidasiAktivitas($IdKinerja)
    {
        $this->db->set('StatusValidasi', '2');
        $this->db->where('IdKinerja', $IdKinerja);
        $this->db->update('MasterKinerjaPegawai');
        return $this->db->get_where('MasterKinerjaPegawai', ['IdKinerja' => $IdKinerja])->row_array();
    }

    // public function BatalValidasiAktivitas($IdKinerja)
    // {
    //     $this->db->set('StatusValidasi', '2');
    //     $this->db->where('IdKinerja', $IdKnerja);
    //     $this->db->update('MasterKinerjaPegawai');
    //     return $this->db->get_where('MasterKinerjaPegawai', ['IdKinerja' => $IdKinerja])->row_array();
    // }

    public function GetBulan()
    {
        return $this->db->get('MasterBulan')->result();
    }

    public function GetTahun()
    {
        return $this->db->get('MasterTahun')->result();
    }

    public function AddPenilaianPerilaku($IdPegawaiSubmit)
    {
        $IdPegawai              = $this->input->post('IdPegawai');
        $Bulan                  = $this->input->post('Bulan');
        $Tahun                  = $this->input->post('Tahun');
        $NilaiPerilaku          = $this->input->post('NilaiPerilaku');
        // $TanggalDibuat          = date('')

        $data = array
        (
            'IdPegawai'         => $IdPegawai,
            'Bulan'             => $Bulan,
            'Tahun'             => $Tahun,
            'NilaiPerilaku'     => $NilaiPerilaku,
            'IdPegawaiSubmit'   => $IdPegawaiSubmit,
            // 'TanggalDibuat'     => $TanggalDibuat,
        );

        $this->db->insert('RiwayatPerilaku',$data);
    }

}