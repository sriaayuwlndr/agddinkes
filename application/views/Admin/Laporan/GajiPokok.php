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
                            <h2 class="pageheader-title">Laporan Gaji Pokok</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Laporan Gaji Pokok</li>
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
                                <h5 class="card-header-title">Laporan Gaji Pokok</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pegawai</th>
                                                <th>Nama Lengkap</th>
                                                <th>Pendidikan Formal</th>
                                                <th>Mulai Kerja</th>
                                                <th>Lama Bekerja</th>
                                                <th>Masa Kerja</th>
                                                <th>Status PTKP</th>
                                                <th>Nominal Gaji Pokok Diterima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetLaporanGajiPokok as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no;?></th>
                                                <td><?php echo $Get->IdPegawai;?></td>
                                                <td><?php echo $Get->NamaLengkap;?></td>
                                                <td><?php echo $Get->PendidikanFormal;?></td>
                                                <td><?php echo date('d M Y',strtotime($Get->MulaiKerja));?></td>
                                                <td><?php echo $Get->LamaBekerja;?></td>
                                                <td><?php echo $Get->MasaKerja1.'-'.$Get->MasaKerja2;?></td>
                                                <td><?php echo $Get->StatusPTKP;?></td>
                                                <td><?php echo $Get->NominalGajiPokok;?></td>
                                                <td style="width: 10%;">
                                                    <a href="<?php echo base_url('kepegawaian/masteragama/edit/');?><?php echo $Get->IdPegawai;?>" class="btn btn-rounded btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pegawai</th>
                                                <th>Nama Lengkap</th>
                                                <th>Pendidikan Formal</th>
                                                <th>Mulai Kerja</th>
                                                <th>Lama Bekerja</th>
                                                <th>Masa Kerja</th>
                                                <th>Status PTKP</th>
                                                <th>Nominal Gaji Pokok Diterima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
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