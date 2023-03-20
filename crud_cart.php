<?php

include_once 'conn.php';

$action = $_GET['action'];

if ($action == "confirm") {
    $id = $_GET['id'];

    $q = $conn->query("UPDATE order_list SET confirm='sudah' WHERE `id`='" . $id . "' LIMIT 1");

    header('refresh:0;url=crud_cart.php');
    echo '<script>alert("Pembayaran sudah dikonfirmasi!");</script>';
} elseif ($action == "delete") {
    // delete data
    $id = $_GET['id'];
    // $query = $conn->query("DELETE FROM order_list WHERE `id`='" . $id . "' LIMIT 1");


    // Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM shopping_cart WHERE `id`='" . $id . "' LIMIT 1");

    header("refresh:0;url=cart.php");
}
