<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><a href="<?php echo base_url('login');?>"><img class="logo-img" src="<?php echo base_url(); ?>media/gambar/LogoAGD.png" alt="logo" width="20%"></a><br><span class="splash-description">KEPEGAWAIAN</span>
                <p class="text-center">Ambulans Gawat Darurat<br>Dinas Kesehatan Provinsi DKI Jakarta</p>
            </div>
            <div class="card-header text-center">
                <h3 class="mb-1">Lupa Password</h3>
                <p>Mohon isi data Anda dengan benar.</p>
                <div class="card-body">
                    <?php
                        if($this->session->flashdata('msg'))
                        {
                            echo '<p style="color: red;">'.$this->session->flashdata('msg').'</p>';
                        }
                    ?>
                    <form action="<?php echo base_url('login/resetpassword')?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="IdPegawai" required="" placeholder="ID Pegawai" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="email" name="Email" required="" placeholder="E-mail" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="date" name="TanggalLahir"  required="" placeholder="Tanggal Lahir">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="number" name="NomorHandphone" required="" placeholder="Nomor Handphone Aktif">
                        </div>
                        <div class="form-group pt-2">
                            <button class="btn btn-block btn-primary" type="submit">Reset Password Akun Saya</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p><a href="<?php echo base_url('login');?>" class="text-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Kembali ke Halaman Login.</a></p>
            </div>
        </div>
    </div>
</body>

 
</html>