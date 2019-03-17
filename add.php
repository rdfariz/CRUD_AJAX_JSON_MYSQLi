<?php
include("connection.php");

$nama = $_POST['nama'];
$comment = $_POST['comment'];

mysqli_query($conn, "INSERT INTO comment (nama,comment) VALUES('$nama','$comment')");
?>