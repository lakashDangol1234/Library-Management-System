<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";
include "../partials/fine_calculation.php";
$sid = $_SESSION['sid'];
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
    <link rel="stylesheet" href="css/student_dashboard.css">
    <link rel="stylesheet" href="../partials/css/navbar.css">
    <link rel="stylesheet" href="../partials/css/sidebar.css">
    <link rel="stylesheet" href="../../../utilities/utilis.css">


</head>

<body>
    <?php include "../partials/student_navbar.php"; ?>
    <?php include "../partials/student_sidebar.php"; ?>

    <main>
        <!-- Dashboard header  -->
        <div class="container-fluid text-center mt-5 mb-3 font1">
            <h4>STUDENT DASHBOARD</h4>
        </div>

        <!-- Admin Dashboard content Starts Here  -->
        <div class="container-fluid blog">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-lg-4 mt-4">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
                            <?php
                            $sql = "SELECT bid from books ";
                            $query = $conn->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $listdbooks = $query->rowCount();
                            ?>
                            <h3><?php echo htmlentities($listdbooks); ?></h3>
                            Books Listed
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-4 mt-4">
                        <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
                            <?php
                            $sql2 = "SELECT issueBook_id from issue_book where sid=$sid AND (approve='yes' OR approve='expired')";
                            $query2 = $conn->prepare($sql2);
                            $query2->execute();
                            $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                            $notReturnedbooks = $query2->rowCount();
                            ?>

                            <h3><?php echo htmlentities($notReturnedbooks); ?></h3>
                            Books Not Returned Yet
                        </div>
                    </div>
                </div>
            </div>
            <!-- Admin Dashboard content Ends Here  -->
        </div>
    </main>

    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>