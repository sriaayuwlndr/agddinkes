<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLupaPassword extends CI_Model
{

	public function __construct()
    {
        $this->load->database();
    }

    public function rules()
    {
        return
        [
            ['field'    => 'IdPegawai',
            'label'     => 'Username',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'Email',
            'label'     => 'Email',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'TanggalLahir',
            'label'     => 'Tanggal Lahir',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'NomorHandphone',
            'label'     => 'NomorHandphone',
            'rules'     => 'required',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function rulesResetPassword()
    {
        return
        [
            ['field'    => 'Password',
            'label'     => 'Password',
            'rules'     => 'trim|required|min_length[8]|matches[PasswordConfirm]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')],

            ['field'    => 'PasswordConfirm',
            'label'     => 'Konfirmasi Password',
            'rules'     => 'trim|required|min_length[8]|matches[Password]',
            'errors'    => array('required' => '<b>%s Wajib Diisi.</b>')]
        ];
    }

    public function PeriksaData()
    {
        

    }

    public function submitResetPassword($IdPegawai)
    {
        $Password           = password_hash($IdPegawai, PASSWORD_DEFAULT);

        $data = array
        (
            'Password'       => $Password
        );

        $this->db->where('IdPegawai',$IdPegawai);
        $this->db->update('ViewMasterLogin',$data);
        return $this->db->get_where('ViewMasterLogin', ['IdPegawai' => $IdPegawai])->row_array();
    }

}