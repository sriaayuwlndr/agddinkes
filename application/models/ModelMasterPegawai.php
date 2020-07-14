<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMasterPegawai extends CI_Model
{

	public function __construct()
    {
        $this->load->database();
    }

    public function get()
    {
        $this->db->order_by('TanggalDibuat','DESC');
        return $query = $this->db->get('MasterPegawai')->result();
    }

    public function add($InsertIntoMasterPegawai)
    {
        return $query = $this->db->insert('MasterPegawai',$InsertIntoMasterPegawai);
    }

    public function addMasterLogin($InsertIntoMasterLogin)
    {
        return $query = $this->db->insert('MasterLogin',$InsertIntoMasterLogin);
    }

    public function addLogMasterPegawai($InsertIntoMasterPegawai)
    {
        return $query = $this->db->insert('LogMasterPegawai',$InsertIntoMasterPegawai);
    }

    public function createIdPegawai($JenisKelamin)
    {
        $query = $this->db->query("SELECT MAX(RIGHT(IdPegawai,4)) AS IdPegawaiTerakhir FROM MasterPegawai");

        $IdPegawaiBaru = "";

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

        date_default_timezone_set('Asia/Jakarta');
        return date('yym').'0'.$JenisKelamin.$IdPegawaiBaru;
    }

    public function edit($IdPegawai)
    {
        return $query = $this->db->query("SELECT * FROM MasterPegawai where IdPegawai='$IdPegawai'")->result();
    }

    public function save($IdPegawai, $data)
    {
        $this->db->where('IdPegawai',$IdPegawai);
        $query = $this->db->update('MasterPegawai',$data);
    }

    public function delete($IdPegawai)
    {
        $query = $this->db->delete('MasterPegawai', array('IdPegawai' => $IdPegawai));
        return $query;
    }
}