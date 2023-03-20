<?php

include_once 'conn.php';
session_start();

if (!isset($_SESSION['id']) == FALSE) {
    $sql = "SELECT id, fname, lname, email, password, phone, address, role FROM users WHERE id = '$_SESSION[id]'";
} else {
    $sql = "SELECT id, fname, lname, email, password, phone, address, role FROM users";
}

// $mysql = $conn->query("SELECT * FROM users");

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT confirm FROM order_list";
$test = $conn->query($sql2);
$row3 = $test->fetch_assoc();

?>


<!DOCTYPE html>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Home | Digitalie</title>
    <link rel="shortcut icon" type="image/svg" href="assets/D.svg" />
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light px-6 font-regular" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">
                <img src="assets/logo.svg" alt="" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- navbar menu -->
            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                    ?>
                        <?php
                        echo "<li class='nav-item mx-2'><a class='nav-link' aria-current='page' href='index_product.php'>Add Product</a></li><li class='nav-item mx-2'><a class='nav-link' aria-current='page' href='index_material.php'>Add Material</a></li>";
                        ?>
                    <?php } else { ?>
                        <li class="nav-item mx-2">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#jump-ourproduct">Product</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#jump-ourstore">Store</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#jump-contact">Contact</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#jump-aboutus">About Us</a>
                        </li>
                    <?php }  ?>

                </ul>
                </li>
                </ul>
                <!-- language and search button -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown font-semibold text-black" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <i class="fa fa-search"></i>
                            <i class="fa fa-close text-danger"></i>
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
                    <!-- login/register -->
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown font-semibold text-black" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if (isset($_SESSION['role']) && $_SESSION['role']) {
                            ?>
                                <?php
                                echo "<button class='btn btn-sm font-medium button-theme text-light rounded-pill px-3' type='button'>Hello, " . $row['fname'] . "!" . "</button>";
                                ?>
                            <?php } else { ?>
                                <button class="btn btn-sm font-medium button-theme text-light rounded-pill px-3" type="button">Hello, Guest!</button>
                            <?php }  ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                            <?php if (isset($_SESSION['role']) && $_SESSION['role']) {



                                echo "<li><a class='dropdown-item' href='profile.php'>Profile</a></li><li><a class='dropdown-item' href='logout.php'>Logout</a></li> ";


                            ?>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="register.php">Register</a></li>
                            <?php }  ?>
                        </ul>
                    </li>
                    <!-- Shopping Cart -->
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "customer") {
                    ?>
                        <?php
                        echo "<li class='nav-item'>
                        <a class='nav-link position-relative btn btn-sm font-medium button-theme2 rounded-3' type='button' href='quotation.php'>Quotation <i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>";
                        ?>
                    <?php } else { ?>
                    <?php }  ?>
                    <!-- order list (admin only) -->
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
                    ?>
                        <?php
                        echo "<li class='nav-item mx-2'>
                        <a class='nav-link position-relative btn btn-sm font-medium button-theme2 rounded-3' type='button' href='order_list.php'>Order <i class='fa fa-list-alt' aria-hidden='true'></i><span class='position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle'><span class='visually-hidden'>New alerts</span></a></li>";
                        ?>
                    <?php } else { ?>
                    <?php }  ?>
            </div>
        </div>
    </nav>
    <!-- EndNavbar -->

    <!--Landing Page -->
    <section id="landing" style="height:30rem">
        <div class="container my-5" id="wrapper1">
            <div class="row">
                <div class="col">
                    <div class="welcoming mt-6">
                        <h3 class="font-semibold">
                            Find all your needs in <span style="color:#112f91">digital printing</span>
                            at our place,<br>
                            <span style="color:#112f91">Digitalie</span>.
                        </h3>
                        <div class="bungkusbutton mt-5 font-regular">
                            <a href="#jump-ourstore">
                                <button type="button" class="btn btn-primary btn-block px-5 button-theme rounded-3" id="locate-nearby-button">Locate nearby store</button></a>
                            <a href="products.php">
                                <button type="button" class="btn btn-light btn-block px-4 m-lg-2 button-theme2 rounded-3" id="check-product-button" href="products.php">Check product</button></a>
                        </div>
                    </div>
                </div>
                <div class="col px-2">
                    <img src="assets/gambarhome.svg" width="100%" alt="" id="figure1" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Landing Page -->

    <!-- Our Best Selling Services -->
    <section id="best-selling-services">
        <div class="background-arrow">
            <div class="container my-5 py-5">
                <div class="row text-center text-center">
                    <div class="col rounded w-100">
                        <h2 class="mb-3 font-semibold">Our Best Selling Services</h2>
                        <p class="mb-5 font-regular mt-4">In <span style="color:#112f91">Digitalie</span>, we really maintain our quality in serving our customers, <br>
                            our best services based on their ratings.</p>
                    </div>
                </div>
                <div class="container d-flex justify-content-center" id="wrapper2-konten">
                    <div class="row text-center" data-aos="zoom-out-up">
                        <div class="col">
                            <div class="card mx-2" id="wrapper2-card">
                                <img src="assets/sticker.svg" class="card-img-top py-4" width="150px" height="150px" />
                                <div class="card-body">
                                    <h3 class="font-semibold">Sticker</h3>
                                    <p class="card-text font-regular">Provides services that creating a maximum result for our customers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card mx-2" id="wrapper2-card">
                                <img src="assets/printing.svg" class="card-img-top" width="150px" height="150px" />
                                <div class="card-body">
                                    <h3 class="font-semibold">Printing</h3>
                                    <p class="card-text font-regular">Advanced technology with the best and fastest production</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card mx-2" id="wrapper2-card">
                                <img src="assets/card.svg" class="card-img-top" width="150px" height="150px" />
                                <div class="card-body">
                                    <h3 class="font-semibold">Card</h3>
                                    <p class="card-text font-regular">We always maintain our materials and technology for a better results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Best Selling Services -->

    <!--Homepage-bawah-->
    <!-- our product -->
    <section id="jump-ourproduct">
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-6">
                    <img src="assets/ourproducts.svg" width="80%">
                </div>
                <div class="col-6" data-aos="zoom-out-left">
                    <h2 class="font-semibold mb-4">Our Products</h2>
                    <p class="font-regular">
                        Experienced in many kind of designs, first class materials and supported by an advanced technology. Allow our customer to experience the best quality in any of our products.
                    </p>
                    <div class="container py-4">
                        <div class="row">
                            <div class="col">
                                <div class="card" style="width: 80%">
                                    <a href="products.php" class="text-decoration-none ">
                                        <img src="assets/koran.svg" class="card-img-top ps-2 py-2" style="width: 50px;">
                                        <div class="card-body">
                                            <h5 class="card-title font-semibold blue-theme blue-hover" style="color:#1B7FBD;">Products</h5>
                                            <p class="card-text font-regular text-black">Check our newest products here!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" style="width: 80%">
                                    <a href="materials.php" class="text-decoration-none">
                                        <img src="assets/material.svg" class="card-img-top ps-2 py-2" style="width: 50px;">
                                        <div class="card-body" href="#">
                                            <h5 class="card-title font-semibold blue-hover" style="color:#1B7FBD;">Materials</h5>
                                            <p class="card-text font-regular text-black">Check our newest materials here!</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="jump-ourstore"></div>
        </div>
        <!-- our store -->
        <section id="ourstore">
            <div class="container my-5 py-5">
                <div class="row">
                    <div class="col-6" data-aos="zoom-out-right">
                        <h2 class="font-semibold py-4">Our Stores</h2>
                        <p class="font-regular">
                            Located in the most strategic location in every big cities, with more than 100 outlets get around the country.
                        </p>

                        <div class="font-regular">
                            <button type="button" class="btn btn-primary btn-sm px-4 py-2 font-semibold me-2 button-theme rounded-3">View on Google Maps <img src="assets/googlemaps.svg">
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-sm px-4 py-2 button-theme2 rounded-3 font-regular">Location</button>
                        </div>

                    </div>
                    <div class="col-6">
                        <img src="assets/ourstores.svg" width="100%" height="300">
                    </div>
                </div>
                <div id="jump-contact"></div>
            </div>
        </section>

        <!-- contact wrapper -->
        <section id="contact">
            <div class="container my-5 py-5 px-5 d-flex justify-content-around">
                <div class="row">
                    <div class="col-6 py-5">
                        <h2 class="font-bold blue-theme">Digitalie</h2>
                        <h3 class="font-regular">Your Digital Buddy</h3>
                    </div>
                    <div class="col-6" data-aos="fade-left">
                        <h2 class="font-semibold">Contact</h2>
                        <p class="font-regular">for booking, order details, etc</p>
                        <a class="nav-link text-start text-black font-semibold" href="#"><img src="assets/whatsapp.svg">
                            +62 812 345 6789</a>
                        <a class="nav-link font-semibold text-black text-start" href="#"><img src="assets/instagram.svg"> @digitalieprint
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="jump-aboutus">
            <!-- about us -->
            <div class="container my-5 py-5 mt-6" data-aos="fade-up">
                <div class="row text-center">
                    <div class="col">
                        <h2 class="font-semibold">About Us</h2>
                        <h3 class="font-bold blue-theme">Digitalie</h3>
                    </div>
                </div>
                <div class="row mt-5 mx-5">
                    <div class="col-6 d-flex justify-content-center">
                        <img src="assets/vanneslie.svg" class="" width="200">
                    </div>
                    <div class="col-6">
                        <p class="font-regular fs-5 py-5 my-5">Digitalie found by our own CEO Mr. Vannes Lie, manages and directs the company toward its primary goals and objectives. Oversees employment decisions at the executive level of the company. Leads a team of executives to consider major decisions including acquisitions, mergers, joint ventures, or large-scale expansion.</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-6">
                        <p class="font-regular fs-5 py-1 my-5">Established since 2000, had been doing research for almost 5 years in finding the best printing technique around the world, expertise in printing supported with an advanced printing machine creating a top quality results.</p>
                        <p style="font-family: Poppins; font-size: 17pt;" class="customer text-center">Customers satisfaction is our top priority.</p>
                        <p style="font-family: Poppins; font-size: 17pt;" class="customer text-center">“Beyond Your Expectations”</p>
                    </div>
                    <div class="col-6">
                        <img src="assets/office_workers.svg" class="float-end">
                    </div>
                </div>
            </div>
        </section>
        <!--End of Homepage-bawah-->

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

        <button onclick="topFunction()" id="myBtn" title="Go to top">
            <i class="fa fa-angle-double-up fs-1" aria-hidden="true"></i>
        </button>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="script.js"></script>
</body>

</html>