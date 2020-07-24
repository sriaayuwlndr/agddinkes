        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content ">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Input Kinerja Pegawai </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Input Kinerja Pegawai</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <?=$this->session->flashdata('notifikasi');?>
                                <div id="calendar1"></div> <!-- Manggil Library Javascript Full Calendar -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalInputAktivitasUtama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Input Kinerja</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                                        <div class="section-block">
                                        </div>
                                        <div class="simple-card" style="border-color: #e6e6e6; border-width: 2px;">
                                            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                                <li class="nav-item" style="width: 33%">
                                                    <a class="nav-link active border-left-0" id="utama-tab-simple" data-toggle="tab" href="#utama-simple" role="tab" aria-controls="utama" aria-selected="true">Input Kinerja Utama</a>
                                                </li>
                                                <li class="nav-item" style="width: 33%">
                                                    <a class="nav-link" id="umum-tab-simple" data-toggle="tab" href="#umum-simple" role="tab" aria-controls="umum" aria-selected="false">Input Kinerja Umum</a>
                                                </li>
                                                <li class="nav-item" style="width: 34%">
                                                    <a class="nav-link" id="daftaraktivitas-tab-simple" data-toggle="tab" href="#daftaraktivitas-simple" role="tab" aria-controls="daftaraktivitas" aria-selected="false">Daftar Aktivitas Terinput</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent5" >
                                                <!-- ========================================================= -->
                                                <!-- =============== TAB INPUT AKTIVITAS UTAMA ============== -->
                                                <!-- ========================================================= -->
                                                <div class="tab-pane fade show active" id="utama-simple" role="tabpanel" aria-labelledby="utama-tab-simple" >
                                                    <form method="POST" action="<?= base_url('agd/ekinerja/inputkinerja/addaktivitas');?>" enctype="multipart/form-data">
                                                        <div class="form-group" id="GetTanggalUtama">
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-form-label">Daftar Aktivitas Utama</label>
                                                            <select class="form-control <?php echo form_error('IdAktivitas') ? 'is-invalid':'' ?>" name="IdAktivitas">
                                                                <option selected disabled>--Pilih Aktivitas--</option>
                                                                <?php foreach($GetAktivitasUtama as $Get) {?>
                                                                    <option value="<?= $Get['IdAktivitas'];?>"><?= $Get['Aktivitas'].' ( '.$Get['WaktuEfektif'].' Menit)';?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                <?php echo form_error('IdAktivitas') ?>
                                                            </div> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Jam Mulai*</label>
                                                            <input type="time" class="form-control <?php echo form_error('JamMulai') ? 'is-invalid':'' ?>" id="JamMulai" name="JamMulai">
                                                            <?= form_error('JamMulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Jam Selesai:</label>
                                                            <input type="time" class="form-control <?php echo form_error('JamSelesai') ? 'is-invalid':'' ?>" id="JamSelesai" name="JamSelesai">
                                                            <?= form_error('JamSelesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                                            <textarea class="form-control" id="Keterangan" name="Keterangan" rows="1"></textarea>
                                                            <?= form_error('Keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-space btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
                                                            <button type="button" class="btn btn-space btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- ========================================================= -->
                                                <!-- =============== TAB INPUT AKTIVITAS UTAMA END ============== -->
                                                <!-- ========================================================= -->
                                                 <!-- ========================================================= -->
                                                <!-- =============== TAB INPUT AKTIVITAS UMUM ============== -->
                                                <!-- ========================================================= -->
                                                <div class="tab-pane fade" id="umum-simple" role="tabpanel" aria-labelledby="umum-tab-simple" >
                                                    <form method="POST" action="<?= base_url('agd/ekinerja/inputkinerja/addaktivitas');?>" enctype="multipart/form-data">
                                                        <!-- <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Tanggal Kinerja*</label>
                                                            <input type="text" class="form-control" id="tgl" name="TanggalKinerja" disabled="">
                                                        </div> -->
                                                        <div class="form-group" id="GetTanggalUmum"><!-- Ada di JS FORM INPUTNYA --></div> 
                                                        <div class="form-group">
                                                            <label class="col-form-label">Daftar Aktivitas Umum</label>
                                                            <select class="form-control <?php echo form_error('IdAktivitas') ? 'is-invalid':'' ?>" name="IdAktivitas">
                                                                <option selected disabled>--Pilih Aktivitas--</option>
                                                                <?php foreach($GetAktivitasUmum as $Get) {?>
                                                                    <option value="<?= $Get['IdAktivitas'];?>"><?= $Get['Aktivitas'].' ( '.$Get['WaktuEfektif'].' Menit)';?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                <?php echo form_error('IdAktivitas') ?>
                                                            </div> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Jam Mulai*</label>
                                                            <input type="time" class="form-control <?php echo form_error('JamMulai') ? 'is-invalid':'' ?>" id="JamMulai" name="JamMulai">
                                                            <?= form_error('JamMulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Jam Selesai:</label>
                                                            <input type="time" class="form-control <?php echo form_error('JamSelesai') ? 'is-invalid':'' ?>" id="JamSelesai" name="JamSelesai">
                                                            <?= form_error('JamSelesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                                            <textarea class="form-control" id="Keterangan" name="Keterangan" rows="1"></textarea>
                                                            <?= form_error('Keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-space btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
                                                            <button type="button" class="btn btn-space btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                 <!-- ========================================================= -->
                                                <!-- =============== TAB INPUT AKTIVITAS END ============== -->
                                                <!-- ========================================================= -->
                                                <!-- ========================================================= -->
                                                <!-- =============== TAB DAFTAR AKTIVITAS UTAMA =============== -->
                                                <!-- ========================================================= -->
                                                <div class="tab-pane fade" id="daftaraktivitas-simple" role="tabpanel" aria-labelledby="daftaraktivitas-tab-simple">
                                                    <a href="#" class="btn btn-danger">Hapus Semua Aktivitas di Tanggal Ini</a>
                                                    <br>
                                                    <br>
                                                    <?php foreach ($DaftarAktivitas as $Get) { ?>
                                                    <div class="accrodion-regular">
                                                        <div id="accordion3<?= $Get->IdKinerja;?>">
                                                            <div class="card">
                                                                <div class="card-header" id="headingSeven<?= $Get->IdKinerja;?>">
                                                                    <h5 class="mb-0">
                                                                       <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven<?= $Get->IdKinerja;?>" aria-expanded="true" aria-controls="collapseSeven<?= $Get->IdKinerja;?>">
                                                                         <span class="fas fa-angle-down mr-3"></span><?= $Get->Aktivitas;?>
                                                                       </button>
                                                                      </h5>
                                                                </div>
                                                                <div id="collapseSeven<?= $Get->IdKinerja;?>" class="collapse" aria-labelledby="headingSeven<?= $Get->IdKinerja;?>" data-parent="#accordion3<?= $Get->IdKinerja;?>">
                                                                    <div class="card-body">
                                                                        <p> Waktu: <?= date('H:i', strtotime($Get->JamMulai)).' s/d '.date('H:i', strtotime($Get->JamSelesai));?>
                                                                            <!-- <a href="#" class="btn btn-xs btn-secondary">Hapus</a> -->
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <!-- ========================================================= -->
                                                <!-- =============== TAB DAFTAR AKTIVITAS UTAMA =============== -->
                                                <!-- ========================================================= -->
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