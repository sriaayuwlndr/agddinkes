        <?php $this->load->view("agd/partial/header.php") ?>
        <?php $this->load->view("agd/partial/menu.php") ?>
        <?php function draw_calendar($month, $year, $TanggalKinerja)
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
            // $keyword = date('Y-m-d');
            // $split      = explode('-', $keyword);
            $tanggal2 = date('Y-m', strtotime($TanggalKinerja));

            $tglskrng = date('d');
            $blnskrng = date('m');
            $thnskrng = date('Y');
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
                if ($year <= $thnskrng && $month < $blnskrng && $tglskrng > 5) 
                {
                    $ci         = get_instance();
                    $sql        = "SELECT * FROM SettingGlobal where Prefix = 'ValidasiKinerja' and Value = '1'";
                    $query      = $ci->db->query($sql);

                    if ($query->num_rows() > 0)
                    {
                        $warnaStatus = "btn btn-danger btn-lg disabled";
                    } 

                    else
                    {
                        $ci         = get_instance();
                        $IdPegawai  = $ci->session->userdata('IdPegawai');
                        $sql        = "SELECT TOP 1 IdPegawai FROM dbo.LogKehadiran lk WHERE IdPegawai = '$IdPegawai' AND Day(TanggalLog) = '$showtoday' AND MONTH(TanggalLog) = '$month' AND Year(TanggalLog) = '$year'";
                        $query      = $ci->db->query($sql);

                        // var_dump($sql);
                        // die;
                        if ($query->num_rows() > 0)
                        {
                            $warnaStatus = "btn btn-success btn-lg";
                        } 

                        else
                        {
                            $warnaStatus = "btn btn-danger btn-lg disabled";
                        }
                    }
               
                // }
                // } elseif ($year <= $thnskrng && $month <= $blnskrng) {
                //     if ($year <= $thnskrng && $month <= $blnskrng && $showtoday <= $tglskrng) {
                //         $ci = get_instance();
                //         $ci->db_kedua = $ci->load->database('db2', true);
                //         $idpegawai = $ci->session->userdata('idpegawai');
                //         $sql = "SELECT top 1 Absen_Log.noFinger FROM Absen_Log INNER JOIN DataCurrentPegawai ON Absen_Log.noFinger = 
                //         DataCurrentPegawai.NoHandkey where DAY(TglLog) = '$showtoday' and MONTH(TglLog) = '$month' and YEAR(TglLog) = '$year' 
                //         and DataCurrentPegawai.IdPegawai = '$idpegawai'";
                //         $query = $ci->db_kedua->query($sql);
                //         // var_dump($sql);
                //         // die;
                //         if ($query->num_rows() > 0) {
                //             $warnaStatus = "btn btn-success btn-lg";
                //         } else {
                //             $warnaStatus = "btn btn-danger btn-lg disabled";
                //         }
                //     } elseif ($year <= $thnskrng && $month < $blnskrng) {
                //         $ci = get_instance();
                //         $ci->db_kedua = $ci->load->database('db2', true);
                //         $idpegawai = $ci->session->userdata('idpegawai');
                //         $sql = "SELECT top 1 Absen_Log.noFinger FROM Absen_Log INNER JOIN DataCurrentPegawai ON Absen_Log.noFinger = 
                //         DataCurrentPegawai.NoHandkey where DAY(TglLog) = '$showtoday' and MONTH(TglLog) = '$month' and YEAR(TglLog) = '$year' 
                //         and DataCurrentPegawai.IdPegawai = '$idpegawai'";
                //         $query = $ci->db_kedua->query($sql);
                //         // var_dump($sql);
                //         // die;
                //         if ($query->num_rows() > 0) {
                //             $warnaStatus = "btn btn-success btn-lg";
                //         } else {
                //             $warnaStatus = "btn btn-danger btn-lg disabled";
                //         }
                //     } else {
                //         $warnaStatus = "btn btn-danger btn-lg disabled";
                //     }
                } 

                else 
                {
                    $ci         = get_instance();
                    $IdPegawai  = $ci->session->userdata('IdPegawai');
                    $sql        = "SELECT TOP 1 IdPegawai FROM dbo.LogKehadiran lk WHERE IdPegawai = '$IdPegawai' AND Day(TanggalLog) = '$showtoday' AND MONTH(TanggalLog) = '$month' AND Year(TanggalLog) = '$year'";
                    $query      = $ci->db->query($sql);

                    // var_dump($sql);
                    // die;
                    if ($query->num_rows() > 0) 
                    {
                        $warnaStatus = "btn btn-success btn-lg";
                    } 

                    else 
                    {
                        $warnaStatus = "btn btn-danger btn-lg disabled";
                    }
                }

                // var_dump($year);
                //         }    
                //     }
                // }

                // $warnaStatus = "btn btn-success btn-lg";

                if (strlen($showtoday) == 1) 
                {
                    $calendar .= '<div class="day-number">' . $showtoday . '</div><center><a data-toggle="modal" data-target="#kinerjaModal" data-whatever=' . $tanggal2 . '-0' . $showtoday . ' href="#" class="' . $warnaStatus . '" role="button">Aktifitas: ' . $jumlahKegiatan . '</a></center>';
                } 

                else
                {

                    $calendar .= '<div class="day-number">' . $showtoday . '</div><center><span class="isDisabled"><a data-toggle="modal" data-target="#kinerjaModal" data-whatever=' . $tanggal2 . '-' . $showtoday . ' href="#" class="' . $warnaStatus . '" role="button">Aktifitas: ' . $jumlahKegiatan . '</a></span></center>';
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
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content" style="padding-bottom: 50%;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Input Kinerja Utama</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-folder-open"></i> Input Kinerja Utama</li>
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
                                <h5 class="card-header-title">Input Kinerja Utama</h5>
                                <div class="toolbar ml-auto">
                                </div>
                            </div>
                            <div class="card-body">
                                <?=$this->session->flashdata('notifikasi');?>
                                <form method="POST" action="<?= base_url('agd/ekinerja/inputkinerjautama'); ?>">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                                <input type="month" id="tgl" name="tgl" class="form-control" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        
                                        </div>
                                    </div>
                                </form>
                                <?php
                                if (isset($_REQUEST['tgl']) && $_REQUEST['tgl'] <> "") 
                                {
                                    $keyword    = $_REQUEST['tgl'];
                                    $split      = explode('-', $keyword);
                                }

                                else 
                                {
                                    $keyword    = date('Y-m-d');
                                    $split      = explode('-', $keyword);
                                }
                                ?>
                                <br>
                                <div class="ml-3">
                                    <h1><?php echo date('M-Y', strtotime($keyword)); ?> </h1>
                                </div>
                                <?php

                                    echo draw_calendar($split[1], $split[0], $keyword);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class=" modal fade" id="kinerjaModal" tabindex="-1" role="dialog" aria-labelledby="kinerjaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Input Aktivitas Utama</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- tab -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-utama" role="tab">Input Aktivitas</a>
                                    <a class="nav-item nav-link" id="nav-profil-tab" data-toggle="tab" href="#nav-umum" role="tab">Daftar Aktivitas</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-utama" role="tabpanel">
                                    <form class="user" method="POST" action="<?= base_url('agd/ekinerja/inputkinerjautama/add'); ?>">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Tanggal Kinerja*</label>
                                            <input type="text" class="form-control" id="tgl" name="TanggalKinerja" readonly>
                                            <?= form_error('TanggalKinerja', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nama Aktivitas*</label>
                                            <select class="custom-select" id="IdAktivitas" name="IdAktivitas">
                                                <option selected disabled="">--Pilih Aktivitas Utama--</option>
                                                <?php foreach ($GetAktivitasUtama as $Get) : ?>
                                                    <option value="<?= $Get['IdAktivitas']; ?>"><?= $Get['Aktivitas']; ?> (<?= $Get['WaktuEfektif']; ?> Menit)</option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Jam Mulai*</label>
                                            <input type="time" class="form-control" id="JamMulai" name="JamMulai">
                                            <?= form_error('JamMulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Jam Selesai:</label>
                                            <input type="time" class="form-control" id="JamSelesai" name="JamSelesai">
                                            <?= form_error('JamSelesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                            <textarea class="form-control" id="Keterangan" name="Keterangan" rows="1"></textarea>
                                            <?= form_error('Keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-user btn-block" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                             <!--    <div class="tab-pane fade" id="nav-umum" role="tabpanel">
                                    <form class="user" method="POST" action="<?= base_url('menu/accessmenu'); ?>">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Tanggal:</label>
                                            <input type="text" class="form-control" id="tgl" name="tgl" readonly>
                                            <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Jam Mulai:</label>
                                            <input type="time" class="form-control" id="jammulai" name="jammulai">
                                            <?= form_error('jammulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Jam Selesai:</label>
                                            <input type="time" class="form-control" id="jamselesai" name="jamselesai">
                                            <?= form_error('jamselesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Deskripsi:</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-user btn-block" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div> -->
                            </div>
                            <!-- sampai sini -->
                        </div>
                    </div>
                </div>
            </div>
        <?php $this->load->view("agd/partial/footer.php") ?>
        <?php $this->load->view("agd/partial/js.php") ?>