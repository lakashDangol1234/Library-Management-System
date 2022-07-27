<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_author'])) {
    $authorName = $_POST['author_name'];
    $sql = "INSERT INTO `authors` (`author_name`, `creationDate`) VALUES (:AUTHOR_NAME, current_timestamp())";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":AUTHOR_NAME", $authorName);
    $result = $stmt->execute();
    header("location:" . $_SERVER['PHP_SELF'] . "?authorAdded=true");
}

$authorAdded = false;
if (isset($_GET['authorAdded']) && $_GET['authorAdded'] == "true") {
    $authorAdded = true;
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


</head>

<body>
    <?php include "../partials/admin_navbar.php" ?>
    <?php include "../partials/admin_sidebar.php" ?>

    <!-- Author Added Message -->
    <div class="position-absolute w-100" style="z-index:3;">
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="author_added-alert">
            <strong>Success!</strong>
            <?php
            if ($authorAdded) {
                echo "Author Added Successfully !";
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>


    <main style="background-color: #eeeeee; height:100vh;" class="py-4">
        <div class="heading mb-4">
            <h2 class="px-5 ms-4">Add Author</h2>
        </div>
        <div class="container border border-5 rounded-5 pt-3 pb-4 px-5 bg-light">
            <h2 class="mt-3 mb-4">Author Info</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="author_logo text-center">
                    <i class="bi bi-person-circle" style="font-size: 80px;"></i>
                </div>
                <div class="mb-3">
                    <label for="author_name" class="form-label">Author Name</label>
                    <input type="text" class="form-control rounded-4" id="author_name" name="author_name" placeholder="Author Name">
                </div>

                <button type="submit" class="btn btn-primary" name="add_author">Add</button>
            </form>
        </div>
    </main>


    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Custom JS  -->
    <?php
    if ($authorAdded) {
        echo '<script>
    document.getElementById("author_added-alert").classList.remove("d-none");
    setTimeout(() => {
        document.getElementById("author_added-alert").classList.add("d-none");
    }, 5000);
    </script>';
    }
    ?>
</body>

</html>