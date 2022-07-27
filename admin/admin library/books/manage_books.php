<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";
$sql = "SELECT * FROM books INNER JOIN category ON books.category = category.category_id INNER JOIN authors ON books.author=authors.author_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <!-- Bootstrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <!-- Font Awesome CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS  -->
    <link rel="stylesheet" href="../partials/css/navbar.css">
    <link rel="stylesheet" href="../partials/css/sidebar.css">
    <link rel="stylesheet" href="../../../utilities/utilis.css">

    <!-- DataTables CSS  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <style>

    </style>

</head>

<body>
    <?php include "../partials/admin_navbar.php" ?>
    <?php include "../partials/admin_sidebar.php" ?>


    <?php
    // For Edit Modal Form
    // For authors
    $sql = "SELECT * FROM authors";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultAuthor = $stmt->fetchAll(PDO::FETCH_OBJ);


    // For category
    $sql = "SELECT * FROM category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultCategory = $stmt->fetchAll(PDO::FETCH_OBJ);
    ?>

    <!--Edit Modal -->
    <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookModalLabel">Edit Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container-fluid">

                    <form id="editBookForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="modal-body row gy-2">
                            <input type="hidden" name="editBook_id" id="editBook_id">
                            <div class="col-md-6">
                                <label for="editBook_name" class="form-label">Book Name</label>
                                <input type="text" class="form-control" id="editBook_name" name="editBook_name">
                            </div>
                            <div class="col-md-6">
                                <label for="editBook_category" class="form-label">Category</label>
                                <select id="editBook_category" name="editBook_category" class="form-select">
                                    <?php
                                    foreach ($resultCategory as $row) {
                                        echo '<option value="' . $row->category_id . '">' . $row->category_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="editBook_author" class="form-label">Author</label>
                                <select id="editBook_author" name="editBook_author" class="form-select">
                                    <?php
                                    foreach ($resultAuthor as $row) {
                                        echo '<option value="' . $row->author_id . '">' . $row->author_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="editBook_isbn_number" class="form-label">ISBN Number</label>
                                <input type="text" class="form-control" name="editBook_isbn_number" id="editBook_isbn_number">
                                <div class="form-text">An ISBN is an International Standard Book Number.ISBN Must be unique</div>
                            </div>
                            <div class="col-md-6">
                                <label for="editBook_edition" class="form-label">Book Edition</label>
                                <input type="text" class="form-control" name="editBook_edition" id="editBook_edition">
                            </div>
                            <div class="col-md-6">
                                <label for="editBook_quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="editBook_quantity" name="editBook_quantity">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit_book">Save changes</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- Delete Modal  -->
    <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBookModalLabel">Delete Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteBookForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="deleteBook_id" id="deleteBook_id">
                        <h4>Are you sure ?</h4>
                        <p class="pt-2">Do you really want to delete this record? This process cannot be undone</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <main>
        <div class="container-fluid mt-5">
            <h3 class="mb-3">Manage Books</h3>
            <div class="table-responsive border border-2 rounded-3 p-2">
                <table id="book_table" class="table table-bordered display align-middle m-auto bg-white table-hover">
                    <h4 class="border-bottom mt-1 pb-2 mb-3">Books Listing</h4>
                    <thead class="bg-light">
                        <tr id="book_table_heading">
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>ISBN Number</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Book Status</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            echo '<tr>
                            <td class="book-info">' . $row->bid . '</td>
                            <td class="book-info">
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->book_name . '</p>
                                    </div>
                                </div>
                            </td>

                            <td class="book-info">
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->isbn . '</p>
                                    </div>
                                </div>
                            </td>
                            <td class="book-info">
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->author_name . '</p>
                                    </div>
                                </div>
                            </td>
                            <td class="book-info">
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->edition . '</p>
                                    </div>
                                </div>
                            </td>

                            <td class="book-info">
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->book_status . '</p>
                                    </div>
                                </div>
                            </td>

                            <td class="book-info">
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->quantity . '</p>
                                    </div>
                                </div>
                            </td>

                            <td class="book-info">
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->category_name . '</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                            <button type="button" class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editBookModal">
                                <i class="bi bi-pencil-square"></i>
                                <span class="d-none d-sm-inline">Edit</span>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger delete-btn"  data-bs-toggle="modal" data-bs-target="#deleteBookModal">
                                <i class="bi bi-pencil-square"></i>
                                <span class="d-none d-sm-inline">Delete</span>
                            </button>
                        </td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>



    </main>

    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- jquery JS  -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- DataTables JS  -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Custom JS  -->
    <script>
        $(document).ready(function() {
            $('#book_table').DataTable();
            let emptyData = document.querySelector('.dataTables_empty');
            if (document.contains(emptyData)) {
                emptyData.innerText = "There is no book yet";
            }
        });
    </script>
    <!-- <script src="./js/manage_books.js"></script> -->
</body>

</html>