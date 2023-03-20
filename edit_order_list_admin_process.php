<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'conn.php';

// $id = $_POST['id'];
// $payment = $_POST['payment'];
// $status = $_POST['status'];


// $update = "UPDATE cart_id SET confirm='$payment',status_order='$status'
// WHERE cart_id = $id";

// $result = $conn->query($update);

// echo "<script type = 'text/javascript'>
//     alert('Status updated!');</script>";

// header("Location: order_list.php");





	// membuat variabel untuk menampung data dari form
    if ($_POST) {
        $id = $_POST['order_id'];
        $sql = "UPDATE shopping_cart SET confirm='{$_POST['payment']}',status_order='{$_POST['status']}' WHERE cart_id=$id";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header('Location: order_list.php');
        } else {
            echo "Data Gagal di Edit: ".mysqli_error($conn);
        }
    }