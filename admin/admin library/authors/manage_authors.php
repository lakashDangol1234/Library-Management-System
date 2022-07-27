<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";
// Handling Edit Author
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_author'])) {
    $authorId = $_POST['editAuthor_id'];
    $authorName = $_POST['editAuthor_name'];

    $sql = "UPDATE `authors` SET `author_name`=:AUTHOR_NAME WHERE `author_id` = :CATEGORY_ID";


    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':AUTHOR_NAME', $authorName);
    $stmt->bindparam(':CATEGORY_ID', $authorId);
    $stmt->execute();


    header('location:' . $_SERVER['PHP_SELF'] . '?editAuthor=success');
}

// Handling delete author
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteAuthor'])) {
    $deleteAuthorId = $_POST['deleteAuthor_id'];

    $sql = "DELETE FROM `author` WHERE `author_id` = :CATEGORY_ID";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':CATEGORY_ID', $deleteAuthorId);

    $stmt->execute();
    header('location:' . $_SERVER['PHP_SELF'] . '?deleteAuthor=success');
}
// For Alert 
$authorEdited = false;
if (isset($_GET['editAuthor']) && $_GET['editAuthor'] == "success") {
    $authorEdited = true;
}

$authorDeleted=false;
if(isset($_GET['deleteAuthor']) && $_GET['deleteAuthor'] == "success"){
    $authorDeleted = true;
}




// Fetching author
$sql = "SELECT * FROM authors";
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

    <!-- Author Edited / Deleted Message -->
    <div class="position-absolute w-100" style="z-index:3;">
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="author_edited_deleted-alert">
            <strong>Success!</strong>
            <?php
            if ($authorEdited) {
                echo "Author Edited Successfully !";
            } elseif ($authorDeleted) {
                echo "Author Deleted Successfully !";
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>


    <!--Edit Modal -->
    <div class="modal fade" id="editAuthorModal" tabindex="-1" aria-labelledby="editAuthorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAuthorModalLabel">Edit Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAuthorForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="editAuthor_id" id="editAuthor_id">
                        <div class="mb-3">
                            <label for="editAuthor_name" class="form-label">Author Name</label>
                            <input type="text" class="form-control rounded-4" id="editAuthor_name" name="editAuthor_name" placeholder="Author Name">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit_author">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Delete Modal  -->
    <div class="modal fade" id="deleteAuthorModal" tabindex="-1" aria-labelledby="deleteAuthorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAuthorModalLabel">Delete Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteAuthorForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="deleteAuthor_id" id="deleteAuthor_id">
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
        <!-- Manage Authors Starts Here  -->
        <div class="container-fluid mt-5">
            <h3 class="mb-3 pt-1">Manage Authors</h3>
            <div class="table-responsive border border-2 rounded-3 p-2">
                <table id="author_table" class="table display table-bordered align-middle m-auto bg-white table-hover">
                    <h4 class="border-bottom mt-1 pb-2 mb-3">Authors Listing</h4>
                    <thead class="bg-light">
                        <tr id="author_table_heading">
                            <th>SN</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            echo '<tr>
                            <td class="author-info">' . $row->author_id . '</td>
                            <td class="author-info">
                                        <p class="fw-bold mb-1">' . $row->author_name . '</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editAuthorModal">
                                    <i class="bi bi-pencil-square"></i>
                                    <span class="d-none d-sm-inline">Edit</span>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger delete-btn"  data-bs-toggle="modal" data-bs-target="#deleteAuthorModal">
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
        <!-- Manage Authors Ends Here  -->
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
            $('#author_table').DataTable();
            let emptyData = document.querySelector('.dataTables_empty');
            if (document.contains(emptyData)) {
                emptyData.innerText = "There is no Author yet";
            }
        });
    </script>

    <script src="./js/manage_authors.js"></script>
    <?php
    if ($authorEdited || $authorDeleted) {
        echo '<script>
        document.getElementById("author_edited_deleted-alert").classList.remove("d-none");
        setTimeout(() => {
            document.getElementById("author_edited_deleted-alert").classList.add("d-none");
        }, 5000);
    </script>';
    }
    ?>
</body>

</html>