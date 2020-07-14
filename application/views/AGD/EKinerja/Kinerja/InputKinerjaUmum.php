        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 50%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Input Kinerja Umum</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Input Kinerja Umum</li>
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
                                <h5 class="card-header-title">Input Kinerja Umum</h5>
                            </div>
                            <div class="card-body">
                                <?=$this->session->flashdata('notifikasi');?>
                                <form method="post" action="<?php echo base_url('agd/ekinerja/inputkinerjaumum/add');?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tanggal*</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="date" name="TanggalKinerja" placeholder="Ketik Disini" class="form-control <?php echo form_error('TanggalKinerja') ? 'is-invalid':'' ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('TanggalKinerja')?>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama Aktivitas*</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control form-control-lg <?php echo form_error('IdAktivitas') ? 'is-invalid':'' ?> pilih " name="IdAktivitas">
                                                <option value="">Pilih Aktivitas</option>
                                                <?php foreach($GetAktivitas as $Get ) {?>
                                                    <option value="<?php echo $Get->IdAktivitas; ?>"><?php echo $Get->Aktivitas.' ('.$Get->WaktuEfektif.' Menit)'; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('IdAktivitas') ?>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jam Mulai*</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="time" name="JamMulai" placeholder="Ketik Disini" class="form-control <?php echo form_error('JamMulai') ? 'is-invalid':'' ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('JamMulai') ?>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jam Selesai*</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="time" name="JamSelesai" placeholder="Ketik Disini" class="form-control <?php echo form_error('JamSelesai') ? 'is-invalid':'' ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('JamSelesai') ?>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Keterangan</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <textarea class="form-control" rows="1" name="Keterangan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button type="submit" class="btn btn-space btn-primary" onclick="return confirm('Jika Data Sudah Benar, Klik OK')"><i class="fas fa-paper-plane"></i> Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $this->load->view("agd/partial/footer.php") ?>
        <?php $this->load->view("agd/partial/js.php") ?>