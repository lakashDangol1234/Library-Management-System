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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Utilis CSS  -->
    <link rel="stylesheet" href="../utilities/utilis.css">

</head>

<body>
    <header>
        <!-- Navbar Starts Here  -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../../images/logo.png" alt="logo-book" class="img-fluid" width="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/libr/home/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/libr/admin/admin.php"> <i class="fa-solid fa-user-secret"></i> Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/libr/admin/admin.php"><i class="fa-solid fa-user-tie"></i> admin</a>
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

        <!-- Admin Login form Starts Here  -->
        <section class="vh-100 my-5">
            <div class="container-fluid h-custom">
                <div class="heading mb-5">
                    <h1 class="text-center">Admin Login</h1>
                </div>
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="./images/admin_login.webp" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="/libr/admin/partials/_handleAdminLogin.php" method="POST">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="phoneNumberOrEmail">Phone Number or Email address</label>
                                <input type="text" id="phoneNumberOrEmail" name="phoneNumberOrEmail" class="form-control form-control-lg" placeholder="Phone or Email" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" />
                            </div>

                            <div class="d-flex justify-content-end align-items-center">
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/libr/admin/admin signup/admin_signup.php" class="link-danger">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Admin Login form Ends Here  -->
        </section>

    </main>

    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>