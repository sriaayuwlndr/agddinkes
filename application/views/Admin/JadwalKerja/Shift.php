        <?php $this->load->view("admin/partial/header.php") ?>
        <?php $this->load->view("admin/partial/menu.php") ?>
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Jadwal Kerja Shift</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Jadwal Kerja Shift</li>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom: 50%;">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h5 class="card-header-title">Jadwal Kerja Shift</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('kepegawaian/jadwalkerja/uploadshift');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Jadwal Kerja Shift</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Pegawai</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Jam Kerja</th>
                                                <th>Jenis Jadwal</th>
                                                <th>Jadwal Kerja</th>
                                                <th>Waktu Kerja</th>
                                                <th>Tanggal Upload</th>
                                                <th>ID User Upload</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Pegawai</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Jam Kerja</th>
                                                <th>Jenis Jadwal</th>
                                                <th>Jadwal Kerja</th>
                                                <th>Waktu Kerja</th>
                                                <th>Tanggal Upload</th>
                                                <th>ID User Upload</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetJadwalKerjaShift as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no;?></th>
                                                <td><?php echo $Get->IdPegawai;?></td>
                                                <td><?php echo $Get->NamaLengkap;?></td>
                                                <td><?php echo $Get->JenisJamKerja;?></td>
                                                <td><?php echo $Get->JenisJadwal;?></td>
                                                <td>
                                                    <?php echo date('d M Y',strtotime($Get->JadwalKerja));?>
                                                </td>
                                                <td><?php echo $Get->IdWaktuKerja;?></td>
                                                <td>
                                                    <?php echo date('d M Y',strtotime($Get->TanggalDibuat));?>
                                                </td>
                                                <td><?php echo $Get->IdPegawaiUpload;?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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