<?php

include_once 'conn.php';

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$update = "UPDATE users SET fname='$fname',lname='$lname',address='$address',phone='$phone',email='$email',password='$password'
WHERE id = $id";

$result = $conn->query($update);

echo "<script type = 'text/javascript'>
    alert('Profile updated!');</script>";

header("Location: profile.php?id=" . $id);
