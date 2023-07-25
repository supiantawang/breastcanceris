<?php $db = \Config\Database::connect();
$uid = 8;
$role = 1;
?>
<aside class="main-sidebar elevation-4 sidebar-dark-pink">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>dashboard" class="brand-link bg-white">
        <img src="<?php echo base_url(); ?>assets/images/pink-ribbon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>BreastCancer</b>IS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/images/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?= getData("u_fullname", "ek_admin", "u_id ", $uid); ?>
                </a>
            </div>
        </div>

        <?php
        $menu = getDataResult("ek_menuaccess", array(array('log_status', 'A'), array('log_parent', 0), array("log_access LIKE '%" . $role . "%'")), '', array('log_order', 'ASC'));
        foreach ($menu as $item) :

            $url = base_url() . "index.php/" . $item->log_controller;
            if ($item->log_function != "")
                $url .= "/" . $item->log_function;

            $active = "";
            $open = "";
            if ($this->request->uri->getVar(1) == $item->log_controller && $this->request->uri->getVar(2) == $item->log_function)
                $active = "active";

            $hasChild = getDataCount("ek_menuaccess", array(array('log_parent', $item->log_id), array('log_status', 'A')));
            if ($hasChild > 0) :
                $subMenu = getDataResult("ek_menuaccess", array(array('log_status', 'A'), array('log_parent', $item->log_id), array("log_access LIKE '%" . $role . "%'")), '', array('log_order', 'ASC'));

                if ($this->request->uri->getVar(2)) {
                    $checkChild = getDataResult("ek_menuaccess", array(array('log_status', 'A'), array('log_parent', $item->log_id), array('log_controller', $this->request->uri->getVar(1)), array('log_function', $this->request->uri->getVar(2))), '', array('log_order', 'ASC'));
                    if ($checkChild) {
                        $active = "active";
                        $open = "menu-open";
                    } else {
                        $active = "";
                        $open = "";
                    }
                }

        ?>
                <li class="nav-item <?php echo $open; ?>">
                    <a href="#" class="nav-link  <?php echo $active; ?>">
                        <i class="nav-icon fas <?php echo $item->log_icon; ?>"></i>
                        <p class="text">
                            <?php echo $item->log_name; ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php foreach ($subMenu as $itemChild) :
                            $url2 = base_url() . "index.php/" . $itemChild->log_controller;
                            if ($itemChild->log_function != "")
                                $url2 .= "/" . $itemChild->log_function;

                            $active2 = "";
                            if ($this->request->uri->getVar(1) == $itemChild->log_controller && $this->request->uri->getVar(2) == $itemChild->log_function)
                                $active2 = "active";
                        ?>

                            <li class="nav-item <?php echo $active2; ?>">
                                <a href="<?php echo $url2; ?>" class="nav-link  <?php echo $active2; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p class="text"><?php echo $itemChild->log_name; ?></p>
                                </a>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php
            else :
            ?>
                <li class="nav-item <?php echo $active; ?>">
                    <a href="<?php echo $url; ?>" class="nav-link  <?php echo $active; ?>">
                        <i class="nav-icon fas <?php echo $item->log_icon; ?>"></i>
                        <p class="text"><?php echo $item->log_name; ?></p>

                    </a>
                </li>
            <?php
            endif;
            ?>

        <?php endforeach; ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                </li>

                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item ">
                    <a href="<?php echo base_url() ?>profile" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p class="text">Profile</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="<?php echo base_url() ?>profile/password" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p class="text">Change Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>dashboard/logout" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>