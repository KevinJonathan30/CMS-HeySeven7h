<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Enterprise</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <!--<div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>-->
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="change_password.php">Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php 
                    if($_SESSION["role"] == 0) {
                    ?>
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="manage_tutor.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Manage Tutor
                    </a>

                    <?php
                    }
                    ?>
                    <div class="sb-sidenav-menu-heading">Tryout</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Tests
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne"
                        data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="all_tests.php">All Tests</a>
                            <a class="nav-link" href="add_new_test.php">Add New</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="view_score.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        View Score
                    </a>
                    <div class="sb-sidenav-menu-heading">Attendance</div>
                    <a class="nav-link" href="student_record.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        Student Record
                    </a>
                    <a class="nav-link" href="private_attendance.php">
                        <div class="sb-nav-link-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        Private Attendance
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $_SESSION["name"]; ?>
            </div>
        </nav>
    </div>