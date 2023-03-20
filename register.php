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
    <title>Register | Digitalie</title>
    <link rel="shortcut icon" type="image/svg" href="assets/D.svg" />
</head>

<body id="background">

    <!-- Register -->

    <!-- Section: Design Block -->

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <img src="assets/Digitalie.svg" alt="" class="mb-2 display-5">
                <hr width="400" class="my-4">
                <h3 class="font-semibold">
                    Find all your needs in <span style="color:#112f91">digital printing</span>
                    at our place,<br>
                    <span style="color:#112f91">Digitalie</span>.
                </h3>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass" style="border-radius: 1rem;">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="register_process.php" method="post">
                            <div class=" d-flex align-items-center mb-3 pb-1">
                                <a href="main.php"><img src="assets/Digitalie.svg" alt=""></a>
                            </div>

                            <h5 class="mb-3 pb-3 font-regular">Register your new account</h5>

                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input required type="text" id="fname" name="fname" class="form-control" />
                                        <label class="form-label pt-2 ps-1 font-regular" for="form3Example1">First name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input required type="text" id="lname" name="lname" class="form-control" />
                                        <label class="form-label pt-2 ps-1 font-regular" for="form3Example2">Last name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input required type="email" id="email" name="email" class="form-control" />
                                <label class="form-label pt-2 ps-1 font-regular" for="form3Example3">Email Address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input required type="password" id="password" name="password" class="form-control" />
                                <label class="form-label pt-2 ps-1 font-regular" for="form3Example4">Password</label>
                            </div>

                            <!-- Phone -->
                            <div class="form-outline mb-4">
                                <input required type="text" id="phone" name="phone" class="form-control" />
                                <label class="form-label pt-2 ps-1 font-regular" for="form3Example5">Phone Number</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-floating mb-4">
                                <textarea required class="form-control" name="address" placeholder="Leave a comment here" id="address" style="height: 100px"></textarea>
                                <label for="floatingTextarea" class="font-regular">Address</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn button-theme btn-lg text-light btn-block mb-4">
                                Sign Up
                            </button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Already have an account?</p>
                                <a href="login.php" class="btn button-theme2 btn-sm px-3 rounded-pill font-regular" type="button">Log In</a>
                            </div>

                            <div class="text-center pt-4">
                                <a href="#!" class="small text-muted">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
                            </div>

                        </form>
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