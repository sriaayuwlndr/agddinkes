        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 30%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Penilaian Aktivitas <?= $GetPegawai['NamaLengkap'];?></h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url('agd/ekinerja/penilaiankinerja');?>" class="breadcrumb-link"><i class="fas fa-folder"></i> Penilaian Kinerja Bawahan</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Penilaian Aktivitas <?= $GetPegawai['NamaLengkap'];?></li>
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
                                <h5 class="card-header-title">Penilaian Aktivitas <?= $GetPegawai['NamaLengkap'];?></h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?=base_url('agd/ekinerja/penilaiankinerja');?>" class="btn btn-rounded btn-info"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url('agd/ekinerja/penilaiankinerja/penilaianaktivitas/'.$GetPegawai['IdPegawai']);?>" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-xl-10 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="">Pilih Bulan*</label>
                                             <input type="month" id="tgl" name="tgl" class="form-control" autocomplete="off" required>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <br>
                                            <input class="btn btn-rounded btn-primary btn-sm form-control" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <br>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <!-- <th>ID Kinerja</th> -->
                                                <th>Nama Aktivitas</th>
                                                <th>Keterangan Aktivitas</th>
                                                <th>Tanggal Aktivitas</th>
                                                <th>Jam Aktivitas</th>
                                                <th>Waktu Efektif</th>
                                                <th>Volume</th>
                                                <th>Status Validasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <!-- <th>ID Kinerja</th> -->
                                                <th>Nama Aktivitas</th>
                                                <th>Keterangan Aktivitas</th>
                                                <th>Tanggal Aktivitas</th>
                                                <th>Jam Aktivitas</th>
                                                <th>Waktu Efektif</th>
                                                <th>Volume</th>
                                                <th>Status Validasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetKinerjaPegawai as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <!-- <td><?= $Get->IdKinerja; ?></td> -->
                                                <td><?= $Get->Aktivitas; ?></td>
                                                <td><?= $Get->Keterangan; ?></td>
                                                <td><?= date('d M Y',strtotime($Get->TanggalKinerja)); ?></td>
                                                <td><?= date('H:i',strtotime($Get->JamMulai)); ?> s/d <?= date('H:i',strtotime($Get->JamSelesai)); ?></td>
                                                <td><?= $Get->WaktuEfektif; ?></td>
                                                <td><?= $Get->Volume; ?></td>
                                                <td>
                                                    <?php 
                                                        if($Get->StatusValidasi == 0)
                                                        {
                                                            echo "<p class='text-danger'> $Get->StatusValidasiKinerja </p>";
                                                        }

                                                        else
                                                        {
                                                            echo "<p class='text-success'> $Get->StatusValidasiKinerja </p>";
                                                        }
                                                    ?>                                                 
                                                </td>
                                                <td style="width: 30%;">
                                                    <a href="<?= base_url('agd/ekinerja/penilaiankinerja/validasiaktivitas/'.$Get->IdKinerja);?>" class="btn btn-rounded btn-info btn-xs" onclick="return confirm('Apakah Anda Yakin Memvalidasi Aktivitas Ini?')"><i class="fas fa-check"></i> Setuju</a>
                                                    <a href="<?= base_url('agd/ekinerja/penilaiankinerja/BatalValidasiAktivitas/'.$Get->IdKinerja);?>" class="btn btn-rounded btn-danger btn-xs" onclick="return confirm('Yakin Untuk Membatalkan Validasi?')"><i class="fas fa-times"></i> Tidak Setuju</a>
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