<?php

include_once 'conn.php';

$id = $_POST['id'];
$foto = $_FILES['foto'];

$ext = explode(".", $foto['name']);
$ext = end($ext);
$ext = strtolower($ext);

$ext_boleh = ['jpg', 'png', 'jpeg'];

if (in_array($ext, $ext_boleh)) {
    $sumber = $foto['tmp_name'];
    $tujuan = 'userpic/' . $foto['name'];
    move_uploaded_file($sumber, $tujuan);

    $sql = "INSERT INTO profilepic (picture, user_id)
            VALUES ('$tujuan','$id')";
    $result = $conn->query($sql);
} else {
    echo "File not valid. Please try another supported file!";
}

header("Location: profile.php?id=" . $id);
