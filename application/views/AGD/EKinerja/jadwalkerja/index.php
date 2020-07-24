        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 30%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Jadwal Kerja Bawahan</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Jadwal Kerja Bawahan</li>
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
                                <h5 class="card-header-title">Jadwal Kerja Bawahan</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('agd/ekinerja/jadwalkerja/upload');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Jadwal Kerja</a>
                                </div>
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
                                                    <a href="<?= base_url('agd/ekinerja/jadwalkerja/perencanaan/'.$Get->IdPegawai);?>" class="card-link">Jadwal Perencanaan</a>
                                                </div>
                                                <div class="card-footer-item card-footer-item-bordered">
                                                    <a href="<?= base_url('agd/ekinerja/jadwalkerja/realisasi/'.$Get->IdPegawai);?>" class="card-link">Jadwal Realisasi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        <?php $this->load->view("agd/partial/footer.php") ?>
        <?php $this->load->view("agd/partial/js.php") ?>