<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelRegistrasi extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //RULES UNTUK VALIDASI SAAT TAMBAH DATA
    {
        return
        [
            ['field'    => 'IdPegawai',
            'label'     => 'ID Pegawai',
            'rules'     => 'required|is_unique[MasterLogin.IdPegawai]',
            'errors'    => array(
                                'required'      => '<b>Kolom %s Wajib Diisi.</b>',
                                'is_unique'     => '<b>Mohon Maaf, %s sudah melakukan registrasi.<b>'
                                )],

            ['field'    => 'Email',
            'label'     => 'Email',
            'rules'     => 'required|is_unique[MasterLogin.Email]',
            'errors'    => array(
                                'required'      => '<b>Kolom %s Wajib Diisi.</b>',
                                'is_unique'     => '<b>Mohon Maaf, %s sudah terdaftar.<b>'
                                )],

            ['field'    => 'Password',
            'label'     => 'Password',
            'rules'     => 'required|trim|min_length[5]|matches[PasswordConfirm]',
            'errors'    => array(
                                'required'      => '<b>Kolom %s Wajib Diisi.</b>',
                                'min_length'    => '<b>%s terlalu singkat.<b>',
                                'matches'       => '<b>%s tidak cocok.<b>'
                                )],

            ['field'    => 'PasswordConfirm',
            'label'     => 'Konfirmasi Password ',
            'rules'     => 'required|trim|matches[Password]',
            'errors'    => array(
                                'required'      => '<b>Kolom %s Wajib Diisi.</b>',
                                'matches'       => '<b>%s tidak cocok dengan Password<b>'
                                )],

        ];
    }

    public function registrasi($data, $dataTokenRegistrasi)
    {
        // $IdPegawai              = $this->input->post('IdPegawai');
        // $Email                  = $this->input->post('Email');
        // // $NomorHandphone         = $this->input->post('NomorHandphone');
        // $Password               = $this->input->post('Password');
        // $HakAkses               = 3;

        // $InsertToMasterLogin = array
        // (
        //     'IdPegawai'             => $IdPegawai,
        //     'Password'              => $Password,
        //     'HakAkses'              => $HakAkses
        // );

        // $UpdateToMasterPegawai = array
        // (
        //     'Email'                 => $Email,
        //     'NomorHandphone'        => $NomorHandphone,
        // );


        $this->db->insert('ViewMasterLogin',$data);
        $this->db->insert('LogTokenRegistrasi',$dataTokenRegistrasi);
    }

}