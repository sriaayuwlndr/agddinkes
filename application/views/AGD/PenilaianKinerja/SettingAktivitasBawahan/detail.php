        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 30%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Daftar Aktivitas <?= $GetPegawai['NamaLengkap'];?></h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url('agd/ekinerja/settingaktivitasbawahan');?>" class="breadcrumb-link"><i class="fas fa-folder"></i> Setting Aktivitas Bawahan</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Daftar Aktivitas <?= $GetPegawai['NamaLengkap'];?></li>
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
                                <h5 class="card-header-title">Input Aktivitas Bawahan</h5>
                            </div>
                            <div class="card-body">
                                <?=$this->session->flashdata('notifikasi');?>
                                <form method="post" action="<?php echo base_url('agd/ekinerja/settingaktivitasbawahan/detail/'.$GetPegawai['IdPegawai']);?>" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-xl-10 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="">Nama Aktivitas*</label>
                                            <select class="form-control form-control-lg <?php echo form_error('IdAktivitas') ? 'is-invalid':'' ?> pilih " name="IdAktivitas">
                                                <option value="" disabled="" selected="">Pilih Aktivitas</option>
                                                <?php foreach($GetAktivitas as $Get ) {?>
                                                    <option value="<?php echo $Get->IdAktivitas; ?>"><?php echo $Get->Aktivitas.' ('.$Get->WaktuEfektif.' Menit)'; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('IdAktivitas') ?>
                                            </div> 
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <br>
                                            <input class="btn btn-rounded btn-primary btn-sm form-control" type="submit" onclick="return confirm('Apakah Anda Yakin akan Menginput Aktivitas Ini?')" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h5 class="card-header-title">Daftar Aktivitas Bawahan</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Aktivitas</th>
                                                <th>Hapus</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Aktivitas</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetMappingAktivitas as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <td><?= $Get->Aktivitas; ?> <span class="badge badge-pill badge-info"><?= $Get->WaktuEfektif; ?> Menit</span></td>
                                                <td style="width: 10%;">
                                                    <!-- <a href="<?= base_url('agd/ekinerja/settingaktivitasbawahan/hapus/'.$Get->IdPegawai);?>" class="btn btn-rounded btn-danger btn-xs"><i class="fas fa-trash"></i>
                                                    </a> -->
                                                    <a class="btn btn-rounded btn-danger btn-xs" data-toggle="modal" data-target="#modalHapusMappingAktivitas<?= $Get->IdMappingAktivitas;?>"><i class=" fas fa-trash-alt" style="color: white;"></i></a>


                                                    <!-- ========== Modal Hapus Aktivitas ========== -->
                                                    <div class="modal fade" id="modalHapusMappingAktivitas<?= $Get->IdMappingAktivitas;?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusMappingAktivitasLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalHapusMappingAktivitasLabel">Hapus Aktivitas "<?= $Get->Aktivitas;?> (<?= $Get->WaktuEfektif;?> Menit)"</h5>
                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </a>
                                                                </div>
                                                                <?php $IdPegawai = $GetPegawai['IdPegawai']; ?>
                                                                <form class="form-horizontal" method="post" action="<?php echo base_url('agd/ekinerja/settingaktivitasbawahan/delete/'.$IdPegawai);?>">
                                                                    <div class="modal-body">
                                                                        <p>Jika dihapus, data tidak akan bisa kembali.</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="IdMappingAktivitas" value="<?php echo $Get->IdMappingAktivitas;?>">
                                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                                                                        <button class="btn btn-danger">Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ========== Modal Hapus Aktivitas END ========== -->
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