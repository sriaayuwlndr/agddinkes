<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUbahPassword extends CI_Model
{
    // Nama Tabel 			= MasterLogin
    // Nama View dari Tabel = ViewMasterLogin

    public function __construct()
    {
        $this->load->database();
    }

    public function rules() //Rules Untuk Validasi Saat Tambah Data
    {
        return
        [
            ['field'    => 'Password',
            'label'     => 'Password',
            'rules'     => 'required|min_length[8]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function getById($IdPegawai) //Menampilkan Data Berdasarkan ID
    {
        return $this->db->get_where('MasterLogin', ['IdPegawai' => $IdPegawai])->row();
    }

    public function UbahPassword($IdPegawai) //Mengupdate Data Yang Diubah Ke Database
    {
        $PasswordBaru           = $this->input->post('Password');
        $Password               = password_hash($PasswordBaru, PASSWORD_DEFAULT);

        $data = array
        (
            'Password'       => $Password
        );

        $this->db->where('IdPegawai',$IdPegawai);
        $this->db->update('MasterLogin',$data);
    }
}