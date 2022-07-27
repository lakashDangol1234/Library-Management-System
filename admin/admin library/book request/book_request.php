<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";

$sql = "SELECT students.sid,fullName,books.bid,books.book_name,edition,book_status,authors.author_name,issueBook_id FROM students INNER JOIN issue_book ON students.sid = issue_book.sid INNER JOIN books ON issue_book.bid = books.bid INNER JOIN authors ON books.author = authors.author_id WHERE issue_book.approve = 'pending'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);


// For approve
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve_request'])) {
    $issueBookId = $_POST['issueBook_id'];
    $bid = $_POST['bid'];
    $approve = $_POST['approve'];

    if ($approve == 'yes') {

        $current_date = time();
        $current_date = date('Y-m-d H:i:s', $current_date);

        $return_date = time() + 432000;
        $return_date = date('Y-m-d H:i:s', $return_date);


        $sql = "UPDATE `issue_book` SET `approve` = '$approve',`issue_date`='$current_date', `return_date`='$return_date' WHERE issueBook_id = '$issueBookId'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        // Decreasing the quantity by 1
        $sql = "UPDATE books set quantity = quantity-1 WHERE bid = $bid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Checking if the quantity is 0. (and making unavailable if so)
        $sql = "SELECT quantity FROM books WHERE bid = $bid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            if ($row->quantity == 0) {
                $sql = "UPDATE books SET book_status = 'unavailable' WHERE bid = $bid";
                $stmt2 = $conn->prepare($sql);
                $stmt2->execute();
            }
        }
    } elseif ($approve == 'no') {
        $sql = "DELETE FROM `issue_book` WHERE `issueBook_id` = '$issueBookId'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    header("location:" . $_SERVER['PHP_SELF'] . "?approve=success");
    // Your response is sent successfully
}
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
    <?php include "../partials/admin_navbar.php"; ?>
    <?php include "../partials/admin_sidebar.php"; ?>

    <!-- Approve Modal  -->
    <!--Edit Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">Approve</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="approveForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="issueBook_id" id="issueBook_id">
                        <input type="hidden" name="bid" id="bid">
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Approve</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="approve" id="approve_yes" value="yes" checked>
                                    <label class="form-check-label" for="approve_yes">
                                        YES
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="approve" id="approve_no" value="no">
                                    <label class="form-check-label" for="no">
                                        NO
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="approve_request">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <main>

        <div class="container-fluid mt-5">
            <h3 class="mb-3">Book Request</h3>
            <div class="table-responsive">
                <table id="book_request_table" class="table display table-bordered align-middle m-auto bg-white table-hover">
                    <thead class="bg-light">
                        <tr id="book_request_table_heading">
                            <th>Student ID</th>
                            <th>Student's Name</th>
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>Status</th>
                            <th>Edition</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            // Checking if book is available
                            $available = "";
                            if ($row->book_status == "unavailable") {
                                $available = "disabled";
                            }
                            echo '<tr data-issue-book-id=' . $row->issueBook_id . ' data-book-id=' . $row->bid . '>
                            <td>' . $row->sid . '</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->fullName . '</p>
                                </div>
                            </td>
                            <td>' . $row->bid . '</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->book_name . '</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->book_status . '</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->edition . '</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->author_name . '</p>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary approve-btn"' . $available . ' data-bs-toggle="modal" data-bs-target="#approveModal">
                                    <i class="bi bi-pencil-square"></i>
                                    <span class="d-none d-sm-inline">Approve</span>
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
            $('#book_request_table').DataTable();
            let emptyData = document.querySelector('.dataTables_empty');
            if (document.contains(emptyData)) {
                emptyData.innerText = "There is no Book Request";
            }
        });
    </script>
    <script src="./js/book_request.js"></script>
</body>

</html>