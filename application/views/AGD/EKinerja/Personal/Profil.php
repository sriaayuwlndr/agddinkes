        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Profil Pegawai</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Profil Pegawai</li>
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
                                                        <h2 class="mb-1"><?= $GetProfilPegawai->NamaLengkap;?></h2>
                                                    </div>
                                                </div>
                                                <div class="user-avatar-address">
                                                    <p class="border-bottom pb-3">
                                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i><?= $GetProfilPegawai->Jabatan;?></span>
                                                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Pendidikan Terakhir: <?= $GetProfilPegawai->PendidikanFormal;?> </span>
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
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Jabatan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Pendidikan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Keluarga</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-pelatihan" role="tab" aria-controls="pills-msg" aria-selected="false">Pelatihan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-sanksi" role="tab" aria-controls="pills-msg" aria-selected="false">Sanksi</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <h5 class="card-header">Identitas Pegawai</h5>
                                                    <div class="card-body">
                                                        <form action="#">
                                                            <div class="form-group">
                                                                <label>ID Pegawai</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->IdPegawai;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama Lengkap</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NamaLengkap;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Gelar Depan</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->GelarDepan;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Gelar Belakang</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->GelarBelakang;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->JenisKelamin;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->TempatLahir;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="text" name="name" class="form-control" value="<?= date('d M Y', strtotime($GetProfilPegawai->TanggalLahir));?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Agama</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->Agama;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status Pernikahan</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->StatusPerkawinan;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Golongan Darah</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->GolonganDarah;?>" disabled>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Jumlah Anak</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->Agama;?>" disabled>
                                                            </div> -->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <h5 class="card-header">Kontak</h5>
                                                    <div class="card-body">
                                                        <form action="#" id="basicform" data-parsley-validate="">
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->Alamat;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->Email;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No. Handphone</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorHandphone;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No. Telepon</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorHandphone;?>" disabled>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <h5 class="card-header">Informasi Jabatan</h5>
                                                    <div class="card-body">
                                                        <form action="#" id="basicform" data-parsley-validate="">
                                                            <div class="form-group">
                                                                <label>Jabatan Pegawai</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->Jabatan;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Pendidikan Terakhir</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetPendidikanTerakhir->PendidikanFormal;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jabatan Atasan</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetJabatanAtasan->JabatanAtasan;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama Atasan</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetNamaAtasan->NamaAtasan;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Unit Kerja</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->UnitKerja;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Pendidikan Terakhir</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorHandphone;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Masa Kerja</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorHandphone;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status Pegawai</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->StatusPegawai;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status Jam Kerja</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->StatusJamKerja;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Mulai Kerja</label>
                                                                <input type="text" name="name" class="form-control" value="<?= date('d M Y', strtotime($GetProfilPegawai->MulaiKerja));?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Lama Bekerja</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetMasaKerja->MasaKerja;?>" disabled>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <h5 class="card-header">Lainnya</h5>
                                                    <div class="card-body">
                                                        <form action="#" id="basicform" data-parsley-validate="">
                                                            <div class="form-group">
                                                                <label>Nomor KTP</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NIK;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nomor NPWP</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorNPWP;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nomor Kartu Keluarga</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorKK;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nomor Rekening</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorRekening;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nomor SIM A</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorSimA;?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nomor SIM C</label>
                                                                <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorSimC;?>" disabled>
                                                            </div>
                                                            <div class="form-row form-group">
                                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label>Nomor STR</label>
                                                                    <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorSTR;?>" disabled>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label>Tanggal Berlaku STR</label>
                                                                    <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->TanggalBerlakuSTR;?>" disabled>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label>Tanggal Expired STR</label>
                                                                    <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->TanggalExpiredSTR;?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-row form-group">
                                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label>Nomor SIPP</label>
                                                                    <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->NomorSIPP;?>" disabled>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label>Tanggal Berlaku SIPP</label>
                                                                    <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->TanggalBerlakuSIPP;?>" disabled>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label>Tanggal Expired SIPP</label>
                                                                    <input type="text" name="name" class="form-control" value="<?= $GetProfilPegawai->TanggalExpiredSIPP;?>" disabled>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom: 50%;">
                                                <div class="card">
                                                    <div class="card-header d-flex">
                                                        <h5 class="card-header-title">Riwayat Jabatan</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered second" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Jabatan</th>
                                                                        <th>Nomor SK</th>
                                                                        <th>Masa Berlaku</th>
                                                                        <th>Status Jabatan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Jabatan</th>
                                                                        <th>Nomor SK</th>
                                                                        <th>Masa Berlaku</th>
                                                                        <th>Status Jabatan</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom: 50%;">
                                                <div class="card">
                                                    <div class="card-header d-flex">
                                                        <h5 class="card-header-title">Riwayat Pendidikan</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered second" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Pendidikan Formal</th>
                                                                        <th>Status Pengakuan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Pendidikan Formal</th>
                                                                        <th>Status Pengakuan</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                    <?php 
                                                                        $no = 0;
                                                                        foreach($GetRiwayatPendidikanFormal as $Get)
                                                                        {  
                                                                            $no++;

                                                                        ?>
                                                                        <tr>
                                                                            <th scope="row"><?= $no;?></th>
                                                                            <td><?= $Get->PendidikanFormal;?></td>
                                                                            <td><?= $Get->StatusPengakuanPendidikanFormal;?></td>
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
                                    <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom: 50%;">
                                                <div class="card">
                                                    <div class="card-header d-flex">
                                                        <h5 class="card-header-title">Riwayat Keluarga</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered second" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Hubungan Keluarga</th>
                                                                        <th>Nama Keluarga</th>
                                                                        <th>Status</th>
                                                                       
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Hubungan Keluarga</th>
                                                                        <th>Nama Keluarga</th>
                                                                        <th>Status</th>
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
                                    <div class="tab-pane fade" id="pills-pelatihan" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom: 50%;">
                                                <div class="card">
                                                    <div class="card-header d-flex">
                                                        <h5 class="card-header-title">Riwayat Pelatihan</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered second" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Pelatihan</th>
                                                                        <th>Lokasi</th>
                                                                        <th>Masa Berlaku</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Pelatihan</th>
                                                                        <th>Lokasi</th>
                                                                        <th>Masa Berlaku</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-sanksi" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom: 50%;">
                                                <div class="card">
                                                    <div class="card-header d-flex">
                                                        <h5 class="card-header-title">Riwayat Sanksi</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered second" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Nama</th>
                                                                        <th>Status</th>
                                                                        <th>Tanggal SK</th>
                                                                        <th>Alasan</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Nama</th>
                                                                        <th>Status</th>
                                                                        <th>Tanggal SK</th>
                                                                        <th>Alasan</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
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