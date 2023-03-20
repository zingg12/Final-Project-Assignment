<?php
include_once 'conn.php';
session_start();
$sesi = $_SESSION['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$harga_jual = $_POST['harga_jual'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$query    = mysqli_query($conn, "SELECT
                        * FROM shopping_cart JOIN material ON material.id_material=shopping_cart.id_material WHERE user_id ='$_SESSION[id]'");
while ($data  = mysqli_fetch_array($query)) {
    // looping atribut jumlah dan harga
    $jumlah[]    = $data['harga_jual'];
}
//total
$subtotal   = array_sum($jumlah);


$tax = 0.11;



$pajak = $tax * $subtotal;
$totalharga = $pajak + $subtotal;





//2.
$sql = "INSERT INTO order_list (fname, lname, email, phone, address,subtotal,total, confirm, user_id) VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $phone . "', '" . $address . "', '" . $subtotal . "','" . $totalharga . "', 'belum','" . $sesi . "')";

//3.
$result = $conn->query($sql);


//Redirect


header('refresh:0;url=main.php');

echo '<script>alert("Item checkouted. Please note that your checkouted items now being process by admin.\\nThank you for shopping at Digitalie!");</script>';
