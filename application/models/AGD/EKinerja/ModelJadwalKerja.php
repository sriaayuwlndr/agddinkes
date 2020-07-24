<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJadwalKerja extends CI_Model
{

	public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'Tahun',
            'label'     => 'Tahun',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Bulan',
            'label'     => 'Bulan',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],
        ];
    }

    public function GetJadwalKerjaNonShift()
    {
    	return $query = $this->db->get('ViewJadwalKerja')->result();
    }

    public function GetJabatan($IdPegawai)
    {
        return $this->db->get_where('MasterPegawai', ['IdPegawai' => $IdPegawai])->row();
    }

    public  function GetBawahan($IdJabatan)
    {
        return $this->db->get_where('ViewMasterPegawai', ['IdJabatanAtasan' => $IdJabatan])->result();
    }

    public function GetJadwalPerencanaan($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("SELECT * FROM ViewJadwalKerja WHERE IdPegawai = '$IdPegawai' AND MONTH(JadwalKerja) = '$Bulan' AND year(JadwalKerja) = '$Tahun'  AND JenisJadwal = 'P'")->result();
    }

    public function GetJadwalRealisasi($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("SELECT * FROM ViewJadwalKerja WHERE IdPegawai = '$IdPegawai' AND MONTH(JadwalKerja) = '$Bulan' AND year(JadwalKerja) = '$Tahun'  AND JenisJadwal = 'R'")->result();
    }

    public function GetPegawai($IdPegawai)
    {
        return $this->db->get_where('ViewMasterPegawai', ['IdPegawai' => $IdPegawai])->row_array();
    }

    public function GetBulan()
    {
        return $this->db->get('MasterBulan')->result();
    }
}