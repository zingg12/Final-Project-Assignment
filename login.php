<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font/font-face.css">
    <link rel="stylesheet" href="bootstrap_custom.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Log In | Digitalie</title>
    <link rel="shortcut icon" type="image/svg" href="assets/D.svg" />
</head>

<body id="background">

    <!-- Login card -->
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="assets/illustration/img1.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="login_process.php" method="post">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <a href="main.php"><img src="assets/Digitalie.svg" alt=""></a>
                                    </div>

                                    <h5 class="mb-3 pb-3 font-regular">Sign into your account</h5>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                        <label class="form-label pt-2 ps-1 font-regular" for="form2Example17">Email Address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                        <label class="form-label pt-2 ps-1 font-regular" for="form2Example27">Password</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn button-theme text-light btn-lg btn-block" type="submit">Log In</button>
                                    </div>

                                    <a class="small text-muted" href="#!">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2">Don't have an account? <a href="register.php" class="blue-theme">Register here</a></p>
                                    <a href="#!" class="small text-muted">Terms of use.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <img src="assets/footer.svg" alt="" width="100%">
        <nav class="navbar bottom navbar-expand-sm navbar-dark blue-background px-6 pb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="assets/logo_footer.svg" width="60%" alt=""></a>
                <div class="text-light font-regular">© Copyright 2022. Design of Digitalie (Group 8)</div>

                <ul class="navbar-nav">
                    <li class="nav-item dropup mx-2">
                        <a class="nav-link dropup font-semibold text-light" href="#" id="navbarDarkDropdownMenuLinkBottom" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            EN
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="#" onclick="en_language();">EN</a></li>
                            <li><a class="dropdown-item" href="#" onclick="id_language();">ID</a></li>
                            <li><a class="dropdown-item" href="#" onclick="ru_language();">RU</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" id="search-button" href="#searchForm" data-target="#searchForm" role="button" aria-expanded="false" data-bs-toggle="collapse">
                            <i class="fa fa-search text-light"></i>
                            <i class="fa fa-close text-light"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="input-group collapse" id="searchForm">
                            <input type="text" class="form-control rounded-pill" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append collapse" id="cari">
                                <button class="btn btn-outline-secondary" id="cari" type="button"><i class="fa fa-search" aria-hidden="true" aria-controls="searchForm"></i></button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>