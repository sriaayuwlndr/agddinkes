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
                            <h2 class="pageheader-title">Profil Pegawai</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Profil Pegawai</li>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card influencer-profile-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="text-center">
                                            <img src="<?php echo base_url(); ?>assets/admin/images/avatar-4.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl" style="width: 100%; height: auto;">
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div class="user-avatar-info">
                                                <div class="m-b-1 d-inline-block">
                                                    <div class="user-avatar-name">
                                                        <h2 class="mb-1">Sri Ayu Wulandari</h2>
                                                    </div>
                                                </div>
                                                <div class="user-avatar-address">
                                                    <p class="border-bottom pb-3">
                                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Pengadministrasi Teknologi Informasi</span>
                                                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Pendidikan Terakhir: S1 </span>
                                                        <span class="mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Mulai Berkerja: 01 Nov 2019</span>
                                                        <span class="mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>Perempuan</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-9 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Profil Lengkap</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Jabatan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Pendidikan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Keluarga</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <h5 class="card-header">Basic Form</h5>
                                                    <div class="card-body">
                                                        <form action="#" id="basicform" data-parsley-validate="">
                                                            <div class="form-group">
                                                                <label for="inputUserName">User Name</label>
                                                                <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" required="" placeholder="Enter user name" autocomplete="off" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail">Email address</label>
                                                                <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputPassword">Password</label>
                                                                <input id="inputPassword" type="password" placeholder="Password" required="" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputRepeatPassword">Repeat Password</label>
                                                                <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="password" required="" placeholder="Password" class="form-control">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                                    <label class="be-checkbox custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6 pl-0">
                                                                    <p class="text-right">
                                                                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                                        <button class="btn btn-space btn-secondary">Cancel</button>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <h5 class="card-header">Horizontal Form</h5>
                                                    <div class="card-body">
                                                        <form id="form" data-parsley-validate="" novalidate="">
                                                            <div class="form-group row">
                                                                <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Email</label>
                                                                <div class="col-9 col-lg-10">
                                                                    <input id="inputEmail2" type="email" required="" data-parsley-type="email" placeholder="Email" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">Password</label>
                                                                <div class="col-9 col-lg-10">
                                                                    <input id="inputPassword2" type="password" required="" placeholder="Password" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputWebSite" class="col-3 col-lg-2 col-form-label text-right">Web Site</label>
                                                                <div class="col-9 col-lg-10">
                                                                    <input id="inputWebSite" type="url" required="" data-parsley-type="url" placeholder="URL" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row pt-2 pt-sm-5 mt-1">
                                                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                                    <label class="be-checkbox custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-6 pl-0">
                                                                    <p class="text-right">
                                                                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                                        <button class="btn btn-space btn-secondary">Cancel</button>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom: 50%;">
                                                <div class="card">
                                                    <div class="card-header d-flex">
                                                        <h5 class="card-header-title">Master Agama</h5>
                                                        <div class="toolbar ml-auto">
                                                            <a href="<?php echo base_url('kepegawaian/masteragama/add');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Master Agama</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Agama</th>
                                                                        <th>Status Aktif</th>
                                                                        <th>Tanggal Dibuat</th>
                                                                        <th>Ubah</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Agama</th>
                                                                        <th>Status Aktif</th>
                                                                        <th>Tanggal Dibuat</th>
                                                                        <th>Ubah</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                        <div class="card">
                                            <h5 class="card-header">Campaign Reviews</h5>
                                            <div class="card-body">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Quisque lobortis vestibulum elit, vel fermentum elit pretium et. Nullam id ultrices odio. Cras id nulla mollis, molestie diam eu, facilisis tortor. Mauris ultrices lectus laoreet commodo hendrerit. Nullam varius arcu sed aliquam imperdiet. Etiam ut luctus augue.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Tabitha C. Campbell</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Maecenas rutrum viverra augue. Nulla in eros vitae ante ullamcorper congue. Praesent tristique massa ac arcu dapibus tincidunt. Mauris arcu mi, lacinia et ipsum vel, sollicitudin laoreet risus.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Luise M. Michet</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam tincidunt lobortis augueat euismod ante sodales non. ”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Gloria S. Castillo</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis, viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit. Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                            <div class="card-body border-top">
                                                <div class="review-block">
                                                    <p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt. Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
                                                    <div class="rating-star mb-4">
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                        <i class="fa fa-fw fa-star"></i>
                                                    </div>
                                                    <span class="text-dark font-weight-bold">Ruby B. Matheny</span><small class="text-mute"> (Company name)</small>
                                                </div>
                                            </div>
                                        </div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link " href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                                        <div class="card">
                                            <h5 class="card-header">Send Messages</h5>
                                            <div class="card-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                            <div class="form-group">
                                                                <label for="name">Your Name</label>
                                                                <input type="text" class="form-control form-control-lg" id="name" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Your Email</label>
                                                                <input type="email" class="form-control form-control-lg" id="email" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="subject">Subject</label>
                                                                <input type="text" class="form-control form-control-lg" id="subject" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="messages">Messgaes</label>
                                                                <textarea class="form-control" id="messages" rows="3"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary float-right">Send Message</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
        <?php $this->load->view("admin/partial/footer.php") ?>
        <?php $this->load->view("admin/partial/js.php") ?>