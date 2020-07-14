<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelInputKinerjaUtama extends CI_Model
{
    // Nama Tabel           = MasterMappingAktivitas
    // Nama View dari Tabel = ViewMasterMappingAktivitas

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'TanggalKinerja',
            'label'     => 'Tanggal Kinerja',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'IdAktivitas',
            'label'     => 'Nama Aktivitas',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'JamMulai',
            'label'     => 'Jam Mulai',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'JamSelesai',
            'label'     => 'Jam Selesai',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Keterangan',
            'label'     => 'Keterangan',
            'rules'     => 'max_length[70]',
            'errors'    => array('max_length' => '<b>%s Maksimal 70 Karakter.</b>')]
        ];
    }

    public function getAktivitasUtama($IdPegawai) //Menampilkan Data Mapping Aktivitas Berdasarkan Id Pegawai
    {
        $query = $this->db->query("SELECT MasterMappingAktivitas.IdAktivitas, MasterAktivitas.Aktivitas FROM MasterMappingAktivitas INNER JOIN MasterAktivitas ON MasterMappingAktivitas.IdAktivitas = MasterAktivitas.IdAktivitas WHERE (MasterMappingAktivitas.IdPegawai = '$IdPegawai')")->result_array();

        return $query;
    }

    public function add($IdPegawai) //Menambahkan Data Baru Ke Database
    {
        $TanggalKinerja            = $this->input->post('TanggalKinerja');
        $IdKinerja                 = $this->ModelInputKinerjaUtama->createIdKinerja($TanggalKinerja);
        $IdAktivitas               = $this->input->post('IdAktivitas');
        $JamMulai                  = $this->input->post('JamMulai');
        $JamSelesai                = $this->input->post('JamSelesai');
        $Keterangan                = $this->input->post('Keterangan');
        $StatusValidasi            = 0; //0 = Belum Di Validasi 

        $data = array
        (

            'IdKinerja'             => $IdKinerja,
            'TanggalKinerja'        => $TanggalKinerja,
            'IdPegawai'             => $IdPegawai,
            'IdAktivitas'           => $IdAktivitas,
            'IdAktivitas'           => $IdAktivitas,
            'JamMulai'              => $JamMulai,
            'JamSelesai'            => $JamSelesai,
            'Keterangan'            => $Keterangan,
            'StatusValidasi'        => $StatusValidasi
        );

        $this->db->insert('MasterKinerjaPegawai',$data);
    }

    public function createIdKinerja($TanggalKinerja) //MEMBUAT REGISTRATION CODE
    {
        $query              = $this->db->query("SELECT MAX(RIGHT(IdKinerja,4)) AS kode_max FROM MasterKinerjaPegawai WHERE TanggalKinerja = '$TanggalKinerja'");

        $CreateIdKinerja    = "";
        
        if($query->num_rows()>0)
        {
            foreach($query->result() as $Get)
            {
                $tmp                = ((int)$Get->kode_max)+1;
                $CreateIdKinerja   = sprintf("%04s", $tmp);
            }
        }

        else
        {
            $CreateIdKinerja        = "0001";
        }

        return date('ymd', strtotime($TanggalKinerja)).$CreateIdKinerja;
    }

}