<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProfil extends CI_Model
{
    // Nama Tabel           = MasterPegawai
    // Nama View dari Tabel = ViewMasterPegawai

    public function __construct()
    {
        $this->load->database();
    }

    public function get($IdPegawai) //Menampilkan Semua Data
    {
    	return $this->db->get_where('ViewMasterPegawai', ['IdPegawai' => $IdPegawai])->row();
    }

    public function GetJabatanAtasan($IdPegawai) //Menampilkan Semua Data
    {
        $this->db->select('Jabatan as JabatanAtasan, IdJabatanAtasan');
        $this->db->from('MasterPegawai');
        $this->db->join('MasterJabatan', 'MasterPegawai.IdJabatanAtasan = MasterJabatan.IdJabatan');
        $this->db->where('IdPegawai', $IdPegawai);
        return $this->db->get()->row();
    }

    public function GetNamaAtasan($IdJabatanAtasan) 
    {
        $this->db->select('NamaLengkap as NamaAtasan');
        $this->db->from('MasterPegawai');
        $this->db->where('IdJabatan', $IdJabatanAtasan);
        return $this->db->get()->row();
    }

    public function GetMasaKerja($IdPegawai)
    {
        return $this->db->get_where('V_HitungGaji', ['IdPegawai' => $IdPegawai])->row();
    }

    public function GetRiwayatPendidikanFormal($IdPegawai)
    {
        return $this->db->get_where('ViewRiwayatPendidikanFormal', ['IdPegawai' => $IdPegawai])->result();
    }

    public function GetRiwayatKeluarga($IdPegawai)
    {
        return $this->db->get_where('ViewRiwayatKeluarga', ['IdPegawai' => $IdPegawai])->result();
    }

    public function GetPendidikanTerakhir($IdPegawai)
    {
        // return $this->db->query("SELECT dbo.FunctionPendidikanTerakhir ($IdPegawai) AS PendidikanTerakhir")->row();
        $this->db->select('*');
        $this->db->from('RiwayatPendidikanFormal');
        $this->db->join('MasterPendidikanFormal','MasterPendidikanFormal.IdPendidikanFormal = RiwayatPendidikanFormal.IdPendidikanFormal');
        $this->db->where('IdPegawai', $IdPegawai);
        $this->db->where('StatusPengakuan = 1');
        return $this->db->get()->row();

    }
}