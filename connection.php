<?php
$conn = mysqli_connect('localhost','root','','tp');

if (!$conn) {
    die('Gagal Terhubung');
}


$data = mysqli_query($conn, "SELECT * FROM comment");
$json = array();
while ($d = mysqli_fetch_assoc($data)) {
    $id_comment = $d['id_comment'];
    $nama = $d['nama'];
    $comment = $d['comment'];

    $json[] = array('id_comment'=> $id_comment, 'nama' => $nama, 'comment' => $comment);
}

$response['users'] = $json;

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response,JSON_PRETTY_PRINT));
fclose($fp);

?>