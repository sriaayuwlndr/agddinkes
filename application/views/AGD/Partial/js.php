    <!-- ========================= INDEX ========================= -->
    
    <!-- *** Optional JavaScript *** -->
    <!-- *** jquery 3.3.1 *** -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery-3.3.1.min.js"></script>

    <!-- *** bootstap bundle js *** -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- *** slimscroll js *** -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/slimscroll/jquery.slimscroll.js"></script>
    
    <!-- *** form validations *** -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/parsley/parsley.js"></script>

    <!-- *** main js *** -->
    <script src="<?php echo base_url(); ?>assets/admin/libs/js/main-js.js"></script>

    <!-- *** bootstrap select *** -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-select/js/bootstrap-select.js"></script>


    <script>
    $('#kinerjaModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input#tgl').val(recipient)

    });

    </script>

    <!-- ========================= EDITABLE UPDATE DATABASE ========================= -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    
    <!-- ========================= EDITABLE UPDATE DATABASE END ========================= -->


    <!-- ========================= FORM VALIDATIONS ========================= -->
    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
    <!-- ========================= FORM VALIDATIONS END ========================= -->
    

    <!-- ========================= JS UNTUK FORMAT RUPIAH ========================= -->
    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e)
        {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan)
            {
                separator = sisa ? ',' : '';
                rupiah += separator + ribuan.join(',');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    <!-- ========================= JS UNTUK FORMAT RUPIAH ========================= -->


    <!-- ========================= FORM ELEMENTS ========================= -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
    <!-- ========================= FORM ELEMENTS END ========================= -->


    <!-- ========================= SCRIPT SELECT 2========================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/select2/js/select2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
            // var j = $.noConflict(true);
            $(document).ready(function(){
            // Initialize select2
            $(".pilih").select2();
        });
    </script>
    
    <!-- ========================= SCRIPT SELECT 2 END ========================= -->
    

    <!-- ========================= INDEX END ========================= -->


    <!-- ========================= DATA TABLES ========================= -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/js/data-table.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#filter-table').DataTable( {
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
         
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            } );
        } );
    </script>
    <!-- ========================= DATA TABLES END ========================= -->

    <!-- ========================= CALENDER ========================= -->
    <script src='<?php echo base_url(); ?>assets/admin/vendor/full-calendar/js/moment.min.js'></script>
    <script src='<?php echo base_url(); ?>assets/admin/vendor/full-calendar/js/fullcalendar.js'></script>
    <script src='<?php echo base_url(); ?>assets/admin/vendor/full-calendar/js/jquery-ui.min.js'></script>
    <!-- <script src='<?php echo base_url(); ?>assets/admin/vendor/full-calendar/js/calendar.js'></script> -->
    <script type="text/javascript">
    $(function()
    {
        var date = new Date();
        var b = date.getDate();
        var calendar = $('#calendar1').fullCalendar(
        {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            
            

            // dayClick: function(date, jsEvent, view)
            // {
                
            //     // alert(b);
            //     window.location.href = "<?php echo base_url('agd/ekinerja/inputkinerjautama/input/');?>";
            //     window.location.href(b);

            // }

            // ============ JANGAN DIHAPUS ==============
            dayClick: function()
            {
                jQuery.noConflict(); 
                $('#ModalInputAktivitasUtama').modal('show');
            }

            // selectable: true,
            // selectHelper: true,
            // select: function()
            // {
            //     jQuery.noConflict();
            //     $('#ModalInputAktivitasUtama').modal('show');
            // }
            //============ JANGAN DIHAPUS ==============
            
        });
    });
    </script>

    <div class="modal fade" id="ModalInputAktivitasUtama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document" >
            <div class="modal-content" style="width: 100%; ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Aktivitas Utama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                            <div class="section-block">
                                <!-- <h5 class="section-title">Simple Card Tabs</h5>
                                <p>Takes the basic nav from above and adds the .nav-tabs class to generate a tabbed interface..</p> -->
                            </div>
                            <div class="simple-card" style="border-color: #e6e6e6; border-width: 2px;">
                                <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                    <li class="nav-item" style="width: 50%">
                                        <a class="nav-link active border-left-0" id="home-tab-simple" data-toggle="tab" href="#home-simple" role="tab" aria-controls="home" aria-selected="true">Input Aktivitas</a>
                                    </li>
                                    <li class="nav-item" style="width: 50%">
                                        <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab" aria-controls="profile" aria-selected="false">Daftar Aktivitas</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent5" >
                                    <!-- ========================================================= -->
                                    <!-- =============== TAB INPUT AKTIVITAS UTAMA ============== -->
                                    <!-- ========================================================= -->
                                    <div class="tab-pane fade show active" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple" >
                                        <form>
                                            <div class="form-group">
                                                <label class="col-form-label">Aktivitas</label>
                                                <select class="form-control selectSearch">
                                                    <option value="" disabled="" selected="">Pilih Aktivitas</option>
                                                    <?php foreach($GetAktivitasUtama as $Get) {?>
                                                        <option value="<?= $Get['IdAktivitas'];?>"><?= $Get['Aktivitas'].' ( '.$Get['WaktuEfektif'].' Menit)';?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Waktu Efektif</label>
                                                <select class="form-control selectSearch">
                                                    <option value="" disabled="" selected="">Pilih Aktivitas</option>
                                                    <option>1</option>
                                                    <option>1</option>
                                                </select>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="col-form-label">Volume</label>
                                                <select class="form-control selectSearch">
                                                    <option value="" disabled="" selected="">Pilih Aktivitas</option>
                                                    <option>1</option>
                                                    <option>1</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Waktu Mulai</label>
                                                <input type="time" name="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Waktu Selesai</label>
                                                <input type="time" name="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-space btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
                                                <button type="button" class="btn btn-space btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- ========================================================= -->
                                    <!-- =============== TAB INPUT AKTIVITAS UTAMA ============== -->
                                    <!-- ========================================================= -->
                                    <!-- ========================================================= -->
                                    <!-- =============== TAB DAFTAR AKTIVITAS UTAMA =============== -->
                                    <!-- ========================================================= -->
                                    <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                                        <a href="#" class="btn btn-danger btn-block">Hapus Semua Aktivitas di Tanggal Ini</a>
                                        <br>
                                        <br>
                                        <!-- <p class="lead"> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
                                        <p>Phasellus non ante gravida, ultricies neque a, fermentum leo. Etiam ornare enim arcu, at venenatis odio mollis quis. Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiasse platea dictumst. Pellentesque sed justo aliquet, posuere sem nec, elementum ante.</p> -->
                                        <div class="accrodion-regular">
                                            <div id="accordion3">
                                                <div class="card">
                                                    <div class="card-header" id="headingSeven">
                                                        <h5 class="mb-0">
                                                           <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                             <span class="fas fa-angle-down mr-3"></span>Accordion Heading Title Here
                                                           </button>
                                                          </h5>
                                                    </div>
                                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion3">
                                                        <div class="card-body">
                                                            <p class="lead"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.</p>
                                                            <p> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
                                                            <a href="#" class="btn btn-secondary">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ========================================================= -->
                                    <!-- =============== TAB DAFTAR AKTIVITAS UTAMA =============== -->
                                    <!-- ========================================================= -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- ========================= CALENDER END ========================= -->    

    <script>
    $('#kinerjaModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input#tgl').val(recipient)

    })
    </script>
</body>
</html>