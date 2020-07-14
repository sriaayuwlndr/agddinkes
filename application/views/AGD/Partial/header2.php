<?php
function draw_calendar($month, $year)
{
    // Draw table for Calendar 
    $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
    // Draw Calendar table headings 
    $headings = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    $calendar .= '<tr class="calendar-row"><td class="calendar-day-head" >' . implode('</td><td class="calendar-day-head">', $headings) . '</td></tr>';
    //days and weeks variable for now ... 
    $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
    $days_in_this_week = 1;
    $day_counter = 0;
    $dates_array = array();
    // row for week one 
    $calendar .= '<tr class="calendar-row">';
    // Display "blank" days until the first of the current week 

    // if (isset($_REQUEST['tanggal']) && $_REQUEST['tanggal'] <> "") {
    //     $keyword = $_REQUEST['tanggal'];
    //     $split      = explode('-', $keyword);
    // } else {
    //     if (isset($_SESSION['tanggal']) && $_SESSION['tanggal'] <> "") {
    //         $keyword = $_SESSION['tanggal'];
    //         $split      = explode('-', $keyword);
    //     } else {
    $keyword = date('Y-m-d');
    $split      = explode('-', $keyword);
    $tanggal2 = date('Y-m');
    //     }
    // }

    for ($x = 0; $x < $running_day; $x++) :
        $calendar .= '<td class="calendar-day-np">&nbsp;</td>';
        $days_in_this_week++;
    endfor;
    // Show days.... 
    for ($list_day = 1; $list_day <= $days_in_month; $list_day++) :
        if ($list_day == date('d') && $month == date('n')) {
            $currentday = 'currentday';
        } else {
            $currentday = '';
        }
        $calendar .= '<td class="calendar-day ' . $currentday . '">';

        // Add in the day number
        if ($list_day < date('d') && $month == date('n')) {
            $showtoday = $list_day;
        } else {
            $showtoday = $list_day;
        }

        // $serverName = "192.168.12.2\sse2008";

        // $uid = "programmer";
        // $pwd = "progbudhiasihn3w!";
        // $connectionInfo = array("UID" => $uid, "PWD" => $pwd, "Database" => "rsba200");
        // $conn = sqlsrv_connect($serverName, $connectionInfo);
        // if ($conn === false) {
        //     echo "Could not connect.\n";
        //     die(print_r(sqlsrv_errors(), true));
        // }
        // $idPegawai = $_SESSION['idpegawai'];
        // $tahun = date('Y');



        // $tsql = "select COUNT(Kode) As Jumlah, MAX(Status) AS Status from AktifitasPegawai where IdPegawai = '$idPegawai' And DAY(Tanggal) = '$showtoday' And MONTH(Tanggal) = '$split[1]' 
        //                                   And YEAR(Tanggal) = '$split[0]'";
        // $result = sqlsrv_query($conn, $tsql);
        // if ($tsql === false) {
        //     echo "gagal load.\n";
        //     die(print_r(sqlsrv_errors(), true));
        // }
        // while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $jumlahKegiatan = 0;

        //     if ($row['Jumlah'] === 0) {
        //         $warnaStatus = "btn btn-warning";
        //     } else {

        //         if ($row['Status'] === '1') {
        //             $warnaStatus = "btn btn-success";
        //         } else {
        $warnaStatus = "btn btn-danger";
        //         }
        //     }
        // }
        if (strlen($showtoday) == 1) {

            $calendar .= '<div class="day-number">' . $showtoday . '</div><center><a data-toggle="modal" data-target="#kinerjaModal" data-whatever=' . $tanggal2 . '-0' . $showtoday . ' href="#" class="' . $warnaStatus . '" role="button" style="width:100% ; height:100%">Aktifitas: ' . $jumlahKegiatan . '</a></center>';
        } else {

            $calendar .= '<div class="day-number">' . $showtoday . '</div><center><a data-toggle="modal" data-target="#kinerjaModal" data-whatever=' . $tanggal2 . '-' . $showtoday . ' href="#" class="' . $warnaStatus . '" role="button" style="width:100%; height:100%">Aktifitas: ' . $jumlahKegiatan . '</a></center>';
        }


        // Draw table end
        $calendar .= '</td>';
        if ($running_day == 6) :
            $calendar .= '</tr>';
            if (($day_counter + 1) != $days_in_month) :
                $calendar .= '<tr class="calendar-row">';
            endif;
            $running_day = -1;
            $days_in_this_week = 0;
        endif;
        $days_in_this_week++;
        $running_day++;
        $day_counter++;
    endfor;
    // Finish the rest of the days in the week
    if ($days_in_this_week < 8) :
        for ($x = 1; $x <= (8 - $days_in_this_week); $x++) :
            $calendar .= '<td class="calendar-day-np">&nbsp;</td>';
        endfor;
    endif;
    // Draw table final row
    $calendar .= '</tr>';
    // Draw table end the table 
    $calendar .= '</table>';

    // Finally all done, return result 
    return $calendar;
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>

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

    <style>
        @charset "utf-8";

        /* CSS Document */
        html,
        body,
        /*form {
            margin: 0px;
            padding: 0px;
            font-family: Ebrima, Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #666;
            empty-cells: hide;
        }*/

        table.calendar {
            border-style: solid;
            border-width: 1px;
            border-width: 1px;
            border-color: #666;
            -moz-box-shadow: 0px 0px 4px #CCCCCC;
            -webkit-box-shadow: 0px 0px 4px #CCCCCC;
            box-shadow: 0px 0px 4px #CCCCCC;
        }

        tr.calendar-row {}

        td.calendar-day {
            min-height: 80px;
            position: relative;
        }

        * html div.calendar-day {
            height: 80px;
        }

        td.calendar-day:hover {
            background: #FFF;
            -moz-box-shadow: 0px 0px 20px #eeeeee inset;
            -webkit-box-shadow: 0px 0px 20px #eeeeee inset;
            box-shadow: 0px 0px 20px #eeeeee inset;
            cursor: pointer;
        }

        td.calendar-day-np {
            background: #eee;
            min-height: 80px;
        }

        * html div.calendar-day-np {
            height: 80px;
        }

        td.calendar-day-head {
            font-weight: bold;
            text-shadow: 0px 1px 0px #FFF;
            color: #666;
            text-align: center;
            width: 64px;
            padding: 12px 6px;
            border-bottom: 1px solid #CCC;
            border-top: 1px solid #CCC;
            border-right: 1px solid #CCC;
            background: #ffffff;
            background: -moz-linear-gradient(top, #ffffff 0%, #ededed 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ffffff), color-stop(100%, #ededed));
            background: -webkit-linear-gradient(top, #ffffff 0%, #ededed 100%);
            background: -o-linear-gradient(top, #ffffff 0%, #ededed 100%);
            background: -ms-linear-gradient(top, #ffffff 0%, #ededed 100%);
            background: linear-gradient(to bottom, #ffffff 0%, #ededed 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed', GradientType=0);
        }

        div.day-number {
            padding: 6px;
            text-align: center;
        }

        /* shared */
        td.calendar-day,
        td.calendar-day-np {
            padding: 5px;
            border-bottom: 1px solid #DBDBDB;
            border-right: 1px solid #DBDBDB;
            font-size: 14px;
            background: #ffffff;
            background: -moz-linear-gradient(top, #ffffff 0%, #f2f2f2 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ffffff), color-stop(100%, #f2f2f2));
            background: -webkit-linear-gradient(top, #ffffff 0%, #f2f2f2 100%);
            background: -o-linear-gradient(top, #ffffff 0%, #f2f2f2 100%);
            background: -ms-linear-gradient(top, #ffffff 0%, #f2f2f2 100%);
            background: linear-gradient(to bottom, #ffffff 0%, #f2f2f2 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f2f2f2', GradientType=0);
        }

        .overday {
            color: #164b87;
            text-shadow: 0px 1px 0px #FFF;
        }

        .currentday {
            background: #6cb7f3 !important;
            background: -moz-linear-gradient(top, #6cb7f3 0%, #388be8 100%) !important;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #6cb7f3), color-stop(100%, #388be8)) !important;
            background: -webkit-linear-gradient(top, #6cb7f3 0%, #388be8 100%) !important;
            background: -o-linear-gradient(top, #6cb7f3 0%, #388be8 100%) !important;
            background: -ms-linear-gradient(top, #6cb7f3 0%, #388be8 100%) !important;
            background: linear-gradient(to bottom, #6cb7f3 0%, #388be8 100%) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#6cb7f3', endColorstr='#388be8', GradientType=0) !important;
            color: #FFF !important;
            font-weight: bold;
            -moz-box-shadow: 0px 0px 18px #1F68BA inset;
            -webkit-box-shadow: 0px 0px 18px #1F68BA inset;
            box-shadow: 0px 0px 18px #1F68BA inset;
        }

        .currentday:hover {
            -moz-box-shadow: 0px 0px 24px #074080 inset !important;
            -webkit-box-shadow: 0px 0px 24px #074080 inset !important;
            box-shadow: 0px 0px 24px #074080 inset !important;
        }

        /* Center the loader */

        #loader {

            position: absolute;

            left: 50%;

            top: 50%;

            z-index: 1;

            width: 150px;

            height: 150px;

            margin: -75px 0 0 -75px;

            border: 16px solid #f3f3f3;

            border-radius: 50%;

            border-top: 16px solid #3498db;

            width: 120px;

            height: 120px;

            -webkit-animation: spin 2s linear infinite;

            animation: spin 2s linear infinite;

        }



        @-webkit-keyframes spin {

            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }

        }



        @keyframes spin {

            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }

        }



        /* Add animation to "page content" */

        .animate-bottom {

            position: relative;

            -webkit-animation-name: animatebottom;

            -webkit-animation-duration: 1s;

            animation-name: animatebottom;

            animation-duration: 1s
        }



        @-webkit-keyframes animatebottom {

            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }

        }



        @keyframes animatebottom {

            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }

        }



        #myDiv {

            display: none;

        }
    </style>



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
                            <a href="<?php echo base_url('agd/login/logout');?>" class="btn btn-rounded btn-brand"><i class="fas fa-power-off"></i> Log Out</a>

                            <!-- <?php echo anchor('login/logout','<i class="fas fa-power-off"></i> Log Out');?>  -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->