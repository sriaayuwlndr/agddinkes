        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 50%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Master Agama</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Master Agama</li>
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
                                <h5 class="card-header-title">Master Agama</h5>
                                <div class="toolbar ml-auto">
                                    <a href="<?php echo base_url('agd/kepegawaian/masteragama/add');?>" class="btn btn-rounded btn-brand"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Agama</th>
                                                <th>Status Aktif</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Edit</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                                foreach ($GetMasterAgama as $Get)
                                                {
                                                    $no++;
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $no;?></th>
                                                <td title="Klik 2x Untuk Edit dan Tekan Enter Untuk Menyimpan" ondblclick="this.contentEditable=true; this.className='inEdit';" onblur="this.contentEditable=false; this.className='';" onkeypress="LiveEdit(event,'<?php echo $Get->IdAgama; ?>',$(this).html() )"><?php echo $Get->Agama; ?>
                                                </td>
                                                <td><?php echo $Get->StatusAktifAgama;?></td>
                                                <td>
                                                    <?php echo date('d M Y H:i:s',strtotime($Get->TanggalDibuat));?>
                                                </td>
                                                <td style="width: 10%;">
                                                    <a href="<?php echo base_url('agd/kepegawaian/masteragama/edit/'.$Get->IdAgama);?>" class="btn btn-rounded btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        function LiveEdit(e,IdAgama,Agama)
                                        {
                                            if(e.keyCode === 13)
                                            {
                                                if (confirm('Apakah Anda Yakin Akan Menyimpannya?'))
                                                {
                                                    e.preventDefault();
                                                    $.ajax(
                                                    {
                                                        type: "POST",
                                                        url: "<?php echo base_url('agd/kepegawaian/masteragama/liveedit')?>",
                                                        data:
                                                        {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                                                            'IdAgama' : IdAgama,
                                                            'Agama' : Agama,
                                                        },

                                                        success: function(response)
                                                        { 
                                                          alert(response);
                                                        }
                                                    });
                                                }  
                                            }  
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $this->load->view("agd/partial/footer.php") ?>
        <?php $this->load->view("agd/partial/js.php") ?>