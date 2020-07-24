        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 30%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Penilaian Kinerja Bawahan</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Penilaian Kinerja Bawahan</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h5 class="card-header-title">Penilaian Kinerja Bawahan</h5>
                            </div>
                            <div class="card-body">
                                <?=$this->session->flashdata('notifikasi');?>
                                <div class="row">
                                    <?php foreach ($GetBawahan as $Get) { ?>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card" >
                                            <div class="card-header" style="background-color: #7eb2f2; color: white;">
                                                <?= $Get->NamaLengkap; ?>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"><?= $Get->Jabatan; ?></p>
                                            </div>
                                            <div class="card-footer p-0 text-center d-flex justify-content-center ">
                                                <div class="card-footer-item card-footer-item-bordered">
                                                    <a href="<?= base_url('agd/ekinerja/penilaiankinerja/penilaianaktivitas/'.$Get->IdPegawai);?>" class="card-link">Aktivitas</a>
                                                </div>
                                                <div class="card-footer-item card-footer-item-bordered">
                                                    <a href="#" class="card-link" data-toggle="modal" data-target="#exampleModal">
                                                    Perilaku
                                                    </a>
                                                    
                                                </div>
                                                <!-- <div class="card-footer-item card-footer-item-bordered">
                                                    <a href="<?= base_url('agd/ekinerja/penilaiankinerja/capaiankinerja/'.$Get->IdPegawai);?>" class="card-link">Capaian</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- ============ Modal Penilaian Perilaku ============ -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Penilaian Perilaku</h5>
                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </a>
                                                </div>
                                                <form class="form-horizontal" method="post" action="<?= base_url('agd/ekinerja/penilaiankinerja/penilaianperilaku');?>" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <div class="form-row">
                                                                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label style="">Nama Bawahan*</label>
                                                                    <select class="selectpicker" name="IdPegawai">
                                                                        <option selected disabled="">Pilih</option>
                                                                        <?php foreach($GetBawahan as $Get) { ?>
                                                                            <option value="<?= $Get->IdPegawai; ?>"><?= $Get->NamaLengkap;?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label style="">Nilai*</label>
                                                                    <select class="selectpicker" name="NilaiPerilaku">
                                                                        <option selected disabled="">Pilih</option>
                                                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-row">
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label style="">Bulan*</label>
                                                                    <select class="selectpicker" name="Bulan">
                                                                        <option selected disabled="">Pilih</option>
                                                                        <?php foreach($GetBulan as $Get) { ?>
                                                                            <option value="<?= $Get->IdBulan;?>"><?= $Get->Bulan;?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                    <label style="">Tahun*</label>
                                                                    <select class="selectpicker" name="Tahun">
                                                                        <option selected disabled="">Pilih</option>
                                                                        <!-- <?php foreach($GetTahun as $Get) { ?>
                                                                            <option value="<?= $Get->Tahun;?>"><?= $Get->Tahun;?></option>
                                                                        <?php } ?> -->
                                                                        <option value="<?= date('Y')-1;?>"><?= date('Y')-1;?></option>
                                                                        <option value="<?= date('Y');?>"><?= date('Y');?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-space btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
                                                        <button type="button" class="btn btn-space btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============ Modal Penilaian Perilaku ============ -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        <?php $this->load->view("agd/partial/footer.php") ?>
        <?php $this->load->view("agd/partial/js.php") ?>

        <!-- <div class="modal fade" id="PerilakuModal" tabindex="-1" role="dialog" aria-labelledby="PerilakuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="PerilakuModalLabel">Penilaian Perilaku</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="<?= base_url('agd/ekinerja/penilaiankinerja/penilaianperilaku/'.$Get->IdPegawai);?>">
                                <div class="form-group">
                                    <div class="form-row">
                                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <label style="">Nama Bawahan*</label>
                                            <select class="selectpicker" id="IdPegawai" name="IdPegawai">
                                                <option disabled selected value="<?= $Get->IdPegawai; ?>"><?= $Get->NamaLengkap;?></option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <label style="">Nilai*</label>
                                            <select class="selectpicker" id="IdPegawai" name="IdPegawai">
                                                <option selected disabled="">Pilih</option>
                                                <?php for ($i = 1; $i <= 10; $i++)
                                                { ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <label style="">Bulan*</label>
                                            <select class="selectpicker" name="Bulan">
                                                <option selected disabled="">Pilih</option>
                                                <?php foreach ($GetBulan as $Get) : ?>
                                                    <option value="<?= $Get['IdBulan']; ?>"><?= $Get['Bulan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                            <label style="">Tahun*</label>
                                            <select class="selectpicker" name="Tahun">
                                                <option selected disabled="">Pilih</option>
                                                <?php foreach ($GetTahun as $Get) : ?>
                                                    <option value="<?= $Get['IdTahun']; ?>"><?= $Get['IdTahun']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <a href="#" class="btn btn-primary">Save changes</a>
                        </div>
                    </div>
                </div>
            </div> -->

