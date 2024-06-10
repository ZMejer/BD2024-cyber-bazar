<?php
session_start();
include 'connection.php';
$conn = connection();

$product = $_POST['order_product'];
$user = $_SESSION['idu'];
$date_now = date("Y-m-d");
$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$sql = "INSERT INTO zamowienia(data, u_id, p_id) VALUES('$date_now', '$user', '$product')";

if (mysqli_query($conn, $sql)) {
    header("Location: $url?order=success");
} else {
    header("Location: $url?order=error");
}

mysqli_close($conn);
?>
