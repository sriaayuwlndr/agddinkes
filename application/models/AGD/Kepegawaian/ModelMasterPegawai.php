<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterPegawai extends CI_Model
{
	// Nama Tabel 			= MasterPegawai
    // Nama View dari Tabel = ViewMasterPegawai

	public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'NamaLengkap',
            'label'     => 'Nama Lengkap',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s wajib diisi.</b>')],

            ['field'    => 'JenisKelamin',
            'label'     => 'JenisKelamin',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function createIdPegawai($JenisKelamin)
    {
        $query 			= $this->db->query("SELECT MAX(RIGHT(IdPegawai,4)) AS IdPegawaiTerakhir FROM MasterPegawai");

        $IdPegawaiBaru 	= "";

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $Get)
            {
                $tmp                = ((int)$Get->IdPegawaiTerakhir)+1;
                $IdPegawaiBaru      = sprintf("%04s", $tmp);
            }
        }

        else
        {
            $IdPegawaiBaru = "0001";
        }

        // date_default_timezone_set('Asia/Jakarta');
        return date('yym').'0'.$JenisKelamin.$IdPegawaiBaru;
    }

    public function get()
    {
        $this->db->order_by('TanggalDibuat','DESC'); //Diurutkan Berdasarkan Data Terbaru
        return $query = $this->db->get('ViewMasterPegawai')->result();
    }

    public function getJabatanAtasan()
    {
        return $this->db->get('MasterJabatan')->result();
    }

    public function add() //Menambahkan Data Baru Ke Database
    {
        $NamaLengkap        = $this->input->post('NamaLengkap');
        $JenisKelamin       = $this->input->post('JenisKelamin');
        $IdJabatanAtasan    = $this->input->post('IdJabatanAtasan');
        $IdPegawai          = $this->ModelMasterPegawai->createIdPegawai($JenisKelamin);
        $Password           = password_hash('12345', PASSWORD_DEFAULT);
        $IdHakAkses         = 6;
        $StatusAktif        = 1;

        If($JenisKelamin == 1)
        {
        	$JenisKelamin = 'L';
        }

        else
        {
        	$JenisKelamin = 'P';
        }


        $DataMasterPegawai = array
        (
            'IdPegawai'             => $IdPegawai,
            'NamaLengkap'           => $NamaLengkap,
            'JenisKelamin'          => $JenisKelamin,
            'IdJabatanAtasan'       => $IdJabatanAtasan,
            'StatusAktif'           => $StatusAktif
        );

        $DataMasterLogin = array
        (
            'IdPegawai'             => $IdPegawai,
            'Password'              => $Password,
            'IdHakAkses'            => $IdHakAkses,
            'StatusAktif'           => $StatusAktif
        );


        $this->db->insert('ViewMasterPegawai', $DataMasterPegawai);
        $this->db->insert('ViewMasterLogin', $DataMasterLogin);
        $this->db->insert('LogMasterPegawai', $DataMasterPegawai);
    }

}