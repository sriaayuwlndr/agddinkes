        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Capaian Kinerja</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Capaian Kinerja</li>
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
                                <h5 class="card-header-title">Capaian Kinerja </h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url('agd/ekinerja/capaiankinerja/');?>" enctype="multipart/form-data">
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Kinerja</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Keterangan</th>
                                                <th>Status Validasi</th>
                                                <th>Waktu Efektif</th>
                                                <th>Volume</th>
                                                <th>Capaian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Kinerja</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Keterangan</th>
                                                <th>Status Validasi</th>
                                                <th>Waktu Efektif</th>
                                                <th>Volume</th>
                                                <th>Capaian</th>
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
                                                <td><?= date('d M Y',strtotime($Get->TanggalKinerja)); ?></td>
                                                <td><?= date('H:i:s',strtotime($Get->JamMulai)); ?></td>
                                                <td><?= date('H:i:s',strtotime($Get->JamSelesai)); ?></td>
                                                <td><?= $Get->Keterangan; ?></td>
                                                <td><?= $Get->StatusValidasiKinerja; ?></td>
                                                <td><?= $Get->WaktuEfektif; ?></td>
                                                <td><?= $Get->Volume; ?></td>
                                                <td><?= $Get->Capaian; ?></td>
                                                <td style="width: 10%;">
                                                    <a href="<?= base_url('agd/ekinerja/penilaiankinerja/penilaianaktivitas/'.$Get->IdPegawai);?>" class="btn btn-rounded btn-info btn-xs"><i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- total capaian waktu efektif = <?= $GetAllCapaian['SemuaCapaianKinerja'];?><br><br>
                            total input capaian waktu efektif = <?= $GetValidasiCapaian['ValidasiCapaianKInerja'];?><br><br>
                            batas maksimal jam kerja bulan ini = <?= $BatasMaksimal;?><br><br>
                            hari kerja kerja bulan ini = <?= $HariKerja;?><br><br>
                            jam kerja per hari = <?= $JamKerja;?><br><br> -->
                            <br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex" style="background-color: #91bbff;">
                                <h5 class="card-header-title">Hasil Capaian Kinerja</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">1. Total Seluruh Capaian Waktu Efektif = <?= $GetAllCapaian['SemuaCapaianKinerja'];?></li>
                                <li class="list-group-item">2. Total Validasi Capaian Waktu Efektif = 
                                    <?php 

                                    $GetValidasiCapaian = $GetValidasiCapaian['ValidasiCapaianKInerja'];
                                    echo $GetValidasiCapaian;

                                    ?>
                                    
                                   <!--  <?php
                                    if ($GetValidasiCapaian['ValidasiCapaianKInerja'] > $BatasMaksimal)
                                    {
                                        $GetValidasiCapaian = $BatasMaksimal;
                                    }

                                    else
                                    {
                                        $GetValidasiCapaian = $GetValidasiCapaian['ValidasiCapaianKInerja'];
                                    }
                                    echo $GetValidasiCapaian;
                                    ?> -->


                                </li>
                                <li class="list-group-item">3. Total Terlambat = <?= $GetTotalTerlambatDanPulangCepat->TotalTerlambat;?></li>
                                <li class="list-group-item">4. Total Pulang Cepat = <?= $GetTotalTerlambatDanPulangCepat->TotalPulangCepat;?></li>
                                <li class="list-group-item">5. Total Capaian Kinerja  = 


                                   <!-- <?php 
                                        $GetTotalCapaianKinerja = $GetValidasiCapaian ;
                                         echo $GetTotalCapaianKinerja;

                                    ?> -->



                                    <?php 
                                        $GetTotalCapaianKinerja = $GetValidasiCapaian - $GetTotalTerlambatDanPulangCepat->TotalPulangCepat - $GetTotalTerlambatDanPulangCepat->TotalTerlambat;

                                            // echo $GetTotalCapaianKinerja;


                                        if($GetTotalCapaianKinerja < 0)
                                        {
                                            $GetTotalCapaianKinerja = 0;
                                             echo $GetTotalCapaianKinerja;
                                        } 

                                        else
                                        {
                                            echo $GetTotalCapaianKinerja;

                                        }
                                    ?>
                                        
                                    </li>
                                <li class="list-group-item">6. Batas Maksimal Jam Kerja Bulan Ini = <?= $BatasMaksimal;?></li>
                                <li class="list-group-item">7. Hari Kerja Bulan Ini = <?= $JumlahHariKerja;?></li>
                                <li class="list-group-item">8. Jam Kerja Per Hari = <?= $JamKerjaPerHari;?></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex" style="background-color: #91bbff;">
                                <h5 class="card-header-title">Penambahan Capaian Waktu Efektif </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Absen</th>
                                                <th>Jumlah Hari</th>
                                                <th>Menit Penambah</th>
                                                <th>Jumlah Penambahan Menit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Absen</th>
                                                <th>Jumlah Hari</th>
                                                <th>Menit Penambah</th>
                                                <th>Jumlah Penambahan Menit</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetPenambahanCapaianWaktuEfektif as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <td><?= $Get->Keterangan; ?></td>
                                                <td><?= $Get->Jumlah; ?></td>
                                                <td><?= $Get->Penambah; ?></td>
                                                <td><?= $Get->Total; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-header d-flex" style="background-color: #91bbff;" >
                                            <h5 class="card-header-title" style="color: white;">Total Penambah Capaian Waktu Efektif: <?= $GetJumlahPenambahanCapaianWaktuEfektif->Total;?> Menit</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-header d-flex" style="background-color: #ff512e;" >
                                            <h5 class="card-header-title" style="color: white;">Total Capaian Aktivitas: 
                                                <?php 



                                                echo $GetTotalCapaianKinerja; 
                                                echo '+';

                                                 echo $GetJumlahPenambahanCapaianWaktuEfektif->Total;
                                                 echo '= ';
                                                 $TotalCapaianAktivitas = $GetTotalCapaianKinerja + $GetJumlahPenambahanCapaianWaktuEfektif->Total;
                                                 echo $TotalCapaianAktivitas;


                                                ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex" style="background-color: #ff512e;" >
                                <h5 class="card-header-title" style="color: white;">Pengurang Tunjangan Kinerja Daerah </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Absen</th>
                                                <th>Jumlah Hari</th>
                                                <th>Persentase Pengurang</th>
                                                <th>Jumlah Pengurangan (%)</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jenis Absen</th>
                                                <th>Jumlah Hari</th>
                                                <th>Persentase Pengurang</th>
                                                <th>Jumlah Pengurangan (%)</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetPenguranganCapaianWaktuEfektif as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <td><?= $Get->Keterangan; ?></td>
                                                <td><?= $Get->Jumlah; ?></td>
                                                <td><?= $Get->Pengurang; ?>  %</td>
                                                <td><?= $Get->Total; ?>  %</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-header d-flex" style="background-color: #ff512e;" >
                                            <h5 class="card-header-title" style="color: white;">Total Pengurang Capaian Waktu Efektif: <?= $GetJumlahPenguranganCapaianWaktuEfektif->JumlahPengurangWaktuEfektif;?> %</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php echo $PersenAktivitas = ($TotalCapaianAktivitas/$BatasMaksimal)*100 ?>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex" style="background-color: #ffea5e;">
                                <h5 class="card-header-title" style="color: black;">Rekapitulasi Capaian Kinerja</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nilai Aktivitas</th>
                                                <th>Aktivitas Bobot 70%</th>
                                                <th>Serapan</th>
                                                <th>Perilaku</th>
                                                <th>Total % (Aktivitas+Serapan+Perilaku)</th>
                                                <th>Gaji Pokok</th>
                                                <th>Perkiraan TKD</th>
                                                <th>Indisipliner %</th>
                                                <th>Tunjangan Setelah Dipotong Indisipliner</th>
                                                <th>Pemotongan Terlambat (Rp.)</th>
                                                <th>TKD yang diterima</th>                                            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nilai Aktivitas</th>
                                                <th>Aktivitas Bobot 70%</th>
                                                <th>Serapan</th>
                                                <th>Perilaku</th>
                                                <th>Total % (Aktivitas+Serapan+Perilaku)</th>
                                                <th>Gaji Pokok</th>
                                                <th>Perkiraan TKD</th>
                                                <th>Indisipliner %</th>
                                                <th>Tunjangan Setelah Dipotong Indisipliner</th>
                                                <th>Pemotongan Terlambat (Rp.)</th>
                                                <th>TKD yang diterima</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <th><?= number_format($PersenAktivitas,2);?> %</th>
                                                <td><?= number_format((number_format($PersenAktivitas,2)*70)/100,2) ?> %</td>
                                                <td><?php 
                                                    $Serapan = ($GetSerapan['NilaiSerapan']/100)*20;
                                                    // echo $GetSerapan['NilaiSerapan'];
                                                    echo number_format($Serapan,2);
                                                    ?>                                             
                                                </td>
                                                <td>
                                                    <?= number_format($Perilaku = 10,2);?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $Total = number_format((number_format($PersenAktivitas,2)*70)/100,2) + number_format($Serapan,2) + number_format($Perilaku,2);

                                                        echo $Total;
                                                    ?>
                                                </td>
                                                <td><?php $gajipokok = 4414973; 
                                                echo number_format($gajipokok, 2, ',','.'); ?></td>
                                                <td><?php $tkd = 4414973*60/100; 
                                                echo number_format($tkd, 2, ',','.'); ?></td>
                                                <td><?= $GetJumlahPenguranganCapaianWaktuEfektif->JumlahPengurangWaktuEfektif;?> %</td>
                                                <td><?php $tun = $tkd-($tkd*($GetJumlahPenguranganCapaianWaktuEfektif->JumlahPengurangWaktuEfektif)/100);
                                                echo number_format($tun, 2, ',','.'); ?></td>
                                                <td>
                                                    <?php
                                                        $PotonganTerlambat = ((1/173*$gajipokok)/60 * ($GetTotalTerlambatDanPulangCepat->TotalTerlambat + $GetTotalTerlambatDanPulangCepat->TotalPulangCepat));

                                                        echo number_format($PotonganTerlambat, 2, ',','.');
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $tkdditerima = $tun-$PotonganTerlambat;

                                                    echo number_format($tkdditerima, 2, ',','.');?>
                                                </td>
                                            </tr>
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