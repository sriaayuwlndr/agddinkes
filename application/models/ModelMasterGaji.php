<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterGaji extends CI_Model
{

	public function __construct()
    {
        $this->load->database();
    }

    public function get() //MENAMPILKAN SEMUA DATA MASTER GAJI
    {
        // $this->db->select('MasterPendidikanFormal.*, GajiPokok.*, GajiMasaKerja.*, GajiPTKP.*, GajiNominal.*');
        // $this->db->from('GajiPokok');
        // $this->db->join('MasterPendidikanFormal', 'MasterPendidikanFormal.IdPendidikanFormal = GajiPokok.IdPendidikanFormal');
        // $this->db->join('GajiMasaKerja', 'GajiMasaKerja.IdMasaKerja = GajiPokok.IdMasaKerja');
        // $this->db->join('GajiPTKP', 'GajiPTKP.IdPTKP = GajiPokok.IdPTKP');
        // $this->db->join('GajiNominal', 'GajiNominal.IdNominalGajiPokok = GajiPokok.IdNominalGapok');
        // $this->db->order_by('GajiPokok.IdPendidikanFormal', 'ASC');
        // $this->db->order_by('GajiMasaKerja.IdMasaKerja', 'ASC');
        // $this->db->order_by('GajiPTKP.IdPTKP', 'ASC');
        // $query = $this->db->get()->result();
        // return $query;
        $this->db->order_by('IdPendidikanFormal, IdMasaKerja, IdPTKP');
        return $this->db->get('ViewMasterGaji')->result();

    }

    public function getMasterPendidikanFormal() //SUBMIT DATA MASTER AGAMA YANG DITAMBAHKAN
    {
        return $query = $this->db->get('MasterPendidikanFormal')->result();

    }

    public function getMasterMasaKerja() //SUBMIT DATA MASTER GAJI YANG DITAMBAHKAN
    {
        return $query = $this->db->get('GajiMasaKerja')->result();
        
    }

    public function getMasterPTKP() //SUBMIT DATA MASTER GAJI YANG DITAMBAHKAN
    {
        return $query = $this->db->get('GajiPTKP')->result();
        
    }

    public function add($data) //SUBMIT DATA MASTER GAJI YANG DITAMBAHKAN
    {
        return $query = $this->db->insert('GajiPokok',$data);
    }

    public function edit($IdAgama) //MENAMPILKAN DATA DI FORM EDIT
    {
        return $query = $this->db->query("SELECT * FROM MasterAgama where IdAgama='$IdAgama'")->result();
    }

    public function save($IdAgama, $data) //MENYIMPAN DATA GAJI YANG DIUBAH
    {
        $this->db->where('IdAgama',$IdAgama);
        $query = $this->db->update('MasterAgama',$data);
    }
}