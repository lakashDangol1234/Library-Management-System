<!-- Sidebar Starts Here -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel" style="background-color: #4c4c4c;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel" style="color:white;"><i class="fa-solid fa-book"></i> Library Management System</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color:white;"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            <li>
                <a href="/libr/student/student library/dashboard/student_dashboard.php" class="nav-link text-truncate">
                    <i class="bi-speedometer2"></i><span class="ms-2 d-sm-inline">Dashboard</span> </a>
            </li>
            <li>
                <a href="/libr/student/student library/books/booklist.php" class="nav-link text-truncate">
                    <i class="bi bi-book"></i><span class="ms-2 d-sm-inline">Books</span> </a>
            </li>

            <li>
                <a href="/libr/student/student library/requested books/requested_books.php" class="nav-link text-truncate">
                <i class="bi bi-book-half"></i><span class="ms-2 d-sm-inline">Requested Books</span> </a>
            </li>
            <li>
                <a href="/libr/student/student library/borrowed books/borrowed_books.php" class="nav-link text-truncate">
                    <i class="bi bi-journal-arrow-down"></i><span class="ms-2 d-sm-inline">Borrowed Books</span> </a>
            </li>
            <li>
                <a href="/libr/student/student library/fine/fine.php" class="nav-link text-truncate">
                <i class="bi bi-cash"></i><span class="ms-2 d-sm-inline">Fine</span> </a>
            </li>


            <li class="mt-3">
                <hr class="dropdown-divider" style="background-color: black; height:1px;">
            </li>
            <li class="dropdown mt-1">
                <a href="#" class="nav-link d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-sm-inline mx-1"><?php echo $_SESSION['student_name'] ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/libr/student/student library/partials/_handleLogout.php"><i class="bi bi-box-arrow-right"></i> Log out</a></li>
                </ul>
            </li>
        </ul>

    </div>
    <!-- sidebar Ends Here  -->
</div>