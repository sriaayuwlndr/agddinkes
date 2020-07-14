<?php
function PeriksaLogin()
{
    $ci = get_instance();

    if (!$ci->session->userdata('IdPegawai'))
    {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Anda belum Login!
              </div>');
        redirect('agd/login');
    } 

    else 

    {
        $IdHakAkses     = $ci->session->userdata('IdHakAkses'); //kita login sebagai hak akses apa
        $Menu           = $ci->uri->segment(2); // baca url yang mau kita akses di segment ke 2
        $GetMenu        = $ci->db->get_where('MasterMenu', ['Menu' => $Menu])->row_array(); //ada ga nama menu yang sama dengan segment ke 2
        $IdMenu         = $GetMenu['IdMenu'];
        $AksesPengguna  = $ci->db->get_where('ViewMasterAksesMenu',
            [
            'IdHakAkses'       => $IdHakAkses,
            'IdMenu'           => $IdMenu
            ]);

        if ($AksesPengguna->num_rows() < 1)
        {
            redirect('agd/blocked');
        }
    }
}