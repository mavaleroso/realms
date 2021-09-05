<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="index.html">
                <!-- <img class="img-fluid for-light" src="<?php echo BASE_URL ?>/assets/cuba/assets/images/logo/logo.png" alt=""> -->
                <!-- <img class="img-fluid for-dark" src="<?php echo BASE_URL ?>/assets/cuba/assets/images/logo/logo_dark.png" alt=""> -->
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo BASE_URL ?>/assets/cuba/assets/images/logo/logo-icon.png" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?php echo BASE_URL ?>/assets/cuba/assets/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1 m-0">General</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav active" href="<?php echo BASE_URL ?>/modules/<?php echo $_SESSION['role'] ?>/dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="book"></i><span>Courses</span></a>
                        <ul class="sidebar-submenu">
                            <?php
                            $query = "SELECT * FROM tbl_courses";
                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<li><a href="product.html">' . $row['name'] . '</a></li>';
                            }
                            ?>

                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="task.html"><i data-feather="check-square"> </i><span>Tasks</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="calendar-basic.html"><i data-feather="calendar"> </i><span>Calendar</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="contacts.html"><i data-feather="message-circle"> </i><span>Chat</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="contacts.html"><i data-feather="film"> </i><span>Logs</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="contacts.html"><i data-feather="user"> </i><span>Profile</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="contacts.html"><i data-feather="help-circle"> </i><span>Help</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="contacts.html"><i data-feather="settings"> </i><span>Settings</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->