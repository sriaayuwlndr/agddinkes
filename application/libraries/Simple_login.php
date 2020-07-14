<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/*
 * Simple_login Class
 * Class ini digunakan untuk fitur login, proteksi halaman dan logout
 * @author  Gun Gun Priatna
 * @url    https://recodeku.blogspot.com
 */
 
class Simple_login 
{
	 
	// SET SUPER GLOBAL
	var $CI = NULL;
	 
	/**
	* Class constructor
	*
	* @return   void
	*/
	public function __construct() {
		$this->CI =& get_instance();
	}
	 
	/*
	* cek username dan password pada table users, jika ada set session berdasar data user dari
	* table users.
	* @param string username dari input form
	* @param string password dari input form
	*/

	public function login($IdPegawai, $Password) {
					 
		//cek username dan password
		$query = $this->CI->db->get_where('ViewMasterLogin',array('IdPegawai'=>$IdPegawai,'Password' => MD5($Password)));
		 
		if($query->num_rows() == 1) 
		{
			//ambil data user berdasar username
			$admin 		= $this->CI->db->query('SELECT * FROM ViewMasterLogin WHERE IdPegawai = '.$IdPegawai.' ')->row();
			// $admin     	= $row->row();
			$id   		= $admin->IdPegawai;
			 
			//set session user
			$this->CI->session->set_userdata('IdPegawai', $IdPegawai);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			 
			//redirect ke halaman dashboard
			redirect(site_url('kepegawaian/dashboard'));
		}


		else

		{
			 
			//jika tidak ada, set notifikasi dalam flashdata.
			$this->CI->session->set_flashdata('sukses','IdPegawai atau password anda salah, silakan coba lagi.. ');
			 
			//redirect ke halaman login
			redirect(site_url('login'));
		}
		return false;
	}
			 
	/**
	* Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
	* login
	*/
	public function cek_login() {
		 
		//cek session username
		if($this->CI->session->userdata('IdPegawai') == '') {
			 
			//set notifikasi
			$this->CI->session->set_flashdata('sukses','Anda belum login');
			 
			//alihkan ke halaman login
			redirect(site_url('login'));
		}
	}
	 
	/**
	* Hapus session, lalu set notifikasi kemudian di alihkan
	* ke halaman login
	*/
	public function logout() {
		$this->CI->session->unset_userdata('IdPegawai');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(site_url('login'));
	}
}
