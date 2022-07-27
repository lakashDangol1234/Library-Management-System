<?php
include "../partials/_checkLoggedin.php";
include "../../../partials/connection/_database.php";
$bookAdded = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_book'])) {
    $bookName = $_POST['book_name'];
    $bookCategory = $_POST['book_category'];
    $bookAuthor = $_POST['book_author'];
    $bookIsbn_number = $_POST['book_isbn_number'];
    $bookEdition = $_POST['book_edition'];
    $bookQuantity = $_POST['book_quantity'];



    // bookQuantity must be greater than 1
    $sql = "INSERT INTO `books` (`book_name`, `isbn`, `author`, `edition`, `book_status`, `quantity`, `category`, `regDate`) VALUES ('$bookName', '$bookIsbn_number', '$bookAuthor', '$bookEdition', 'Available', '$bookQuantity', '$bookCategory', current_timestamp()); ";

    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();

    $bookAdded = true;
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
    <?php include "../partials/admin_navbar.php"; ?>
    <?php include "../partials/admin_sidebar.php"; ?>

    <?php
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

    <?php
    if ($bookAdded) {
        // show alert
        $bookAdded = false;
    }
    ?>
    <main style="background-color: #eeeeee; height:100vh;" class="py-4">
        <div class="heading mb-4">
            <h2 class="px-5 ms-4">Add Book</h2>
        </div>
        <div class="container border border-5 rounded-5 pt-3 pb-4 px-5 bg-light">
            <h2 class="mt-3 mb-4">Book Info</h2>
            <form class="row g-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="col-md-6">
                    <label for="book_name" class="form-label">Book Name</label>
                    <input type="text" class="form-control" id="book_name" name="book_name">
                </div>
                <div class="col-md-6">
                    <label for="book_category" class="form-label">Category</label>
                    <select id="book_category" name="book_category" class="form-select">
                        <?php
                        foreach ($resultCategory as $row) {
                            echo '<option value="' . $row->category_id . '">' . $row->category_name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="book_author" class="form-label">Author</label>
                    <select id="book_author" name="book_author" class="form-select">
                        <?php
                        foreach ($resultAuthor as $row) {
                            echo '<option value="' . $row->author_id . '">' . $row->author_name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="book_isbn_number" class="form-label">ISBN Number</label>
                    <input type="text" class="form-control" name="book_isbn_number" id="book_isbn_number">
                    <div class="form-text">An ISBN is an International Standard Book Number.ISBN Must be unique</div>
                </div>
                <div class="col-md-6">
                    <label for="book_edition" class="form-label">Book Edition</label>
                    <input type="text" class="form-control" name="book_edition" id="book_edition">
                </div>
                <div class="col-md-6">
                    <label for="book_quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="book_quantity" name="book_quantity">
                </div>
                <div class="col-12">
                    <button type="submit" name="submit_book" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Custom JS  -->
    <script src="./js/manage_book.js"></script>
</body>

</html>