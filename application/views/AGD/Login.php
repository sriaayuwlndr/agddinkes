<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Ambulans Gawat Darurat Dinas Kesehatan Provinsi DKI Jakarta</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/fonts/circular-std/style.css">
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
<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="<?php echo base_url('agd/login');?>"><img class="logo-img" src="<?php echo base_url(); ?>media/gambar/LogoAGD.png" alt="logo" width="20%"></a><br><br><span class="splash-description">Sistem Informasi Manajemen</span>
                Ambulans Gawat Darurat<br>Dinas Kesehatan Provinsi DKI Jakarta
            </div>
            <div class="card-body">
                <?=$this->session->flashdata('notifikasi');?>
                <form action="<?php echo base_url('agd/login')?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo form_error('IdPegawai') ? 'is-invalid':'' ?>" name="IdPegawai" type="text" placeholder="Username" autocomplete="off">
                        <div class="invalid-feedback">
                            <?php echo form_error('IdPegawai') ?>
                        </div> 
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo form_error('Password') ? 'is-invalid':'' ?>" name="Password" type="password" placeholder="Password">
                        <div class="invalid-feedback">
                            <?php echo form_error('Password') ?>
                        </div> 
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Log In</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="<?php echo base_url('agd/registrasi')?>" class="footer-link">REGISTRASI</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="<?php echo base_url('agd/lupapassword');?>" class="footer-link">LUPA PASSWORD</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>