        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 30%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Riwayat Kehadiran</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Riwayat Kehadiran</li>
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
                                <h5 class="card-header-title">Riwayat Kehadiran</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>JadwalKerja</th>
                                                <th>JamMasuk</th>
                                                <th>JamPulang</th>
                                                <th>KetJadwal</th>
                                                <th>JamKehadiran</th>
                                                <th>JamBalik</th>
                                                <th>Terlambat</th>
                                                <th>PulangCepat</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>JadwalKerja</th>
                                                <th>JamMasuk</th>
                                                <th>JamPulang</th>
                                                <th>KetJadwal</th>
                                                <th>JamKehadiran</th>
                                                <th>JamBalik</th>
                                                <th>Terlambat</th>
                                                <th>PulangCepat</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetRiwayatKehadiran as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <td><?= date('d M Y',strtotime($Get->JadwalKerja)); ?></td>
                                                <td><?= date('H:i:s',strtotime($Get->JamMasuk)); ?></td>
                                                <td><?= date('H:i:s',strtotime($Get->JamPulang)); ?></td>
                                                <td><?= $Get->KetJadwal; ?></td>
                                                <td>
                                                    <?php 
                                                        if(empty($Get->JamKehadiran))
                                                        {
                                                            echo "-";
                                                        }
                                                        
                                                        else
                                                        {
                                                            echo date('d M Y H:i:s',strtotime($Get->JamKehadiran));
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        if(empty($Get->JamBalik))
                                                        {
                                                            echo "-";
                                                        }
                                                        
                                                        else
                                                        {
                                                            echo date('d M Y H:i:s',strtotime($Get->JamBalik));
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $Get->Terlambat; ?></td>
                                                <td><?= $Get->PulangCepat; ?></td>
                                                <td><?= $Get->Keterangan; ?></td>
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