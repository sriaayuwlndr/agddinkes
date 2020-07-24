        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Jadwal Kerja Perencanaan <?= $GetPegawai['NamaLengkap'];?></h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url('agd/ekinerja/jadwalkerja');?>" class="breadcrumb-link"><i class="fas fa-folder"></i> Jadwal Kerja Bawahan</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Jadwal Kerja Perencanaan <?= $GetPegawai['NamaLengkap'];?></li>
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
                                <h5 class="card-header-title">Jadwal Kerja Perencanaan <?= $GetPegawai['NamaLengkap'];?></h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?=base_url('agd/ekinerja/jadwalkerja');?>" class="btn btn-rounded btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url('agd/ekinerja/jadwalkerja/perencanaan/'.$GetPegawai['IdPegawai']);?>" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-xl-10 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="">Filter Jadwal*</label>
                                             <input type="month" id="tgl" name="tgl" class="form-control" autocomplete="off" required>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <br>
                                            <input class="btn btn-rounded btn-primary btn-sm form-control" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Jadwal</th>
                                                <th>Jadwal Kerja</th>
                                                <th>Waktu Kerja</th>
                                                <th>Tanggal Upload</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Jadwal</th>
                                                <th>Jadwal Kerja</th>
                                                <th>Waktu Kerja</th>
                                                <th>Tanggal Upload</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetJadwalPerencanaan as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no;?></th>
                                                <td><?php echo $Get->JenisJadwal;?></td>
                                                <td>
                                                    <?php echo date('d M Y',strtotime($Get->JadwalKerja));?>
                                                </td>
                                                <td><?php echo $Get->Keterangan;?> <span class="badge badge-pill badge-info">(<?= $Get->IdWaktuKerja; ?>)</span> </td>
                                                <td>
                                                    <?php echo date('d M Y',strtotime($Get->TanggalDibuat));?>
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