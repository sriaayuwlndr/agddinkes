        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 27%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Upload Jadwal Kerja</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url('agd/ekinerja/jadwalkerja');?>" class="breadcrumb-link"><i class="fas fa-folder"></i> Jadwal Kerja Bawahan</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Upload Jadwal Kerja</li>
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
                                <h5 class="card-header-title">Upload Jadwal Kerja</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('agd/ekinerja/jadwalkerja');?>" class="btn btn-rounded btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <a href="<?php echo base_url('formatdata/formatjadwalkerja.xlsx'); ?>" class="btn btn-brand"><i class="fas fa-download"></i> Unduh Format Jadwal Kerja</a>
                                </div>
                                <hr>
                                <?=$this->session->flashdata('notifikasi');?>
                                <form method="post" action="<?php echo base_url('agd/ekinerja/jadwalkerja/submitupload');?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tahun*</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control pilih" name="Tahun">
                                                <option selected disabled="">Pilih</option>
                                                <option value="<?= date('Y')-1;?>"><?= date('Y')-1;?></option>
                                                <option value="<?= date('Y');?>"><?= date('Y');?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Bulan*</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control pilih" name="Bulan">
                                                <option selected disabled="">Pilih</option>
                                                <?php foreach($GetBulan as $Get) { ?>
                                                    <option value="<?= $Get->IdBulan;?>"><?= $Get->Bulan;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Upload File Jadwal Kerja</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="file" name="userfile" id="userfile" required accept=".xls, .xlsx" />
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