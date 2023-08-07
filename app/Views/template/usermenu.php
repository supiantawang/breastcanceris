<?php $db = \Config\Database::connect();
$uri = service('uri');

$session = \Config\Services::session();

$u_fullname = $session->get('userdata')['u_fullname'];
$role = $session->get('userdata')['u_role'];


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
                    <?= $u_fullname ?>
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                $menu = getDataResult("ek_menuaccess", array(array('log_status', 'A'), array('log_parent', 0), array("log_access LIKE '%" . $role . "%'")), '', array('log_order', 'ASC'));
                foreach ($menu as $item) :

                    $url = base_url()  . $item->log_controller;
                    if ($item->log_function != "")
                        $url .= "/" . $item->log_function;

                    $active = "";
                    $open = "";
                    if ($uri->getSegment(1) == $item->log_controller && $uri->getSegment(2) == $item->log_function)
                        $active = "active";

                    $hasChild = getDataCount("ek_menuaccess", array(array('log_parent', $item->log_id), array('log_status', 'A')));
                    if ($hasChild > 0) :
                        $subMenu = getDataResult("ek_menuaccess", array(array('log_status', 'A'), array('log_parent', $item->log_id), array("log_access LIKE '%" . $role . "%'")), '', array('log_order', 'ASC'));

                        if ($uri->getSegment(2)) {
                            $checkChild = getDataResult("ek_menuaccess", array(array('log_status', 'A'), array('log_parent', $item->log_id), array('log_controller', $uri->getSegment(1)), array('log_function', $uri->getSegment(2))), '', array('log_order', 'ASC'));
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
                                    $url2 = base_url()  . $itemChild->log_controller;
                                    if ($itemChild->log_function != "")
                                        $url2 .= "/" . $itemChild->log_function;

                                    $active2 = "";
                                    if ($uri->getSegment(1) == $itemChild->log_controller && $uri->getSegment(2) == $itemChild->log_function)
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


                </li>

                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item ">
                    <a href="<?php echo base_url() ?>profile" class="nav-link<?= ($uri->getSegment(1) == "profile" && $uri->getSegment(2) == "") ? " active" : "" ?>">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p class="text">Profile</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="<?php echo base_url() ?>profile/password" class="nav-link<?= ($uri->getSegment(1) == "profile" && $uri->getSegment(2) == "password") ? " active" : "" ?>">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p class="text">Change Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>logout" class="nav-link">
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