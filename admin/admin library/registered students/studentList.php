<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";
$sql = "SELECT * FROM students";
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


    <main>
        <div class="container-fluid mt-5">
            <div class="table-responsive border border-2 rounded-3 p-2">
                <table id="student_table" class="table table-bordered display align-middle m-auto bg-white table-hover">
                    <h4 class="border-bottom mt-1 pb-2 mb-3">Students Listing</h4>
                    <thead class="bg-light">
                        <tr id="student_table_heading">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($result as $row) {
                            echo '<tr>
                            <td>' . $row->sid . '</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->fullName . '</p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->email . '</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-lg-3">
                                        <p class="fw-bold mb-1">' . $row->phone_number . '</p>
                                    </div>
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
            $('#student_table').DataTable();
            let emptyData = document.querySelector('.dataTables_empty');
            if (document.contains(emptyData)) {
                emptyData.innerText = "There is no registered students yet !";
            }
        });
    </script>
</body>

</html>