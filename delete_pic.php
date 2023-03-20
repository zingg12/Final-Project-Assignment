<?php 

include_once 'conn.php';

$id = $_GET['id'];
$delete = "DELETE FROM profilepic WHERE user_id = $id";

$result = $conn -> query($delete);


header("Location: profile.php?id=".$id);

?>