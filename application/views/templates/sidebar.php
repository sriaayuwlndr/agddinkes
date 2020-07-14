<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TriCode</div>
    </a>



    <!-- query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menuNew.id, user_menuNew.menu FROM user_menuNew INNER JOIN  user_access_menu ON user_menuNew.id = 
        user_access_menu.menu_id where user_access_menu.role_id = '$role_id' order by user_menuNew.nourut";
    $menu = $this->db->query($queryMenu)->result_array();

    ?>
    <!-- looping menu-->

    <?php
    foreach ($menu as $m) {; ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            <!-- Divider garis di sidebar -->
            <hr class="sidebar-divider mt-3">
            <?= $m['menu']; ?>
        </div>
        <!-- baca sub menu -->

        <?php
        $menuid = $m['id'];
        $querysubMenu = "SELECT user_sub_menu.id, user_sub_menu.menu_id, user_sub_menu.title, user_sub_menu.url, user_sub_menu.icon, 
            user_sub_menu.is_active FROM user_menuNew INNER JOIN user_sub_menu ON user_menuNew.id = user_sub_menu.menu_id 
            where user_sub_menu.menu_id = '$menuid' and user_sub_menu.is_active = '1'";
        $submenu = $this->db->query($querysubMenu)->result_array();
        foreach ($submenu as $sm) { ?>
            <!-- Nav Item - Dashboard -->
            <!-- biar menu yang aktif di bold -->
            <?php if ($title == $sm['title']) {; ?>
                <li class="nav-item active">
                <?php } else {; ?>
                <li class="nav-item">
                <?php }; ?>
                <!-- sampai sini menu yang aktif di bold -->
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php  } ?>
        <?php }; ?>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>
        <!-- end looping menu -->
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->