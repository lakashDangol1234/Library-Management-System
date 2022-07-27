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
                            <a class="nav-link" href="/libr/student/student.php"><i class="fa-solid fa-user-tie"></i> Student</a>
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
        <!-- Sign Up Login form Starts Here  -->
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100 pt-3">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Student Signup</p>

                                        <form class="mx-1 mx-md-4" action="/libr/student/partials/_handleStudentSignup.php" method="POST">

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="full_name">Full Name</label>
                                                    <input type="text" id="full_name" name="full_name" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="phone_number">Phone Number</label>
                                                    <input type="text" id="phone_number" name="phone_number" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control" />
                                                </div>
                                            </div>


                                            <div class="form-check d-flex justify-content-center mb-4">
                                                <input class="form-check-input me-2" type="checkbox" value="" id="agree_terms" name="agree_terms" />
                                                <label class="form-check-label" for="agree_terms">
                                                    I agree all statements in <a href="#!">Terms of service</a>
                                                </label>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-2">
                                                <button class="btn btn-primary btn-lg" name="signup">Register</button>
                                            </div>
                                            <div class="d-flex justify-content-center text-center text-lg-start pt-2 mb-log-4 mb-3">
                                                <p class="small fw-bold mt-2 pt-1 mb-0">Already had an account? <a href="/libr/student/student login/student_login.php" class="link-danger">Login</a></p>
                                            </div>

                                        </form>

                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="./images/student_signup.webp" class="img-fluid" alt="Sample image">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>