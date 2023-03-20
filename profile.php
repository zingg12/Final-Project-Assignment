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

$order = "SELECT
* FROM shopping_cart JOIN material ON material.id_material=shopping_cart.id_material
JOIN users ON users.id = shopping_cart.user_id WHERE user_id ='$_SESSION[id]'";
$test2 = $conn->query($order);

$result2 = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_assoc($result2);

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
    <title>Profile | Digitalie</title>
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
    <!-- EndNavbar -->

    <!-- content -->

    <body id="profile-page">
        <section id="wrapper">

            <div class="container">
                <div class="row mx-5 px-5 py-5">
                    <div class="col-lg-4">
                        <div class="card" id="profile-card1">
                            <div class="card-body py-5 px-md-5">

                                <h2 class="text-center font-semibold mb-lg-4"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h2>
                                <form action="upload_profile.php" method="post" enctype="multipart/form-data">
                                    <input type="text" hidden readonly class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>">
                                    <?php

                                    $profilepicture = "SELECT pic_id, picture, user_id FROM profilepic JOIN users ON users.id = profilepic.user_id WHERE user_id = '$row[id]'";
                                    $hasil = $conn->query($profilepicture);
                                    $row2 = $hasil->fetch_assoc();

                                    if (isset($row2['user_id']) == NULL) {
                                        echo "<img src='assets/profilepic.jpg' alt='avatar' class='avatar d-block mx-auto my-3 rounded-circle' width='150px'>";
                                    } else {
                                        echo "<img src='$row2[picture]' alt=''  class='avatar d-block mx-auto my-3 rounded-circle' width='150px'>
                                    <a id='btn' class='btn btn-danger' href='delete_pic.php?id=$row[id]'>Delete Picture</a>";
                                    }


                                    ?>


                                    <input type="file" name="foto" accept=".png, .jpg, .jpeg" class="form-control mb-3 font-regular" />
                                    <button id="btn-bg-hover" class="btn d-block mx-auto my-2 button-theme text-light font-regular" type="submit">
                                        Upload New Picture
                                    </button>
                                </form>

                                <div class="card-body bg-light rounded-3 text-center font-regular">
                                    Upload your profile picture above
                                </div>
                                <p class="mt-5 font-regular text-center">Member Since</br><span class="fw-bold">20 January 2022</span></p>
                                <button class="d-grid gap-2 col-6 mx-auto btn btn-danger"><a class="text-light text-decoration-none font-regular" href="logout.php">Logout</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card" id="profile-card2">
                            <div class="card-body px-md-5 bg-light">
                                <h3 class="pt-4 font-medium mb-3">Your Account</h3>
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link btn-sm  font-regular text-decoration-none" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" type="button">Edit Profile</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link btn-sm font-regular text-decoration-none active" id="pills-booking-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" type="button">My Orders</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body py-5 px-md-5">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div>
                                            <form action="edit_profile.php" method="post">
                                                <input type="text" hidden readonly class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>">
                                                <!-- Name -->
                                                <div class="row">
                                                    <div class="col-md mb-4">
                                                        <div class="form-outline">
                                                            <input type="text" id="fname" class="form-control mb-2" name="fname" value="<?php echo $row['fname']; ?>" />
                                                            <label class="form-label" for="form3Example1">First Name</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Name -->
                                                <div class="row">
                                                    <div class="col-md mb-4">
                                                        <div class="form-outline">
                                                            <input type="text" id="fname" class="form-control mb-2" name="lname" value="<?php echo $row['lname']; ?>" />
                                                            <label class="form-label" for="form3Example1">Last Name</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="col-md mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" id="address" class="form-control mb-2" name="address" value="<?php echo $row['address']; ?>" />
                                                        <label class="form-label" for="form3Example2">Address</label>
                                                    </div>
                                                </div>

                                                <!-- Phone -->
                                                <div class="col-md mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" id="phone" class="form-control mb-2" name="phone" value="<?php echo $row['phone']; ?>" />
                                                        <label class="form-label" for="form3Example22">Phone Number</label>
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="form-outline mb-4">
                                                    <input type="email" id="email" class="form-control mb-2" name="email" value="<?php echo $row['email']; ?>" />
                                                    <label class="form-label" for="form3Example3">Email address</label>
                                                </div>

                                                <!-- Password -->
                                                <div class="form-outline mb-4">
                                                    <input type="password" id="password" name="password" class="form-control mb-2" />
                                                    <label class="form-label" for="form3Example3">Password</label>
                                                </div>


                                                <!-- Submit button -->
                                                <div class="d-grid">
                                                    <button type="submit" name="update" value="update" id="btn-bg-hover" class="btn button-theme text-light font-regular mb-4">
                                                        Edit Profile
                                                    </button>
                                                </div>
                                            </form>

                                            <div class="d-grid">
                                                <a class='btn btn-danger btn-sm font-regular mb-3' role='button' href='delete_profile.php?id=$row[id]'>Delete Profile</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <table class="table">
                                            <thead>
                                                <tr>

                                                    <th scope="col">Order ID</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Design</th>
                                                    <th scope="col">Proof of Payment</th>
                                                    <th scope="col">Payment Status</th>
                                                    <th scope="col">Order Status</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $i = 0;

                                            while ($row3 = $test2->fetch_assoc()) :
                                                $i++;

                                            ?>
                                                <tr>
                                                    <td>DL060802<?= $row3['cart_id']; ?></td>
                                                    <td>Rp. <?= $row3['total']; ?></td>
                                                    <td>
                                                        <a class="btn btn-sm button-theme2 font-medium mb-2" href="upload_design.php?id=<?php echo $row['id']; ?>">Upload</a>
                                                        <img width="50px" src="gambar/<?= $row3['desain']; ?>">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm button-theme2 font-medium mb-2" href="upload_bukti.php?id=<?php echo $row['id']; ?>">Upload</a>
                                                        <img width="50px" src="gambar/<?= $row3['bukti_pembayaran']; ?>">
                                                    </td>
                                                    <td><?= $row3['confirm']; ?></td>
                                                    <td><?= $row3['status_order']; ?></td>

                                                </tr>


                                            <?php endwhile; ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

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


    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>