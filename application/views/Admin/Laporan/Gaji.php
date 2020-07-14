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
                            <h2 class="pageheader-title">Laporan Gaji (Gaji Pokok + Tunjangan Keluarga)</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Laporan Gaji (Gaji Pokok + Tunjangan Keluarga)</li>
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
                                <h5 class="card-header-title">Laporan Gaji (Gaji Pokok + Tunjangan Keluarga)</h5>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="card-body">
                                        <form method="post" action="<?php echo base_url('kepegawaian/laporan/riwayatgaji');?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputUserName">Tahun Penggajian</label>
                                                        <select class="form-control form-control-lg selectpicker" name="TahunGaji">
                                                            <option value="">Pilih</option>
                                                            <?php foreach($GetTahun as $Get ) {?>
                                                                <option value="<?php echo $Get->IdTahun; ?>"><?php echo $Get->Tahun; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputUserName">Bulan Penggajian</label>
                                                        <select class="form-control form-control-lg selectpicker" name="BulanGaji">
                                                            <option value="">Pilih</option>
                                                            <?php foreach($GetBulan as $Get ) {?>
                                                                <option value="<?php echo $Get->IdBulan; ?>"><?php echo $Get->Bulan; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" class="btn btn-space btn-primary">Posting</button>
                                                        <!-- <input type="reset" class="btn btn-space btn-secondary" value="Reset"> -->
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
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
                                                <th>Status PTKP</th>
                                                <th>Keterangan</th>
                                                <th>Nominal Gaji Diterima</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetLaporanGaji as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no;?></th>
                                                <td><?php echo $Get->IdPegawai;?></td>
                                                <td><?php echo $Get->NamaLengkap;?></td>
                                                <td><?php echo $Get->PendidikanFormal;?></td>
                                                <td><?php echo date('d M Y',strtotime($Get->MulaiKerja));?></td>
                                                <td><?php echo $Get->MasaKerja;?></td>
                                                <td><?php echo $Get->StatusPTKP;?></td>
                                                <td><?php echo $Get->Keterangan;?></td>
                                                <td><?php echo $Get->Nominal;?></td>
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
                                                <th>Status PTKP</th>
                                                <th>Keterangan</th>
                                                <th>Nominal Gaji Diterima</th>
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