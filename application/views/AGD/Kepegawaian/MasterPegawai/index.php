        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Master Pegawai</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Master Pegawai</li>
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
                                <h5 class="card-header-title">Master Pegawai</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('agd/kepegawaian/masterpegawai/add');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                                <th>Jenis Kelamin</th>
                                                <th>Email</th>
                                                <th>No. HP</th>
                                                <th>Status Aktif</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Detail</th>
                                                <!-- <th>Gelar Depan</th>
                                                <th>Gelar Belakang</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Golongan Darah</th>
                                                <th>Status Perkawinan</th>
                                                <th>Agama</th>
                                                <th>No. HP</th>
                                                <th>No. Telepon</th>
                                                <th>No. KK</th>
                                                <th>No. NPWP</th>
                                                <th>No. BPJS Ketenagakerjaan</th>
                                                <th>No. BPJSKesehatan</th>
                                                <th>No. Rekening</th>
                                                <th>No. Sim A</th>
                                                <th>No. Sim C</th>
                                                <th>Tgl. Mulai Kerja</th>
                                                <th>Status Pegawai</th>
                                                <th>Unit Kerja</th>
                                                <th>Jabatan</th>
                                                <th>Atasan</th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Pegawai</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Email</th>
                                                <th>No. HP</th>
                                                <th>Status Aktif</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Detail</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetMasterPegawai as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <td><?= $Get->IdPegawai;?></td>
                                                <td><?= $Get->NamaLengkap;?></td>
                                                <td><?= $Get->JenisKelamin;?></td>
                                                <td><?= $Get->Email;?></td>
                                                <td><?= $Get->NomorHandphone;?></td>
                                                <td><?= $Get->StatusAktifPegawai;?></td>
                                                <td><?= date('d M Y H:i:s',strtotime($Get->TanggalDibuat));?></td>
                                                <td>
                                                    <a href="<?php echo base_url('agd/kepegawaian/masterpegawai/detail/'.$Get->IdPegawai);?>" class="btn btn-rounded btn-info btn-xs"><i class="fas fa-edit"></i> Detail</a>
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