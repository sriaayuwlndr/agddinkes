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
            'label'     => 'Username',
            'rules'     => 'required|trim',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Password',
            'label'     => 'ID Password',
            'rules'     => 'required|trim',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function TerakhirLogin($IdPegawai)
    {
        $TerakhirLogin          = date('Y-m-d H:i:s');

        $data = array
        (
            'TerakhirLogin'     => $TerakhirLogin,
        );

        $this->db->where('IdPegawai', $IdPegawai);
        $this->db->update('MasterLogin', $data);
    }
}