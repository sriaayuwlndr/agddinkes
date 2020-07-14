<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('masterpegawai', ['idpegawai' => $this->session->userdata('idpegawai')])->row_array();

        $data['title'] = 'Input Kinerja';

        // $this->load->view('agd/partial/header', $data);
        // $this->load->view('agd/partial/menu', $data);
        // $this->load->view('agd/ekinerja/kinerjapegawai/index3', $data);
        // $this->load->view('agd/partial/footer', $data);
        // $this->load->view('agd/partial/js', $data);

        $this->load->view('agd/ekinerja/kinerjapegawai/index3', $data);
        
    }
}