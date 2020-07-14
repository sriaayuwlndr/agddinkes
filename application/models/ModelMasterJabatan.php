<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterJabatan extends CI_Model
{

	public function __construct()
    {
        $this->load->database();
    }

    public function get() //MENAMPILKAN SEMUA DATA MASTER AGAMA
    {
    	return $query = $this->db->get('MasterJabatan')->result();
    }

    public function add($data) //SUBMIT DATA MASTER AGAMA YANG DITAMBAHKAN
    {
        return $query = $this->db->insert('MasterAgama',$data);
    }

    public function edit($IdAgama) //MENAMPILKAN DATA DI FORM EDIT
    {
        return $query = $this->db->query("SELECT * FROM MasterAgama where IdAgama='$IdAgama'")->result();
    }

    public function save($IdAgama, $data) //MENYIMPAN DATA AGAMA YANG DIUBAH
    {
        $this->db->where('IdAgama',$IdAgama);
        $query = $this->db->update('MasterAgama',$data);
    }
}