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
                            <h2 class="pageheader-title">Master Jabatan</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Master Jabatan</li>
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
                                <h5 class="card-header-title">Master Jabatan</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('kepegawaian/masteragama/add');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Master Jabatan</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jabatan</th>
                                                <th>Pengkali</th>
                                                <th>Grading</th>
                                                <th>Status Aktif</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetMasterJabatan as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no;?></th>
                                                <td><?php echo $Get->Jabatan;?></td>
                                                <td><?php echo $Get->Pengkali;?></td>
                                                <td><?php echo $Get->Grading;?></td>
                                                <td>
                                                    <?php 
                                                        if ($Get->StatusAktif == '1')
                                                        {
                                                            echo "Aktif";
                                                        }

                                                        else

                                                        {
                                                            echo "Tidak Aktif";
                                                        }
                                                    ?>
                                                </td>
                                                <td style="width: 10%;">
                                                    <a href="<?php echo base_url('kepegawaian/masteragama/edit/'.$Get->IdJabatan);?>" class="btn btn-rounded btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jabatan</th>
                                                <th>Pengkali</th>
                                                <th>Grading</th>
                                                <th>Status Aktif</th>
                                                <th>Action</th>
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