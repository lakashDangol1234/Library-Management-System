<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";

// Handling Edit Category
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accept_return_request'])) {
    $issueBookId = $_POST['accept_return_request'];


    $sql = "UPDATE `issue_book` SET `approve`='returned' WHERE `issueBook_id` = :ISSUE_BOOK_ID AND `approve`='partial_return'";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':ISSUE_BOOK_ID', $issueBookId);
    $stmt->execute();


    header('location:' . $_SERVER['PHP_SELF'] . '?bookReturned=success');
}


// Fetching return book request
$sql = "SELECT * FROM `issue_book` INNER JOIN `students` ON issue_book.sid=students.sid INNER JOIN `books` ON issue_book.bid=books.bid WHERE approve='partial_return'";
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


</head>

<body>
    <?php include "../partials/admin_navbar.php" ?>
    <?php include "../partials/admin_sidebar.php" ?>


    <main>
        <!-- Manage Categories Starts Here -->
        <div class="container-fluid pt-5">
            <div class="table-responsive border border-2 rounded-3 p-2">
                <table id="return_book_request_table" class="table display table-bordered align-middle m-auto bg-white table-hover">
                    <h4 class="border-bottom mt-1 pb-2 mb-3">Return Book Request</h4>
                    <thead class="bg-light">
                        <tr id="return_book_request_table_heading">
                            <th>Issue Book ID</th>
                            <th>Student Name</th>
                            <th>Book Name</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            echo '<tr>
                            <td>' . $row->issueBook_id . '</td>
                            <td>
                                <p class="fw-bold mb-1">' . $row->fullName . '</p>
                            </td>
                            <td>
                                <p class="fw-bold mb-1">' . $row->book_name . '</p>
                            </td>
                            <td>
                                <p class="fw-bold mb-1">' . $row->issue_date . '</p>
                            </td>
                            <td>
                                <p class="fw-bold mb-1">' . $row->return_date . '</p>
                            </td>
                            <td>
                                <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                                <button class="btn btn-sm btn-primary" name="accept_return_request" value="'.$row->issueBook_id.'">
                                    <i class="bi bi-pencil-square"></i>
                                    <span class="d-none d-sm-inline">Accept Return Request</span>
                                </button>
                                </form>
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
            $('#return_book_request_table').DataTable();
        });
    </script>

    <script src="./js/manage_categories.js"></script>

</body>

</html>