<?php
include "../partials/_checkLoggedin.php";
// Show approve = yes and approve = expired books (issued books)
include "../../../partials/connection/_database.php";


$sql = "SELECT * FROM issue_book WHERE approve='yes'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
$d = date("Y-m-d");

foreach ($result as $row) {
    if ($d > $row->return_date) { // checking if the issued book is expired
        $sql = "UPDATE issue_book SET approve = 'expired' WHERE issueBook_id = '$row->issueBook_id'"; // setting yes to expired
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}



$sql = "SELECT students.sid,fullName,books.bid,books.book_name,edition,authors.author_name,issue_book.issue_date,approve,return_date FROM students INNER JOIN issue_book ON students.sid = issue_book.sid INNER JOIN books ON issue_book.bid = books.bid INNER JOIN authors ON books.author = authors.author_id WHERE issue_book.approve != 'pending' AND issue_book.approve != 'returned' ORDER BY issue_book.return_date ASC";
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
    <?php include "../partials/admin_navbar.php"; ?>
    <?php include "../partials/admin_sidebar.php"; ?>


    <main>
        <div class="container-fluid mt-5">
            <h3 class="mb-3">Issued Book Information</h3>
            <div class="table-responsive">
                <table id="issued_bookInfo_table" class="table display table-bordered align-middle m-auto bg-white table-hover">
                    <thead class="bg-light">
                        <tr id="issued_bookInfo_table_heading">
                            <th>Student ID</th>
                            <th>Student's Name</th>
                            <th>Book ID</th>
                            <th>Book Name</th>
                            <th>Edition</th>
                            <th>Author</th>
                            <th>Issued Date</th>
                            <th>Return Date</th>
                            <th>Approve Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            echo '<tr>
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
                                    <p class="fw-bold mb-1">' . $row->edition . '</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->author_name . '</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->issue_date . '</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->return_date . '</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-1">' . $row->approve . '</p>
                                </div>
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

    <script>
        $(document).ready(function() {
            $('#issued_bookInfo_table').DataTable();
            let emptyData = document.querySelector('.dataTables_empty');
            if (document.contains(emptyData)) {
                emptyData.innerText = "There is no issued book";
            }
        });
    </script>
</body>

</html>