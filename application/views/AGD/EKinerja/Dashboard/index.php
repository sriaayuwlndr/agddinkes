        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 20%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Dashboard</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Selamat Datang <?php echo $this->session->userdata('IdPegawai');?> / 
                                        <?php
                                            if(!empty($this->session->userdata('NamaLengkap')))
                                            {
                                                echo $this->session->userdata('NamaLengkap');
                                            }

                                            else
                                            {
                                                echo $this->session->userdata('KeteranganDivisi');
                                            }
                                        ?>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Notifikasi</h5>
                                    <div class="card-body">
                                        <ul class="list-unstyled" style="text-align: justify;">
                                            <li class="media">
                                                <div class="media-body">
                                                    <h1 class="mt-0 mb-1">Selamat Datang di Website E-Kinerja AGD DINKES</h1>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Informasi Kepegawaian</h5>
                                    <div class="card-body">
                                        <ul class="list-unstyled" style="text-align: justify;">
                                            <?php foreach($GetInformasi as $Get) { ?>
                                            <li class="media">
                                                <img class=" mr-3 user-avatar-lg rounded" src="<?php echo base_url('media/gambar/'.$Get->Gambar); ?>" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1"><?= $Get->Judul?></h5> <?= $Get->Isi?><br><a href="<?php echo base_url('media/informasikepegawaian/'.$Get->LokasiFile); ?>"><?= $Get->LokasiFile;?></a>
                                                    
                                                    <h5 class="mt-0 mb-1"><?= date('d M Y H:i', strtotime($Get->TanggalDibuat));?></h5>
                                                    <br>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
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