<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //RULES UNTUK VALIDASI SAAT LOGIN
    {
        return
        [
            ['field'    => 'IdPegawai',
            'label'     => 'ID Pegawai',
            'rules'     => 'required|trim',
            'errors'    => array('required' => '<b>Kolom %s Wajib Diisi.</b>')],

            ['field'    => 'Password',
            'label'     => 'ID Password',
            'rules'     => 'required|trim',
            'errors'    => array('required' => '<b>Kolom %s Wajib Diisi.</b>')]
        ];
    }

	function OtentikasiPengguna($IdPegawai,$Password) //CEK ID PEGAWAI DAN PASSWORD
	{
		return $this->db->query("SELECT * FROM ViewMasterLogin WHERE IdPegawai ='$IdPegawai' AND Password = '$Password' ");
		
	}
}