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
        $(document).ready(function()
        {
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
        // var date = new Date();
        // var b = date.getDate();
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
            // dayClick: function(date, jsEvent, view)
            // {
            //     // jQuery.noConflict();
            //     // var startDate = new Date(date.getFullYear(), date.getMonth(), date.getDay());
            //     jQuery.noConflict();
                

            //     $('#ModalInputAktivitasUtama').modal('show');
            // }

            selectable: true,
            selectHelper: true,
            select: function(date, jsEvent, view)
            {
                jQuery.noConflict();
                var start = date.format();
                // var start = date.getFullYear()+date.getMonth()+date.getDay();
                $('#ModalInputAktivitasUtama').modal('show');
                {
                    $("#GetTanggalUtama").html("<label for='recipient-name' class='col-form-label'>Tanggal Kinerja*</label><input type='date' class='form-control' name='TanggalKinerja' value='"+start+"' readonly>");


                    $("#GetTanggalUmum").html("<label for='recipient-name' class='col-form-label'>Tanggal Kinerja*</label><input type='date' class='form-control' name='TanggalKinerja' value='"+start+"' readonly>");
                }
                // alert(start);
                // $.ajax ({
                //     method: 'post',
                //     data: {'tgl': start},
                //     success:function(response)
                //     {
                //         $('#ModalInputAktivitasUtama').modal('show');
                //         {
                //             $("#GetTanggalUtama").html("<label for='recipient-name' class='col-form-label'>Tanggal Kinerja*</label><input type='date' class='form-control' name='TanggalKinerja' value='"+start+"' disabled>");


                //             $("#GetTanggalUmum").html("<label for='recipient-name' class='col-form-label'>Tanggal Kinerja*</label><input type='date' class='form-control' name='TanggalKinerja' value='"+start+"' disabled>");
                //         }
                //     }
                // });
                // $('#ModalInputAktivitasUtama').modal('show');
            }
            //============ JANGAN DIHAPUS ==============
            
        });
    });
    </script>
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