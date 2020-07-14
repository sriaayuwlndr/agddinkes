        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark" style="height: 120%;">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">MENU</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <?php
                        $IdHakAkses = $this->session->userdata('IdHakAkses');

                        $QueryGetMenu = "SELECT MasterMenu.* FROM MasterMenu INNER JOIN  MasterAksesMenu ON MasterMenu.IdMenu = MasterAksesMenu.IdMenu WHERE MasterAksesMenu.IdHakAkses = '$IdHakAkses' ORDER BY MasterAksesMenu.IdMenu";

                        $GetMenu = $this->db->query($QueryGetMenu)->result_array();
                    ?>


                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">

                        <?php foreach ($GetMenu as $Get) { ?>

                            <li class="nav-divider">
                                <?=$Get['Menu'];?>
                            </li>

                            <?php

                                $IdMenu                 = $Get['IdMenu'];

                                $QueryGetMenuDropdown   = "SELECT DISTINCT(MasterSubMenu.IdMenuDropdown) AS kode, MasterMenuDropdown.MenuDropdown AS nama FROM MasterSubMenu INNER JOIN MasterMenuDropdown ON MasterSubMenu.IdMenuDropdown = MasterMenuDropdown.IdMenuDropdown WHERE MasterSubMenu.IdMenu = '$IdMenu' AND MasterSubMenu.StatusAktif = '1' ";

                                $GetMenuDropdown = $this->db->query($QueryGetMenuDropdown)->result_array();

                                foreach ($GetMenuDropdown as $md) { ?>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-<?= $md['kode'];?>" aria-controls="submenu-<?= $md['kode'];?>"><i class="fa fa-fw fa-rocket"></i> <?= $md['nama'];?></a>
                                        <div id="submenu-<?= $md['kode'];?>" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <!-- BACA SUB MENU -->
                                                <?php
                                                $IdMenuDropdown         = $md['kode'];
                                                $QueryGetSubMenu        = "SELECT MasterSubMenu.SubMenu, MasterSubMenu.URL, MasterSubMenu.IdMenu, MasterSubMenu.IdMenuDropdown FROM MasterSubMenu WHERE IdMenu = '$IdMenu' AND IdMenuDropdown = '$IdMenuDropdown' AND StatusAktif = '1' ";
                                                $GetSubMenu             = $this->db->query($QueryGetSubMenu)->result_array();

                                                foreach ($GetSubMenu as $sm) { ?>
                                                    <li class="nav-item">
                                                        <!-- <a class="nav-link" href="<?php base_url();?><?php echo $sm['URL'];?>"> <?php echo $sm['SubMenu']; ?> <span class="badge badge-secondary">New</span></a> -->
                                                        <a class="nav-link" href="<?php echo base_url($sm['URL']);?>"><?php echo $sm['SubMenu']; ?> <span class="badge badge-secondary">New</span></a>

                                                    </li>
                                                <?php } ?>
                                                
                                            </ul>
                                        </div>
                                    <?php  }; ?>
                                    </li>
                        <?php } ?>
                        </ul>
                    </div>
                    
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->