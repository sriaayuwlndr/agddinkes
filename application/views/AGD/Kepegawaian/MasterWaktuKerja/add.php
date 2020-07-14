        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 50%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Tambah Master Waktu Kerja</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url('agd/kepegawaian/masterwaktukerja');?>" class="breadcrumb-link"><i class="fas fa-folder"></i> Master Waktu Kerja</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Tambah Master Waktu Kerja</li>
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
                                <h5 class="card-header-title">Tambah Master Waktu Kerja</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('agd/kepegawaian/masterwaktukerja');?>" class="btn btn-rounded btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <?=$this->session->flashdata('notifikasi');?>
                                <form method="post" action="<?php echo base_url('agd/kepegawaian/masterwaktukerja/add');?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">PTKP*</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" name="PTKP" placeholder="Ketik Disini" class="form-control <?php echo form_error('PTKP') ? 'is-invalid':'' ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('PTKP') ?>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Keterangan*</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" name="Keterangan" placeholder="Ketik Disini" class="form-control <?php echo form_error('Keterangan') ? 'is-invalid':'' ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('Keterangan') ?>
                                            </div> 
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