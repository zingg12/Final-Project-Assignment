<?php

include_once 'conn.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}


if (!isset($_SESSION['id']) == FALSE) {
    $sql = "SELECT id, fname, lname, email, password, phone, address, role FROM users WHERE id = '$_SESSION[id]'";
} else {
    $sql = "SELECT id, fname, lname, email, password, phone, address, role FROM users";
}
$id = (int) $_GET['id'];
$query = "SELECT * FROM produk WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$result2 = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_assoc($result2);

?>


<!DOCTYPE html>
<html>

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
    <title>Checkout | Digitalie</title>
    <link rel="shortcut icon" type="image/svg" href="assets/D.svg" />
</head>
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
                            echo "<button class='btn btn-sm font-medium button-theme text-light rounded-pill px-3' type='button'>Hello, " . $row2['fname'] . "!" . "</button>";
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

<div class="container">
    <!--Checkout-->
    <section id="ConfirmOrder">
        <div class="container" id="atasconfirm">
            <div class="row mt-3">
                <div class="col">
                    <h1 class="text-end font-semibold">Checkout</h1>
                </div>
            </div>
        </div>
    </section>
    <!--End Checkout-->

    <!--Row2-->
    <section id="poster">
        <div class="row mt-3">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="text-start ms-3 font-semibold pb-3"><?php echo $row['nama_produk']; ?></h2>
                    <img src="gambar/<?php echo $row['gambar_produk']; ?>" class="py-3 px-3 mt-2 d-block border rounded-3" alt="" width="90%">
                </div>
                <div class="col-lg-8">
                    <div clas="row">
                        <!-- data diri (address) -->
                        <h3 class="text-start font-semibold">Address</h3>

                        <div class="row mt-2">
                            <hr>
                            <div class="text-start font-regular pb-2"><?php echo $row2['fname']; ?> <?php echo $row2['lname']; ?></div>
                            <div class="text-start font-regular"><?php echo $row2['phone']; ?></div>
                            <div class="d-flex justify-content-between my-2 mb-3">
                                <div class="text-start font-regular"><?php echo $row2['address']; ?></div>
                            </div>
                            <hr>
                            <!--Col1-->
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="gambar/doff.png" alt="" width="177" height="121">
                                </div>
                                <!--COl2-->
                                <div class="col-sm-5">
                                    <div class="row ps-4">
                                        <form action="checkout_process.php" method="post">
                                            <div class="form-group font-regular text-start">
                                                <select class="form-control" id="material" name="material">
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM material");
                                                    while ($data = mysqli_fetch_array($query)) :
                                                        if ($data['id_material'] == $id) {
                                                            $selected = 'selected = "selected"';
                                                        } else {
                                                            $selected = '';
                                                        }
                                                    ?>
                                                        <option href="checkout.php?id=<?php echo $row['id']; ?>" <?= $selected ?>value="<?= $data['id_material'] ?>"><?= $data['nama_material'] ?></option>
                                                    <?php endwhile ?>
                                                </select>
                                            </div>
                                            <div class="font-bold fs-4 pb-3 pt-3">Rp<?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></div>
                                            <p class="text-sm-left font-regular">Shipping Available for West Java 16123</p>
                                            <div class="mt-1 font-regular">Duration: <?php echo $row['duration']; ?> days</div>
                                            <div class="mt-1 font-regular">Shipping Estimation: 1 Day</div>

                                    </div>
                                </div>
                                <!--Col3-->
                                <div class="col-sm-4 d-inline">
                                    <div class="row">

                                        <?php if (isset($_SESSION['role']) && $_SESSION['role']) {
                                        ?>
                                            <?php
                                            echo "<div class='input-group mb-3 d-flex justify-content-between'><div class='me-3 font-semibold fs-5'>Quantity</div><input class='form-control rounded-3' name='quantity' id='quantity' required></div>";
                                            ?>
                                        <?php } else { ?>

                                        <?php }  ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!--Bawah-->
    <section id="bawah">
        <div class="container">
            <div class="row mt-3">
                <div class="row justify-content-between">
                    <div class="col-lg-3 py-3 ps-4 w-50">
                        <h5 class="text-start font-semibold">Description</h5>
                        <p class="text-start font-regular"><?php echo $row['deskripsi']; ?></p>
                    </div>

                    <div class="row mt-3 py-3 mb-5">



                        <div class="col d-flex justify-content-end">
                            <!-- Hidden Input -->

                            <input type="text" hidden readonly class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $row['nama_produk']; ?>">
                            <input type="text" hidden readonly class="form-control" id="harga_jual" name="harga_jual" value="<?php echo $row['harga_jual']; ?>">
                            <input type="text" hidden readonly class="form-control" id="fname" name="fname" value="<?php echo $row2['fname']; ?>">
                            <input type="text" hidden readonly class="form-control" id="lname" name="lname" value="<?php echo $row2['lname']; ?>">
                            <input type="text" hidden readonly class="form-control" id="phone" name="phone" value="<?php echo $row2['phone']; ?>">
                            <input type="text" hidden readonly class="form-control" id="address" name="address" value="<?php echo $row2['address']; ?>">

                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "customer") {
                            ?>
                                <?php
                                echo "<button type='submit' class='btn btn-primary button-theme font-regular px-5 btn-block'>Proceed</button>";
                                ?>
                            <?php } else { ?>

                            <?php }  ?>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
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

<script src="script.js"></script>
</body>

</html>