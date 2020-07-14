<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLupaPassword extends CI_Model
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
            'rules'     => 'required',
            'errors'    => array('required' => '<b>Kolom %s Wajib Diisi.</b>')],

            ['field'    => 'Email',
            'label'     => 'Email',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>Kolom %s Wajib Diisi.</b>')],

            ['field'    => 'TanggalLahir',
            'label'     => 'Tanggal Lahir',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>Kolom %s Wajib Diisi.</b>')],

            ['field'    => 'NomorHandphone',
            'label'     => 'NomorHandphone',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>Kolom %s Wajib Diisi.</b>')]
        ];
    }

    public function getPegawaiByEmail($Email)
    {
        $query = $this->db->get_where('ViewMasterLogin', array('Email' => $Email), 1);   
        if($this->db->affected_rows() > 0)
        {  
           $row = $query->row();  
           return $row;  
        } 
    }

    public function addToken($IdPegawai)  
    {    
        $Token      = substr(sha1(rand()), 0, 30);   
        $Tanggal    = date('Y-m-d');  

        $data = array
        (  
            'Token'         => $Token,  
            'IdPegawai'     => $IdPegawai,  
            'Tanggal'       => $Tanggal  
        ); 



        $query = $this->db->insert_string('TokenLupaPassword',$data);  
        $this->db->query($query);  
        return $Token . $IdPegawai;  
    }  


}