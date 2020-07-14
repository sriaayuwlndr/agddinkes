<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title;?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/fonts/circular-std/style.css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body
    {
        height: 100%;
    }

    body
    {
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
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><a href="<?php echo base_url('login');?>"><img class="logo-img" src="<?php echo base_url(); ?>media/gambar/LogoAGD.png" alt="logo" width="20%"></a><br><br><span class="splash-description">Sistem Informasi Manajemen</span>
                Ambulans Gawat Darurat<br>Dinas Kesehatan Provinsi DKI Jakarta
            </div>
            <div class="card-header text-center">
                <h3 class="mb-1">Reset Password</h3>
                <p>Mohon Simpan Password Anda!</p>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('notifikasi'); ?>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control form-control-lg" type="text" name="IdPegawai" autocomplete="off" value="<?= $GetPasswordBaru['IdPegawai'];?>">
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input class="form-control form-control-lg" type="text" name="Password" autocomplete="off" value="<?= $GetPasswordBaru['IdPegawai'];?>">
                </div>
            </div>
            <div class="card-footer bg-white">
                <p><a href="<?php echo base_url('agd/login');?>" class="text-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Kembali ke Halaman Login.</a></p>
            </div>
        </div>
    </div>
</body> 
</html>