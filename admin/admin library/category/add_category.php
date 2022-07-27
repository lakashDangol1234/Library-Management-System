<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_category'])) {
    $categoryName = $_POST['category_name'];

    // Checking whether the category already exists or not 
    $sql = "SELECT * FROM category WHERE category_name=:CATEGORY_NAME";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":CATEGORY_NAME", $categoryName);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    if ($stmt->rowCount() != 0) {
        // cateogory already exists
        header("location:" . $_SERVER['PHP_SELF'] . "?categoryExists=true");
    } else {
        $sql = "INSERT INTO `category` (`category_name`, `creationDate`) VALUES (:CATEGORY_NAME, current_timestamp())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":CATEGORY_NAME", $categoryName);
        $result = $stmt->execute();
        header("location:" . $_SERVER['PHP_SELF'] . "?categoryAdded=true");
    }
}

$categoryAdded = false;
if (isset($_GET['categoryAdded']) && $_GET['categoryAdded'] == "true") {
    $categoryAdded = true;
}

$categoryExists=false;
if(isset($_GET['categoryExists']) && $_GET['categoryExists'] == "true"){
    $categoryExists = true;
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

    <!-- Category Added Message -->
    <div class="position-absolute w-100" style="z-index:3;">
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="category_added-alert">
            <strong>Success!</strong>
            <?php
            if ($categoryAdded) {
                echo "Category Added Successfully !";
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <!--  Category Already Exists Message  -->
    <div class="position-absolute w-100" style="z-index:3;">
        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="category_exists-alert">
            <strong>Error !</strong>
            <?php
            if ($categoryExists) {
                echo "Category Already Exists!";
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>


    <main style="background-color: #eeeeee; height:100vh;" class="py-5">
        <div class="heading mb-4 pt-2">
            <h2 class="px-5 ms-4">Add Category</h2>
        </div>
        <div class="container border border-5 rounded-5 pt-3 pb-4 px-5 bg-light">
            <h2 class="mt-3 mb-4">Category Info</h2>
            <form>
                <div class="row mb-3">
                    <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control rounded-4" id="category_name" name="category_name" placeholder="Category Name">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="add_category">Create</button>
            </form>
        </div>
    </main>


    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <?php
    if ($categoryAdded) {
        echo '<script>
        document.getElementById("category_added-alert").classList.remove("d-none");
        setTimeout(() => {
            document.getElementById("category_added-alert").classList.add("d-none");
        }, 5000);
    </script>';
    }

    if ($categoryExists) {
        echo '<script>
        document.getElementById("category_exists-alert").classList.remove("d-none");
        setTimeout(() => {
            document.getElementById("category_exists-alert").classList.add("d-none");
        }, 5000);
    </script>';
    }
    ?>

</body>

</html>