<header>
    <!-- Navbar Starts Here-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid justify-content-between">
            <!-- Left elements -->
            <div class="d-flex align-items-center">
                <!-- Sidebar Populator  -->
                <i class="bi bi-list-columns-reverse" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" id="sidebarPopulator"></i>
                <!-- Brand -->
                <a class="navbar-brand me-2 d-flex align-items-center" href="/libr/admin/admin library/dashboard/admin_dashboard.php">
                    <img src="/libr/images/logo.png" alt="logo-book" class="img-fluid" width="40">
                </a>
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <ul class="navbar-nav flex-row d-none justify-content-between d-md-flex w-50">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Authors</span>
                        <span class="badge rounded-pill badge-notification bg-danger">2</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/libr/admin/admin library/authors/add_author.php">Add Author</a></li>
                        <li><a class="dropdown-item" href="/libr/admin/admin library/authors/manage_authors.php">Manage Authors</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Books</span>
                        <span class="badge rounded-pill badge-notification bg-danger">2</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/libr/admin/admin library/add_book.php">Add Book</a></li>
                        <li><a class="dropdown-item" href="/libr/admin/admin library/manage_books.php">Manage Books</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Issue Books</span>
                        <span class="badge rounded-pill badge-notification bg-danger">2</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                        <span>Students</span>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                </li>


            </ul>
            <!-- Center elements -->
            <!-- Right elements -->
            <ul class="navbar-nav flex-row">
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link d-sm-flex align-items-sm-center" href="#">
                        <img src="/libr/admin/admin library/partials/images/user_image.webp" class="rounded-circle" alt="Black and White Portrait of a Man" loading="lazy" height="22">
                        <strong class="d-none d-sm-block ms-1"><?php echo $_SESSION['admin_name']; ?></strong>
                    </a>
                </li>

                <!-- Notification / Bell icon -->
                <li class="nav-item dropdown me-3 me-lg-1" id="bell-icon-li">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="bell-icon" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell fa-lg"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">12</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bell-icon" style="right:0;">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>

                <!-- Dropdown arrow -->
                <li class="nav-item dropdown me-3 me-lg-1" id="dropdown-arrow-li">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="dropdown-arrow" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-chevron-circle-down fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-arrow" style="right:0;">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/libr/student/student library/partials/_handleLogout.php"><i class="bi bi-box-arrow-right"></i> Log out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Right elements -->
        </div>
    </nav>
    <!-- Navbar Ends Here-->
</header>
<script src="/libr/admin/admin library/partials/js/notification_dropdownArrow.js" defer></script>