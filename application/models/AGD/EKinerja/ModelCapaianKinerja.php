<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelCapaianKinerja extends CI_Model
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

    public function GetPegawai($IdPegawai)
    {
        return $this->db->get_where('ViewMasterPegawai', ['IdPegawai' => $IdPegawai])->row_array();
    }

    public function GetStatusJamKerja($IdPegawai)
    {
        return $this->db->get_where('ViewMasterPegawai', ['IdPegawai' => $IdPegawai])->row_array();
    }

    public function GetHariLibur($Bulan, $Tahun)
    {
        return $this->db->query("SELECT COUNT(HariLibur) AS JumlahHariLibur FROM MasterHariLibur WHERE MONTH(TanggalHariLibur) = '$Bulan' AND year(TanggalHariLibur) = '$Tahun' AND StatusAktif = 1")->row();
    }

    public function GetKinerjaPegawai($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("SELECT * FROM ViewMasterKinerjaPegawai WHERE IdPegawai = '$IdPegawai' AND MONTH(TanggalKinerja) = '$Bulan' AND year(TanggalKinerja) = '$Tahun'")->result();
    }   

    public function GetAllCapaian($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("SELECT Case When SUM(capaian) Is Null Then 0 Else SUM(capaian) END AS SemuaCapaianKinerja FROM ViewMasterKinerjaPegawai WHERE IdPegawai = '$IdPegawai' AND MONTH(TanggalKinerja) = '$Bulan' AND year(TanggalKinerja) = '$Tahun'")->row_array();
    }

    public function GetValidasiCapaian($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("SELECT Case When SUM(capaian) IS NULL THEN 0 ELSE SUM(capaian) END AS ValidasiCapaianKinerja FROM ViewMasterKinerjaPegawai WHERE IdPegawai = '$IdPegawai' AND MONTH(TanggalKinerja) = '$Bulan' AND year(TanggalKinerja) = '$Tahun' AND StatusValidasi = '1'")->row_array();
    }

    public function GetTotalTerlambatDanPulangCepat($IdPegawai, $Bulan, $Tahun)
    {
         return $this->db->query("SELECT Case When SUM(convert(int,Terlambat)) is null then 0 else SUM(convert(int,Terlambat)) end as TotalTerlambat, case when SUM(convert(int,PulangCepat)) is null then 0 else replace(SUM(convert(int,PulangCepat)), '-','') end as TotalPulangCepat from ViewKehadiran WHERE IdPegawai = '$IdPegawai' AND MONTH(JadwalKerja) = '$Bulan' AND year(JadwalKerja) = '$Tahun'")->row();
    }

    public function GetGajiPokok($IdPegawai)
    {
       return $this->db->get_where('V_HitungTunjangan', ['IdPegawai' => $IdPegawai])->row_array();
    }

    public function GetPenambahanCapaianWaktuEfektif($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("EXEC SP_PenambahWaktuEfektif '$IdPegawai', '$Bulan', '$Tahun'")->result();
    }

    public function GetJumlahPenambahanCapaianWaktuEfektif($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("EXEC SP_JumlahPenambahWaktuEfektif '$IdPegawai', '$Bulan', '$Tahun'")->row();
    }

    public function GetPenguranganCapaianWaktuEfektif($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("EXEC SP_PengurangWaktuEfektif '$IdPegawai', '$Bulan', '$Tahun'")->result();
    }

    public function GetJumlahPenguranganCapaianWaktuEfektif($IdPegawai, $Bulan, $Tahun)
    {
        return $this->db->query("EXEC SP_JumlahPengurangWaktuEfektif '$IdPegawai', '$Bulan', '$Tahun'")->row();
    }

    public function GetSerapan($ConvertBulan, $ConvertTahun)
    {
        return $this->db->get_where('RiwayatSerapan', ['Bulan' => $ConvertBulan, 'Tahun' => $ConvertTahun])->row_array();
    }

    public function GetPerilaku($IdPegawai, $ConvertBulan, $ConvertTahun)
    {
        return $this->db->get_where('RiwayatPerilaku', ['IdPegawai' => $IdPegawai, 'Bulan' => $ConvertBulan, 'Tahun' => $ConvertTahun])->row_array();
    }  
}