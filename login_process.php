<?php
include_once 'conn.php';

session_start();



$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE email='" . $email . "'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

if (password_verify($password, $row['password'])) {
    $_SESSION['fname'] = $row['lname'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['role'] = $row['role'];


    header('refresh:0;url=main.php');
    echo '<script>alert("Login success!");</script>';
} else {

    header('refresh:0;url=login.php');

    echo '<script>alert("Wrong username/password.");</script>';
}
    
    
    // header('Location: login.php');
