        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Sunting Profil Pegawai</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Sunting Profil Pegawai</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card influencer-profile-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="text-center">
                                            <img src="<?php echo base_url(); ?>assets/admin/images/avatar-4.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl" style="width: 100%; height: auto;">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div class="user-avatar-info">
                                                <div class="m-b-1 d-inline-block">
                                                    <div class="user-avatar-name">
                                                        <h2 class="mb-1">Sri Ayu Wulandari</h2>
                                                    </div>
                                                </div>
                                                <div class="user-avatar-address">
                                                    <p class="border-bottom pb-3">
                                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Pengadministrasi Teknologi Informasi</span>
                                                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Pendidikan Terakhir: S1 </span>
                                                        <span class="mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Mulai Berkerja: 01 Nov 2019</span>
                                                        <span class="mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Perempuan</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-9 col-md-7 col-sm-12 col-12">
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Keluarga</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <?=$this->session->flashdata('notifikasi');?>
                                                <form method="post" action="<?php echo base_url('agd/ekinerja/suntingprofil/submitsuntingprofil/'.$GetSuntingProfil->IdPegawai);?>" enctype="multipart/form-data">
                                                    <div class="card">
                                                        <h5 class="card-header">Profil Lengkap</h5>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>ID Pegawai</label>
                                                                <input type="text" name="IdPegawai" class="form-control" value="<?= $GetSuntingProfil->IdPegawai;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama Lengkap</label>
                                                                <input type="text" name="NamaLengkap" class="form-control" value="<?= $GetSuntingProfil->NamaLengkap;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin</label>
                                                                <input type="text" name="JenisKelamin" class="form-control" value="<?= $GetSuntingProfil->JenisKelamin;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" name="TempatLahir" class="form-control <?php echo form_error('TempatLahir') ? 'is-invalid':'' ?>" value="<?= $GetSuntingProfil->TempatLahir;?>">
                                                                <div class="invalid-feedback">
                                                                    <?php echo form_error('TempatLahir') ?>
                                                                </div> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="date" name="TanggalLahir" class="form-control <?php echo form_error('TanggalLahir') ? 'is-invalid':'' ?>" value="<?= $GetSuntingProfil->TanggalLahir;?>">
                                                                <div class="invalid-feedback">
                                                                    <?php echo form_error('TanggalLahir') ?>
                                                                </div> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Agama</label>
                                                                <select class="form-control form-control-lg pilih" name="IdAgama">
                                                                    <option value="<?= $GetSuntingProfil->IdAgama;?>" selected=""><b style="color: red;"><?php echo $GetSuntingProfil->Agama; ?></b></option>
                                                                    <?php foreach($GetAgama as $Get) {?>
                                                                        <option value="<?php echo $Get->IdAgama; ?>"><?php echo $Get->Agama; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    <?php echo form_error('IdAgama') ?>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <h5 class="card-header">Kontak</h5>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" name="Email" class="form-control <?php echo form_error('Email') ? 'is-invalid':'' ?>" value="<?= $GetSuntingProfil->Email;?>">
                                                                <div class="invalid-feedback">
                                                                    <?php echo form_error('Email') ?>
                                                                </div> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No. Handphone</label>
                                                                <input type="text" name="NomorHandphone" class="form-control <?php echo form_error('NomorHandphone') ? 'is-invalid':'' ?>" value="<?= $GetSuntingProfil->NomorHandphone;?>">
                                                                <div class="invalid-feedback">
                                                                    <?php echo form_error('NomorHandphone') ?>
                                                                </div> 
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No. Telepon</label>
                                                                <input type="text" name="NomorTelepon" class="form-control <?php echo form_error('NomorTelepon') ? 'is-invalid':'' ?>" value="<?= $GetSuntingProfil->NomorTelepon;?>">
                                                                <div class="invalid-feedback">
                                                                    <?php echo form_error('NomorTelepon') ?>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col col-sm-12 col-lg-9 offset-sm-1 offset-lg-0">
                                                            <button type="submit" class="btn btn-space btn-primary" onclick="return confirm('Jika Data Sudah Benar, Klik OK')"><i class="fas fa-paper-plane"></i> Simpan Perubahan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom: 50%;">
                                                <div class="card">
                                                    <div class="card-header d-flex">
                                                        <h5 class="card-header-title">Riwayat Keluarga</h5>
                                                        <div class="toolbar ml-auto">
                                                            <a href="<?php echo base_url('agd/ekinerja/suntingprofil/add');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Data</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered second" style="width:100%">
                                                                <thead>
                                                                    <tr>

                                                                        <th>No.</th>
                                                                        <th>Hubungan Keluarga</th>
                                                                        <th>Nama Keluarga</th>
                                                                        <th>Di Akui</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Hubungan Keluarga</th>
                                                                        <th>Nama Keluarga</th>
                                                                        <th>Di Akui</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                    <?php
                                                                        $no = 0;
                                                                        foreach ($GetRiwayatKeluarga as $Get)
                                                                        {
                                                                            $no++;
                                                                    ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $no;?></th>
                                                                        <td><?= $Get->HubunganKeluarga; ?></td>
                                                                        <td><?= $Get->NamaKeluarga; ?></td>
                                                                        <td><?= $Get->PengakuanKeluarga;?></td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            
        <?php $this->load->view("agd/partial/footer.php") ?>
        <?php $this->load->view("agd/partial/js.php") ?>