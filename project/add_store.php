<?php
include 'connection.php';
$conn = connection();

$city = $_POST['city'];
$address = $_POST['address'];

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

    $sql = "INSERT INTO sklepy(adres,miasto) VALUES('$address', '$city')";
    mysqli_query($conn, $sql);
    header("Location: $url");


?>