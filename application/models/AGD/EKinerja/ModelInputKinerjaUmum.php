<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelInputKinerjaUmum extends CI_Model
{
    // Nama Tabel           = MasterAktivitas
    // Nama View dari Tabel = ViewMasterAktivitas

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

    public function ValidasiJamSelesai($a)
    {
        if($a <= $JamMulai)
        {
            $this->form_validation->set_message('validasijamselesai', '<b>Hrus lebih besar dari jam mulai %s.</b>');
            return false;
        }

        else

        {
            return true;
        }
    }

    public function getAktivitas() //Menampilkan Data Mapping Aktivitas Berdasarkan Id Pegawai
    {
    	return $this->db->get('MasterAktivitas')->result();
    }

    public function add($IdPegawai) //Menambahkan Data Baru Ke Database
    {
        $TanggalKinerja            = $this->input->post('TanggalKinerja');
        $IdKinerja                 = $this->ModelInputKinerjaUmum->createIdKinerja($TanggalKinerja);

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