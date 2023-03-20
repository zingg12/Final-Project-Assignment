<?php
include_once 'conn.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$phone = $_POST['phone'];
$address = $_POST['address'];



//2.
$sql = "INSERT INTO users (fname, lname, email, password, phone, address, role) VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $password . "', '" . $phone . "', '" . $address . "', 'customer')";

//3.
$result = $conn->query($sql);


//Redirect


header('refresh:0;url=login.php');

echo '<script>alert("Registration success! Please login with your new email and password.");</script>';
