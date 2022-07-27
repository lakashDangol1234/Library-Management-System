<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <!-- Font Awesome CSS  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <!-- Navbar Starts Here  -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">
                    <img src="../images/logo.png" alt="logo-book" class="img-fluid" width="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/admin.php"> <i class="fa-solid fa-user-secret"></i> Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../student/student.php"><i class="fa-solid fa-user-tie"></i> Student</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- Navbar Ends Here  -->
        </nav>
    </header>
    <main>


        <!-- Slider Starts Here  -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://source.unsplash.com/random/1366x500?book" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/1366x500?library" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/1366x500?study" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Text for Reader Starts Here -->
        <div class="container my-4">
            <h1 class="text-center">Hello , Reader !</h1>
            <p class="lead text-center">
                A service dedicated to Admin and Student . We provide online resources professional support and guidance
                to all our students whenever and from where ever they have chosen to study
            </p>
        <!-- Text for Reader Ends Here -->
        </div>
        <hr>

        <!-- Admin and Student Starts Here  -->
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                    <img src="images/admin.png" alt="admin-logo" width="200" class="img-fluid">
                    <a href="../admin/admin.php" class="btn btn-primary mt-3">Admin</a>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                    <img src="images/student.png" alt="student-logo" width="200" class="img-fluid">
                    <a href="../student/student.php" class="btn btn-primary mt-3">Student</a>
                </div>
            </div>
        <!-- Admin and Student Ends Here  -->
        </div>
    </main>


    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>