<?php
include("connection.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM comment WHERE id_comment='$id'");
?>