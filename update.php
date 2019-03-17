<?php
include("connection.php");

$id = $_GET['id'];
$nama = $_POST['nama'];
$comment = $_POST['comment'];

mysqli_query($conn, "UPDATE comment SET nama='$nama', comment='$comment' WHERE id_comment='$id'");
?>