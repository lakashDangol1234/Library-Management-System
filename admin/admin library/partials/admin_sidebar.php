<!-- Sidebar Starts Here -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel" style="background-color: #4c4c4c;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel" style="color:white;"><i class="fa-solid fa-book"></i> Library Management System</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color:white;"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            <li>
                <a href="/libr/admin/admin library/dashboard/admin_dashboard.php" class="nav-link text-truncate">
                    <i class="bi-speedometer2"></i><span class="ms-2 d-sm-inline">Dashboard</span> </a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bookmarks"></i><span class="ms-2 d-sm-inline">Categories</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                    <li><a class="dropdown-item" href="/libr/admin/admin library/category/add_category.php">Add Category</a></li>
                    <li><a class="dropdown-item" href="/libr/admin/admin library/category/manage_categories.php">Manage Categories</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people-fill"></i><span class="ms-2 d-sm-inline">Authors</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                    <li><a class="dropdown-item" href="/libr/admin/admin library/authors/add_author.php">Add Author</a></li>
                    <li><a class="dropdown-item" href="/libr/admin/admin library/authors/manage_authors.php">Manage Authors</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-book"></i><span class="ms-2 d-sm-inline">Books</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                    <li><a class="dropdown-item" href="/libr/admin/admin library/books/add_book.php">Add Book</a></li>
                    <li><a class="dropdown-item" href="/libr/admin/admin library/books/manage_books.php">Manage Books</a></li>
                </ul>
            </li>
            <li>
                <a href="/libr/admin/admin library/book request/book_request.php" class="nav-link text-truncate">
                <i class="bi bi-journal-arrow-up"></i><span class="ms-2 d-sm-inline">Book Request</span> </a>
            </li>
            <li>
                <a href="/libr/admin/admin library/issued books/issue_info.php" class="nav-link text-truncate">
                <i class="bi bi-journal-check"></i><span class="ms-2 d-sm-inline">Issued Books Information</span> </a>
            </li>
            <li>
                <a href="/libr/admin/admin library/expired returned books/expired_and_returned.php" class="nav-link text-truncate">
                <i class="bi bi-journal-album"></i><span class="ms-2 d-sm-inline">Expired / Returned Books</span> </a>
            </li>

            <li>
                <a href="/libr/admin/admin library/return book request/return_book_request.php" class="nav-link text-truncate">
                    <i class="bi bi-clipboard-plus"></i><span class="ms-1 d-sm-inline">Return Book Request</span></a>
            </li>
            <li>
                <a href="/libr/admin/admin library/registered students/studentList.php" class="nav-link text-truncate">
                    <i class="bi bi-person-fill"></i><span class="ms-1 d-sm-inline">Students</span></a>
            </li>
            <li class="mt-3">
                <hr class="dropdown-divider" style="background-color: black; height:1px;">
            </li>
            <li class="dropdown mt-1">
                <a href="#" class="nav-link d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                    <span class="d-sm-inline mx-1"><?php echo $_SESSION['admin_name'] ?></span>
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