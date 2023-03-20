<?php
include_once 'conn.php';

session_start();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$nama_produk = $_POST['nama_produk'];
$harga_jual = $_POST['harga_jual'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$material = $_POST['material'];
$quantity = $_POST['quantity'];

$sesi = $_SESSION['id'];

$jual = $harga_jual * $quantity;
$tax = 0.11;
$pajak = $jual * $tax;
$total = $pajak + $jual;

//2.
$sql = "INSERT INTO shopping_cart (fname, lname, nama_produk, harga_jual,total, phone, address, confirm, id_material, quantity, user_id) VALUES ('" . $fname . "', '" . $lname . "', '" . $nama_produk . "', '" . $jual . "', '".$total."', '" . $phone . "', '" . $address . "', 'belum',  '" . $material . "', '" . $quantity . "', '" . $sesi . "')";

//3.
$result = $conn->query($sql);


//Redirect


header('refresh:0;url=main.php');

echo '<script>alert("Item checkouted. Please note that your checkouted items now being process by admin.\\nThank you for shopping at Digitalie!");</script>';
