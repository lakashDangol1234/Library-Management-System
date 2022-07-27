<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";

// Handling Edit Category
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_category'])) {
    $categoryId = $_POST['editCategory_id'];
    $categoryName = $_POST['editCategory_name'];

    $sql = "UPDATE `category` SET `category_name`=:CATEGORY_NAME WHERE `category_id` = :CATEGORY_ID";


    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':CATEGORY_NAME', $categoryName);
    $stmt->bindparam(':CATEGORY_ID', $categoryId);
    $stmt->execute();


    header('location:' . $_SERVER['PHP_SELF'] . '?editCategory=success');
}

// Handling delete category
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteCategory'])) {
    $deleteCategoryId = $_POST['deleteCategory_id'];

    $sql = "DELETE FROM `category` WHERE `category_id` = :CATEGORY_ID";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':CATEGORY_ID', $deleteCategoryId);

    $stmt->execute();
    header('location:' . $_SERVER['PHP_SELF'] . '?deleteCategory=success');
}



// For Alert 
$categoryEdited = false;
if (isset($_GET['editCategory']) && $_GET['editCategory'] == "success") {
    $categoryEdited = true;
}

$categoryDeleted=false;
if(isset($_GET['deleteCategory']) && $_GET['deleteCategory'] == "success"){
    $categoryDeleted = true;
}


// Fetching category
$sql = "SELECT * FROM category";
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

       <!-- Category Edited / Deleted Message -->
       <div class="position-absolute w-100" style="z-index:3;">
            <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="category_edited_deleted-alert">
                <strong>Success!</strong>
                <?php
                if ($categoryEdited) {
                    echo "Category Edited Successfully !";
                } elseif ($categoryDeleted) {
                    echo "Category Deleted Successfully !";
                }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>


        <!--Edit Modal -->
        <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editCategoryForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="editCategory_id" id="editCategory_id">
                            <div class="mb-3">
                                <label for="editCategory_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control rounded-4" id="editCategory_name" name="editCategory_name" placeholder="Category Name">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit_category">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!-- Delete Modal  -->
        <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="deleteCategoryForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="deleteCategory_id" id="deleteCategory_id">
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
       <!-- Manage Categories Starts Here -->
        <div class="container-fluid pt-5">
            <h3 class="mb-3 mt-2">Manage Categories</h3>
            <div class="table-responsive border border-2 rounded-3 p-2">
                <table id="category_table" class="table display table-bordered align-middle m-auto bg-white table-hover">
                    <h4 class="border-bottom mt-1 pb-2 mb-3">Categories Listing</h4>
                    <thead class="bg-light">
                        <tr id="category_table_heading">
                            <th>SN</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            echo '<tr>
                            <td class="category-info">' . $row->category_id . '</td>
                            <td class="category-info">
                                <div class="d-flex align-items-center">
                                    <img src="https://source.unsplash.com/random?' . $row->category_name . '" alt="" style="width: 45px; height: 45px" class="rounded-circle d-none d-md-inline" />
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->category_name . '</p>
                                        <!-- <p class="text-muted mb-0">john.doe@gmail.com</p> -->
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                    <i class="bi bi-pencil-square"></i>
                                    <span class="d-none d-sm-inline">Edit</span>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger delete-btn"  data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">
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
            <!-- Manage Categories Starts Here -->
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
            $('#category_table').DataTable();
        });
    </script>

    <script src="./js/manage_categories.js"></script>


    <?php
    if ($categoryEdited || $categoryDeleted) {
        echo '<script>
        document.getElementById("category_edited_deleted-alert").classList.remove("d-none");
        setTimeout(() => {
            document.getElementById("category_edited_deleted-alert").classList.add("d-none");
        }, 5000);
    </script>';
    }
    ?>
</body>

</html>