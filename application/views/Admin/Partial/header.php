<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KEPEGAWAIAN AGD DINKES</title>

    <!-- ========================= INDEX ========================= -->
    <!-- *** Bootstrap CSS *** -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-select/css/bootstrap-select.css">
    
    <!-- ========================= INDEX END ========================= -->


    <!-- ========================= FORM ELEMENTS ========================= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/inputmask/css/inputmask.css" />
    <!-- ========================= FORM ELEMENTS ========================= -->


    <!-- ========================= SELECT 2 ========================= -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/select2/css/select2.min.css">
    <!-- ========================= SELECT 2 END ========================= -->


    <!-- ========================= NEW CHART ========================= -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/vendor/charts/new-chart/Chart.js"></script>
    <!-- ========================= NEW CHART END ========================= -->


    <!-- ========================= DATA TABLES ========================= -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <!-- ========================= DATA TABLES END ========================= -->

    <!-- ========================= CALENDER ========================= -->
    <link href="<?php echo base_url(); ?>assets/admin/vendor/full-calendar/css/fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/admin/vendor/full-calendar/css/fullcalendar.print.css" rel="stylesheet" media="print"/>
    <!-- ========================= CALENDER END ========================= -->



</head>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="<?php echo base_url('cca/beranda');?>">KEPEGAWAIAN</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a href="<?php echo base_url('login/logout');?>" class="btn btn-rounded btn-brand"><i class="fas fa-power-off"></i> Log Out</a>

                            <!-- <?php echo anchor('login/logout','<i class="fas fa-power-off"></i> Log Out');?>  -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->