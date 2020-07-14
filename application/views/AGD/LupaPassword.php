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
                <h3 class="mb-1">Halaman Lupa Password</h3>
                <p>Mohon isi data Anda dengan benar.</p>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <form action="<?php echo base_url('agd/lupapassword')?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo form_error('IdPegawai') ? 'is-invalid':'' ?>" type="text" name="IdPegawai" placeholder="Username" autocomplete="off">
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
                        <input class="form-control form-control-lg <?php echo form_error('TanggalLahir') ? 'is-invalid':'' ?>" type="date" name="TanggalLahir" placeholder="Tanggal Lahir">
                        <div class="invalid-feedback">
                            <?php echo form_error('TanggalLahir') ?>
                        </div> 
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo form_error('NomorHandphone') ? 'is-invalid':'' ?>" type="number" name="NomorHandphone" placeholder="Nomor Handphone Aktif">
                        <div class="invalid-feedback">
                            <?php echo form_error('NomorHandphone') ?>
                        </div> 
                    </div>
                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-primary" type="submit">Reset Password Akun Saya</button>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <p><a href="<?php echo base_url('agd/login');?>" class="text-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Kembali ke Halaman Login.</a></p>
            </div>
        </div>
    </div>
    <!-- ============================================= -->
    <!-- ===== Modal BerhasilResetPassword ===== -->
    <div class="modal fade" id="BerhasilResetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <p>Reset Password Berhasil</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Username</label>
                                <input type="text" name="Username" id="Username" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Password</label>
                                <input type="text" name="Password" id="Password" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== Modal BerhasilResetPassword End ===== -->
    <!-- ============================================= -->
</body> 
</html>