<?php
include 'connection.php';
$conn = connection();

$product = $_POST['product_id'];

$query = "DELETE FROM produkty WHERE idp=".$product;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>