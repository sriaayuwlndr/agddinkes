        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 30%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Master Gaji & Tunjangan Keluarga Berdasarkan Pergub DKI Jakarta</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Master Gaji</li>
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
                                <h5 class="card-header-title">Master Gaji</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('agd/kepegawaian/mastergajipokok/add');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Data</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Masa Kerja</th>
                                                <th>PTKP</th>
                                                <th>Keterangan</th>
                                                <th>Nominal</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Masa Kerja</th>
                                                <th>PTKP</th>
                                                <th>Keterangan</th>
                                                <th>Nominal</th>
                                                <th>Edit</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetMasterGaji as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <td><?= $Get->PendidikanFormal; ?></td>
                                                <td><?= $Get->MasaKerja1.'-'.$Get->MasaKerja2; ?></td>
                                                <td><?= $Get->PTKP; ?></td>
                                                <td><?= $Get->Keterangan; ?></td>
                                                <td><?= $Get->NominalGaji; ?></td>
                                                <td style="width: 10%;">
                                                    <a href="<?= base_url('agd/kepegawaian/mastergaji/edit/'.$Get->IdPendidikanFormal&$Get->IdMasaKerja&$Get->IdPTKP);?>" class="btn btn-rounded btn-info btn-xs"><i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $this->load->view("agd/partial/footer.php") ?>
        <?php $this->load->view("agd/partial/js.php") ?>