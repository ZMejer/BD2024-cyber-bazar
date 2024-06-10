<?php
include 'connection.php';
$conn = connection();

$order_id = $_POST['order_id'];
$product_id = $_POST['product'];

$query = "UPDATE zamowienia SET p_id = ".$product_id." WHERE idz=".$order_id;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>