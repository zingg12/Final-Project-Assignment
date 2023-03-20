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

?>
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
    <title>Products | Digitalie</title>
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
                            <a class="nav-link" aria-current="page" href="main.php">Home</a>
                        </li>
                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown" href="" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Product</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="products.php">Products</a></li>
                                <li><a class="dropdown-item" href="materials.php">Materials</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="main.php#jump-ourstore">Store</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="main.php#jump-contact">Contact</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="main.php#jump-aboutus">About Us</a>
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
                            ?>
                                <?php
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
    <!-- endnavbar -->

    <!-- carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/carousel/carousel1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/carousel/carousel2.jpg" class="d-block w-100" alt="...">
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- content -->



    <div class="container bg">
        <div class="row">
            <!-- sidebar -->
            <div class="col-md-3 py-5">

                <!-- category sidebar -->
                <div class="header font-semibold ps-2 fs-5" style="margin-bottom: 1.2rem;">
                    Category
                </div>
                <div class="card rounded-3 py-1 scroll-sidebar" style="width: 15rem;">
                    <ul class="list-group list-group-flush font-regular text-center">
                        <li class="list-group-item border-0"><a href="#" class="text-decoration-none text-black px-2">Photography</a></li>
                        <li class="list-group-item border-0"><a href="#" class="text-decoration-none px-2 blue-theme">Paper Print</a></li>
                        <li class="list-group-item border-0"><a href="#" class="text-decoration-none text-black px-2">Banner Print</a></li>
                        <li class="list-group-item border-0"><a href="#" class="text-decoration-none text-black px-2">Logo Sticker Print</a></li>
                        <li class="list-group-item border-0"><a href="#" class="text-decoration-none text-black px-2">3D Print</a></li>
                        <li class="list-group-item border-0"><a href="#" class="text-decoration-none text-black px-2">Screening Print</a></li>
                        <li class="list-group-item border-0"><a href="#" class="text-decoration-none text-black px-2">Card Print</a></li>
                        <li class="list-group-item border-0"><a href="#" class="text-decoration-none text-black px-2">Card Name</a></li>
                    </ul>
                </div>

                <!-- category 2 sidebar -->

            </div>

            <!-- catalogue -->
            <div class="col-md-9">



                <!-- header and carousel -->
                <div class="header font-semibold py-3 fs-2 text-end">
                    Our products catalogue
                </div>

                <!-- product cards -->
                <div class="row row-cols-1 row-cols-md-3 g-4 py-3 mb-5">
                    <?php
                    $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id ASC LIMIT 6");
                    if (mysqli_num_rows($produk) > 0) {
                        while ($p = mysqli_fetch_array($produk)) {
                    ?>
                            <div class="col">
                                <div class="card h-100 rounded-3 img-hover-zoom">
                                    <a href="checkout.php?id=<?= $p['id'] ?>"><img src="gambar/<?php echo $p['gambar_produk']; ?>" class="card-img-top py-3 px-3" alt="..."></a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-black blue-hover">
                                            <h5 class="card-title font-medium"><?php echo $p['nama_produk']; ?></h5>
                                            <h4 class="card-price font-bold">Rp<?php echo number_format($p['harga_jual'], 0, ',', '.'); ?></h2>
                                        </a>
                                        <p class="card-text font-regular text-secondary"><?php echo $p['deskripsi']; ?></p>
                                        <div class="d-flex justify-content-between">
                                            <div class="rating font-regular">

                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                3.0
                                            </div>
                                            <a href="checkout.php?id=<?= $p['id'] ?>"><button class="btn button-theme2 font-regular px-2"><i class="fa fa-heart-o" aria-hidden="true"></i> Watch</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p>No product available.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>



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