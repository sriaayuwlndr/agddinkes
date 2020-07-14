        <?php $this->load->view("admin/partial/header.php") ?>
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
                            <h2 class="pageheader-title">Tambah Master Gaji</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url('kepegawaian/mastergaji');?>" class="breadcrumb-link"><i class="fas fa-folder"></i> Master Gaji</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Tambah Master Gaji</li>
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
                                <h5 class="card-header-title">Tambah Master Gaji</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('kepegawaian/mastergaji');?>" class="btn btn-rounded btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                                <?php endif; ?>
                                <form method="post" action="<?php echo base_url('kepegawaian/mastergaji/submit');?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Pendidikan Formal</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="IdPendidikanFormal" class="form-control pilih" required>
                                                <?php 
                                                    foreach($GetMasterPendidikanFormal as $Get)
                                                    {
                                                ?>
                                                <option value="<?php echo $Get->IdPendidikanFormal;?>"><?php echo $Get->PendidikanFormal;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Masa Kerja</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="IdMasaKerja" class="form-control pilih" required>
                                                <?php 
                                                    foreach($GetMasterMasaKerja as $Get)
                                                    {
                                                ?>
                                                <option value="<?php echo $Get->IdMasaKerja;?>"><?php echo $Get->MasaKerja1.'-'.$Get->MasaKerja2;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jenis PTKP</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="IdPTKP" class="form-control pilih" required>
                                                <?php 
                                                    foreach($GetMasterPTKP as $Get)
                                                    {
                                                ?>
                                                <option value="<?php echo $Get->IdPTKP;?>"><?php echo $Get->PTKP.' ( '.$Get->Keterangan.' )';?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nominal</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input type="text" name="NominalGaji" placeholder="Ketik Nominal" class="form-control" required>
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