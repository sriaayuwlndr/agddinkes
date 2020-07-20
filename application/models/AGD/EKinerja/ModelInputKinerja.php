<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelInputKinerja extends CI_Model
{

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

    public function GetAktivitasUtama($IdPegawai)
    {
    	$this->db->select('*');
    	$this->db->from('MasterMappingAktivitas');
    	$this->db->join('MasterAktivitas', 'MasterAktivitas.IdAktivitas = MasterMappingAktivitas.IdAktivitas', 'inner');
    	$this->db->where('MasterMappingAktivitas.IdPegawai', $IdPegawai);
        return $this->db->get()->result_array();
    }

    public function GetAktivitasUmum()
    {
        return $this->db->get('MasterAktivitas')->result_array();
    }

    public function DaftarAktivitas($IdPegawai)
    {
    	$this->db->select('*');
    	$this->db->from('MasterKinerjaPegawai');
    	$this->db->join('MasterAktivitas', 'MasterAktivitas.IdAktivitas = MasterKinerjaPegawai.IdAktivitas');
    	$this->db->where('MasterKinerjaPegawai.IdPegawai', $IdPegawai);
    	return $this->db->get()->result();
    }

    public function AddAktivitas($IdPegawai) //Menambahkan Data Baru Ke Database
    {
        $TanggalKinerja            = $this->input->post('TanggalKinerja');
        $IdKinerja                 = $this->ModelInputKinerja->createIdKinerja($TanggalKinerja);
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