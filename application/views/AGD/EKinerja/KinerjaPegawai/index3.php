		 <?php $this->load->view("agd/partial/header2.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <!-- ============================================================== -->
		<div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content ">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Dashboard</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Selamat Datang <?php echo $this->session->userdata('IdPegawai');?> / <?php echo $this->session->userdata('NamaLengkap');?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Sisa Cuti Tahun 2020</h5>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Pesan dari Kepegawaian</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">12 Hari</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">Lihat Semua Pesan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Persetujuan Perubahan Data</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">12 Hari</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">Lihat Semua</span>
                                        </div>
                                        <!-- ============================================================== -->
		                                <!-- modal  -->
		                                <!-- ============================================================== -->
		                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		                                    <div class="section-block" id="modal">
		                                        <h3 class="section-title">Modals</h3>
		                                        <p>Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content.</p>
		                                    </div>
		                                    <div class="card">
		                                        <h5 class="card-header">Examples</h5>
		                                        <div class="card-body">
		                                            <div class="">
		                                                <h4>Live Demo</h4>
		                                                <!-- Button trigger modal -->
		                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		                                                            Launch demo modal
		                                                        </a>
		                                                <!-- Modal -->
		                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                                    <div class="modal-dialog" role="document">
		                                                        <div class="modal-content">
		                                                            <div class="modal-header">
		                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		                                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
		                                                                            <span aria-hidden="true">&times;</span>
		                                                                        </a>
		                                                            </div>
		                                                            <div class="modal-body">
		                                                                <p>Woohoo, You are readng this text in a modal! Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content.</p>
		                                                                <div class="card-body">
		                                                                <form method="post" action="<?php echo base_url('kepegawaian/jadwalkerja/SubmitUploadShiftCoba');?>" enctype="multipart/form-data">
		                                                                <div class="form-group row">
									                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tahun</label>
									                                        <div class="col-12 col-sm-8 col-lg-6">
									                                            <select class="form-control form-control-lg pilih" name="TahunGaji">
									                                                <option value="" disabled="" selected="">Pilih</option>
									                                                <option value="1">a</option>
									                                                <option value="1">b</option>
									                                                <option value="1">c</option>
									                                                <option value="1">d</option>
									                                                
									                                            </select>
									                                        </div>
									                                    </div>
									                                	</form>
									                                </div>
		                                                            </div>
		                                                            <div class="modal-footer">
		                                                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
		                                                                <a href="#" class="btn btn-primary">Save changes</a>
		                                                            </div>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <!-- ============================================================== -->
		                                <!-- modal  -->
		                                <!-- ============================================================== -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="card">

                                    <?php
                                        $keyword = date('Y-m-d');
										$split      = explode('-', $keyword);
									?>
										<h1><?php echo date('M-Y', strtotime($keyword)); ?> </h1>
									<?php

										echo draw_calendar($split[1], $split[0]);

									?>


                                    </div>

                                    <!-- Modal -->
									<div class=" modal fade" id="kinerjaModal" tabindex="-1" role="dialog" aria-labelledby="kinerjaModalLabel" aria-hidden="true">
									    <div class="modal-dialog">
									        <div class="modal-content">
									            <div class="modal-header">
									                <h5 class="modal-title" id="kinerjaModalLabel">Add New Role</h5>
									                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									                    <span aria-hidden="true">&times;</span>
									                </button>
									            </div>
									            <div class="modal-body">
									                <form class="user" method="POST" action="<?= base_url('menu/accessmenu'); ?>">
									                    <div class="form-group">
									                        <label for="recipient-name" class="col-form-label">Tanggal:</label>
									                        <input type="text" class="form-control" id="tgl" name="tgl">
									                        <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
									                    </div>
									                    <div class="form-group row">
					                                        <label for="recipient-name" class="col-form-label">Bulan</label>
				                                            <select class="form-control modalselect2" name="BulanGaji">
				                                                <option value="" disabled selected="">Pilih</option>
				                                                <option value="1">a</option>
				                                                <option value="1">b</option>
				                                                <option value="1">c</option>
				                                                <option value="1">d</option>
				                                            </select>
					                                     </div>
										                <div class="form-group row">
					                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tahun</label>
					                                        <div class="col-12 col-sm-8 col-lg-6">
					                                            <select class="form-control form-control-lg modalselect2" name="TahunGaji">
					                                                <option value="" disabled="" selected="">Pilih</option>
					                                                <option value="1">a</option>
					                                                <option value="1">b</option>
					                                                <option value="1">c</option>
					                                                <option value="1">d</option>
					                                                
					                                            </select>
					                                        </div>
					                                    </div>
					                                     <div class="modal-footer">
									                        <button type="button" class="btn btn-secondary btn-user btn-block" data-dismiss="modal">Close</button>
									                        <button type="submit" class="btn btn-primary btn-user btn-block">
									                            Save
									                        </button>
									                    </div>
									                </form>
									            </div>
									        </div>
									    </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      	<!-- ============================================================== -->
        <?php $this->load->view("agd/partial/footer.php") ?>
        <?php $this->load->view("agd/partial/js.php") ?>