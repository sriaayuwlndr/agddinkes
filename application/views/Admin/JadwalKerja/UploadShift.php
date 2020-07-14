msg        <?php $this->load->view("admin/partial/header.php") ?>
        <?php $this->load->view("admin/partial/menu.php") ?>
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="margin-bottom: 70px;">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Upload Jadwal Kerja Shift</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian/jadwalkerja/shift');?>" class="breadcrumb-link"><i class="fas fa-folder"></i> Jadwal Kerja Shift</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Upload Jadwal Kerja Shift</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h5 class="card-header-title">Upload Jadwal Kerja Shift</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('kepegawaian/jadwalkerja/shift');?>" class="btn btn-rounded btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->flashdata('msg')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                                <?php endif; ?>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <a href="<?php echo base_url('Excel/formatpenjualan.xlsx'); ?>" class="btn btn-brand"><i class="fas fa-download"></i> Unduh Format Jadwal Kerja Shift</a>
                                </div>
                                <hr>
                                <form method="post" action="<?php echo base_url('kepegawaian/jadwalkerja/SubmitUploadShiftCoba');?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tahun</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control form-control-lg pilih" name="TahunGaji">
                                                <option value="" disabled="" selected="">Pilih</option>
                                                <?php foreach($GetTahun as $Get ) {?>
                                                    <option value="<?php echo $Get->Tahun; ?>"><?php echo $Get->Tahun; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Bulan</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control form-control-lg pilih" name="BulanGaji">
                                                <option value="" disabled="" selected="">Pilih</option>
                                                
                                                <?php foreach($GetBulan as $Get ) {?>
                                                    <option value="<?php echo $Get->IdBulan; ?>"><?php echo $Get->Bulan; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jenis Jadwal Kerja</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control form-control-lg selectpicker" name="JenisJadwal">
                                                <option value="" disabled="" selected="">Pilih</option>
                                                <option value="P">Perencanaan</option>
                                                <option value="R">Realisasi</option>
                                            </select>
                                        </div>
                                    </div> -->
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
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
        <?php $this->load->view("admin/partial/footer.php") ?>
        <?php $this->load->view("admin/partial/js.php") ?>