<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrasi | AGD DINKES</title>
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
    <form class="splash-container" action="<?php echo base_url('registrasi/registrasi');?>" method="POST">
        <div class="card">
            <div class="card-header text-center"><a href="<?php echo base_url('login');?>"><img class="logo-img" src="<?php echo base_url(); ?>media/gambar/LogoAGD.png" alt="logo" width="20%"></a><br><span class="splash-description">KEPEGAWAIAN</span>
                <p class="text-center">Ambulans Gawat Darurat<br>Dinas Kesehatan Provinsi DKI Jakarta</p>
            </div>
            <div class="card-header text-center">
                <h3 class="mb-1">Registrasi Akun Pegawai</h3>
                <p>Mohon isi data Anda dengan benar.</p>
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo form_error('IdPegawai') ? 'is-invalid':'' ?>" type="text" name="IdPegawai" placeholder="ID Pegawai" autocomplete="off">
                        <div class="invalid-feedback">
                            <?php echo form_error('IdPegawai') ?>
                        </div> 
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo form_error('Email') ? 'is-invalid':'' ?>" type="email" name="Email" placeholder="E-mail" autocomplete="off">
                        <div class="invalid-feedback">
                            <?php echo form_error('Email') ?>
                        </div> 
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo form_error('Password') ? 'is-invalid':'' ?>" name="Password" id="pass1" type="password" placeholder="Password">
                        <div class="invalid-feedback">
                            <?php echo form_error('Password') ?>
                        </div> 
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo form_error('PasswordConfirm') ? 'is-invalid':'' ?>" name="PasswordConfirm" id="pass1" type="password" placeholder="Konfirmasi Password">
                        <div class="invalid-feedback">
                            <?php echo form_error('PasswordConfirm') ?>
                        </div> 
                    </div>
                    <!-- <div class="form-group">
                        <input class="form-control form-control-lg" type="number" name="NomorHandphone" placeholder="Nomor Handphone Aktif">
                    </div> -->
                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-primary" type="submit">Registrasi Akun Saya</button>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Sudah Registrasi? <a href="<?php echo base_url('login');?>" class="text-secondary">Login Disini.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>