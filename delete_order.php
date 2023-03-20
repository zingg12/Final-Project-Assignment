<?php

include_once 'conn.php';

$id = $_GET['id'];
// $query = $conn->query("DELETE FROM order_list WHERE `id`='" . $id . "' LIMIT 1");

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM order_list WHERE `id`='" . $id . "' LIMIT 1");

header("Location:order_list.php");
