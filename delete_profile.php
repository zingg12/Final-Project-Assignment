<?php 

include_once 'conn.php';

$id = $_GET['id'];
$delete = "DELETE FROM users WHERE id = $id";

$result = $conn -> query($delete);

session_start();
session_unset();

//destroy the session
session_destroy();

header("Location: home.php");

?>