<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Font Awesome CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Utilis CSS  -->
    <link rel="stylesheet" href="../utilities/utilis.css">

</head>

<body>
    <header>
        <!-- Navbar Starts Here  -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../home/index.php">
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
                            <a class="nav-link active" aria-current="page" href="../home/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./admin.php"> <i class="fa-solid fa-user-secret"></i> Admin</a>
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
        <!-- Admin Text Starts Here -->
        <div class="container admin-text text-center my-4">
            <h1>Hello , Admin</h1>
            <p class="lead">Welcome to Online Library Management System</p>
        </div>
        <hr>
        <div class="login-signup text-center">
            <p class="font1">You can access various features after Login/SignUp</p>
            <a class="btn btn-primary" href="./admin signup/admin_signup.php">Sign Up</a>
            <a class="btn btn-primary" href="./admin login/admin_login.php">Login</a>
        </div>
        <!-- Admin Text Ends Here  -->
    </main>

    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>