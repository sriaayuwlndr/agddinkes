        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Master Waktu Kerja</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Master Waktu Kerja</li>
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
                                <h5 class="card-header-title">Master Waktu Kerja</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('agd/kepegawaian/masterwaktukerja/add');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Data</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Waktu</th>
                                                <th>Keterangan</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Pulang</th>
                                                <th>Status Aktif</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Waktu</th>
                                                <th>Keterangan</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Pulang</th>
                                                <th>Status Aktif</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Edit</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetMasterWaktuKerja as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <td><?= $Get->IdWaktuKerja; ?></td>
                                                <td><?= $Get->Keterangan; ?></td>
                                                <td><?= date('H:i',strtotime($Get->JamMasuk));?></td>
                                                <td><?= date('H:i',strtotime($Get->JamPulang));?></td>
                                                <td><?= $Get->StatusAktifWaktuKerja;?></td>
                                                <td><?= date('d M Y H:i:s',strtotime($Get->TanggalDibuat));?></td>
                                                <td>
                                                    <a href="<?= base_url('agd/kepegawaian/masterwaktukerja/edit/'.$Get->IdWaktuKerja);?>" class="btn btn-rounded btn-info btn-xs"><i class="fas fa-edit"></i>
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