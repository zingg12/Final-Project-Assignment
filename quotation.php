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

// $mysql = $conn->query("SELECT * FROM users");

$mysql = $conn->query("SELECT
   * FROM shopping_cart JOIN material ON material.id_material=shopping_cart.id_material
   JOIN users ON users.id = shopping_cart.user_id WHERE user_id ='$_SESSION[id]' ORDER BY cart_id DESC");
$row2 = $mysql->fetch_assoc();


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
    <title>Quotation | Digitalie</title>
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
                        echo "<li class='nav-item mx-2'><a class='nav-link' aria-current='page' href='index.php'>Add Product</a></li><li class='nav-item mx-2'><a class='nav-link' aria-current='page' href='index_material.php'>Add Material</a></li>";
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
    <?php

    $sql2 = "SELECT * FROM order_list";
    $test = $conn->query($sql2);
    $row3 = $test->fetch_assoc();
    ?>
    <!--Quotation-->
    <div class="container mt-5" id="atas">
        <div class="row">
            <div class="col-8 font-semibold">
                <h1>Quotation</h1>
            </div>
            <div class="col-4 font-bold" id="date-orderid">
                <div class="row">
                    <div class="col">
                        Date
                    </div>
                    <div class="col">
                        <div class="text-start font-semibold blue-theme"><?= $row2['date']; ?></div>
                        <!-- <input type="text" readonly class="form-control font-medium" value="<?= $row2['date']; ?>"> -->
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col">
                        Order ID
                    </div>
                    <div class="col">
                        <p class="blue-theme font-semibold">DL060802<?= $row2['cart_id'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Tabel Quotation-->
    <div class="container">
        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <th>Nama Produk</th>

                    <!-- <th>Phone</th> -->
                    <!-- <th>Address</th> -->
                    <!-- <th>Confirm</th> -->
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <!-- <th>Tindakan</th> -->
                </thead>

            

                    <tr>
                        
                        <td><?= $row2['nama_produk']; ?></td>
                        <!-- <td><?= $row2['phone']; ?></td> -->
                        <!-- <td><?= $row2['address']; ?></td> -->
                        <!-- <td><?= $row2['confirm']; ?></td> -->
                        <td><?= $row2['nama_material']; ?></td>
                        <td><?= $row2['quantity']; ?></td>
                        <td class="font-weight-bold">Rp. <?= $row2['harga_jual']; ?></td>
                        <td>
                            <!-- <a href="index.php?page=user_form&action=edit&user_id=<?= $row['user_id']; ?>" class="btn btn-sm btn-warning"> -->
                            <!-- <span data-feather="edit"></span>Ubah</a> -->
                            <!-- <a href="process/user.php?action=delete&user_id=<?= $row['user_id']; ?>" class="btn btn-sm btn-danger">
                        <span data-feather="trash-2"></span>Hapus</a> -->
                        </td>
                    </tr>


                

            </table>
            <!-- Hidden Input -->

        </div>
    </div>

    <!-- data diri -->

    <div class="container pb-3 pt-3 px-5">
        <div class="row py-3">
            <div class="col font-bold">
                Customer
            </div>
            <div class="col">
                <div class="text-start font-medium"><?= $row['fname']; ?> <?= $row['lname']; ?></div>

            </div>
            <div class="col font-bold">
                Sub Total
            </div>
            <div class="col">
                <div class="text-start font-medium">
                    Rp. <?= $row2['harga_jual'] ?>
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col font-bold">
                Email
            </div>
            <div class="col">
                <div class="text-start font-medium"><?= $row['email']; ?></div>
            </div>
            <div class="col font-bold">
                Tax
            </div>
            <div class="col">
                <div class="text-start font-medium ">
                    <?php
                    $tax = 0.11;
                    $totaltax = $tax * 100;

                    echo '%' . $totaltax;
                    ?>
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col font-bold">
                Phone
            </div>
            <div class="col">
                <div class="text-start font-medium"><?= $row['phone']; ?></div>
            </div>
            <div class="col font-bold">
                Total
            </div>
            <div class="col">
                <div class="text-start font-medium ">
                    Rp. <?= $row2['total'] ?>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </div>

    <!--Bawahnya-->

    <div class="container d-flex justify-content-between py-5">
        <div >
            <img src="assets/Digitalie.svg" alt="">
            
        </div>
        <div> 
            <a href="payment.php" type="button" class="btn btn-primary font-regular btn-block button-theme2">Proceed to Payment</a>
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